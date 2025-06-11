<?php

namespace AppoloDev\UIToolboxBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'ui-toolbox:importmap:merge',
    description: 'Merge one or more importmap.php files into a target project importmap.php file.',
)]
class ImportmapMergeCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addOption('path', null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_REQUIRED, 'One or more importmap.php paths to merge')
            ->addOption('project', null, InputOption::VALUE_REQUIRED, 'Path to the target project importmap.php');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $projectImportmapPath = $input->getOption('project');
        if (!\is_string($projectImportmapPath)) {
            $output->writeln('<error>Invalid --project option, expected a string.</error>');

            return Command::FAILURE;
        }
        /** @var string[] $paths */
        $paths = (array) $input->getOption('path');

        if (!$projectImportmapPath || !\file_exists((string) $projectImportmapPath)) {
            $output->writeln('<error>Missing or invalid --project path. File not found: '.(string) $projectImportmapPath.'</error>');

            return Command::FAILURE;
        }

        $merged = include $projectImportmapPath;
        if (!\is_array($merged)) {
            $output->writeln('<error>Invalid importmap.php in project (not an array).</error>');

            return Command::FAILURE;
        }

        foreach ($paths as $path) {
            if (!\is_string($path) || !\file_exists((string) $path)) {
                $output->writeln('<comment>File not found: '.(string) $path.', skipping.</comment>');
                continue;
            }

            $map = include (string) $path;
            if (!\is_array($map)) {
                $output->writeln('<comment>Invalid importmap.php at '.(string) $path.' (not an array), skipping.</comment>');
                continue;
            }

            $merged = \array_merge($merged, $map);
        }

        $export = "<?php\n\nreturn ".$this->prettyPrintArray($merged).";\n";
        \file_put_contents((string) $projectImportmapPath, $export);

        $output->writeln('<info>Importmaps successfully merged into '.(string) $projectImportmapPath.'</info>');

        return Command::SUCCESS;
    }

    private function prettyPrintArray(array $array, int $indentLevel = 1): string
    {
        $indent = \str_repeat('    ', $indentLevel);
        $code = "[\n";

        foreach ($array as $key => $value) {
            $keyExport = \var_export($key, true);
            $code .= $indent.$keyExport.' => ';
            $code .= \is_array($value)
                ? $this->prettyPrintArray($value, $indentLevel + 1)
                : \var_export($value, true);
            $code .= ",\n";
        }

        $code .= \str_repeat('    ', $indentLevel - 1).']';

        return $code;
    }
}
