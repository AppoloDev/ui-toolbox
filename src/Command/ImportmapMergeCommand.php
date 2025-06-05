<?php

namespace AppoloDev\UIToolboxBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'ui-toolbox:importmap:merge',
    description: 'Merge UIToolbox importmap.php into the host project importmap.php file.',
)]
class ImportmapMergeCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        // Chemin vers le fichier importmap.php du bundle
        $bundleImportmapPath = \dirname(__DIR__, 2) . '/config/Resources/importmap.php';

        // Chemin vers le fichier importmap.php du projet (racine)
        $projectImportmapPath = getcwd() . '/importmap.php';

        if (!file_exists($bundleImportmapPath)) {
            $output->writeln('<error>Bundle importmap.php not found at ' . $bundleImportmapPath . '</error>');
            return Command::FAILURE;
        }

        if (!file_exists($projectImportmapPath)) {
            $output->writeln('<error>Project importmap.php not found at ' . $projectImportmapPath . '. Run `php bin/console importmap:install` first.</error>');
            return Command::FAILURE;
        }

        $bundleMap = include $bundleImportmapPath;
        $projectMap = include $projectImportmapPath;

        $merged = array_merge($projectMap, $bundleMap);

        $export = "<?php\n\n";
        $export .= "/**\n";
        $export .= " * Returns the importmap for this application.\n";
        $export .= " *\n";
        $export .= " * - \"path\" is a path inside the asset mapper system. Use the\n";
        $export .= " *     \"debug:asset-map\" command to see the full list of paths.\n";
        $export .= " *\n";
        $export .= " * - \"entrypoint\" (JavaScript only) set to true for any module that will\n";
        $export .= " *     be used as an \"entrypoint\" (and passed to the importmap() Twig function).\n";
        $export .= " *\n";
        $export .= " * The \"importmap:require\" command can be used to add new entries to this file.\n";
        $export .= " */\n\n";
        $export .= 'return ' . $this->prettyPrintArray($merged) . ";\n";

        file_put_contents($projectImportmapPath, $export);

        $output->writeln('<info>importmap.php successfully merged.</info>');
        return Command::SUCCESS;
    }

    private function prettyPrintArray(array $array, int $indentLevel = 1): string
    {
        $indent = str_repeat('    ', $indentLevel);
        $code = "[\n";

        foreach ($array as $key => $value) {
            $keyExport = is_string($key) ? var_export($key, true) : $key;
            $code .= $indent . $keyExport . ' => ';

            if (is_array($value)) {
                $code .= $this->prettyPrintArray($value, $indentLevel + 1);
            } else {
                $code .= var_export($value, true);
            }

            $code .= ",\n";
        }

        $code .= str_repeat('    ', $indentLevel - 1) . ']';
        return $code;
    }
}
