<?php

namespace AppoloDev\UIToolboxBundle\UI\Mockup;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('mockupCode', template: '@UIToolbox/ui/mockup/code.html.twig')]
#[UIComponentDoc(
    title: 'Code',
    description: 'A customizable mockup code component based on DaisyUI.',
    url: 'https://daisyui.com/components/mockup-code/',
)]
#[UIComponentExample(
    title: 'Mockup code with line prefix',
    description: 'Displays a code mockup with a line prefix.',
    templateName: '@UIToolboxDoc/examples/mockup/code/line_prefix.html.twig',
)]
#[UIComponentExample(
    title: 'Multi line',
    description: 'Displays a multi-line code mockup.',
    templateName: '@UIToolboxDoc/examples/mockup/code/multi_line.html.twig',
)]
#[UIComponentExample(
    title: 'Highlighted line',
    description: 'Displays a code mockup with a highlighted line.',
    templateName: '@UIToolboxDoc/examples/mockup/code/highlighted_line.html.twig',
)]
#[UIComponentExample(
    title: 'Long line will scroll',
    description: 'Displays a code mockup where long lines will scroll.',
    templateName: '@UIToolboxDoc/examples/mockup/code/long_line.html.twig',
)]
#[UIComponentExample(
    title: 'Without prefix',
    description: 'Displays a code mockup without any prefix.',
    templateName: '@UIToolboxDoc/examples/mockup/code/without_prefix.html.twig',
)]
#[UIComponentExample(
    title: 'With color',
    description: 'Displays a code mockup with background color.',
    templateName: '@UIToolboxDoc/examples/mockup/code/with_color.html.twig',
)]
class Code
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['mockup-code'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
