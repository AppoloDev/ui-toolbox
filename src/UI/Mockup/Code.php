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
    description: 'Displays a browser mockup component with a border.',
    templateName: '@UIToolboxDoc/examples/mockup/code/line_prefix.html.twig',
)]
#[UIComponentExample(
    title: 'Multi line',
    description: 'Displays a browser mockup component with a background color.',
    templateName: '@UIToolboxDoc/examples/mockup/code/multi_line.html.twig',
)]
#[UIComponentExample(
    title: 'Highlighted line',
    description: 'Displays a browser mockup component with a border.',
    templateName: '@UIToolboxDoc/examples/mockup/code/highlighted_line.html.twig',
)]
#[UIComponentExample(
    title: 'Long line will scroll',
    description: 'Displays a browser mockup component with a background color.',
    templateName: '@UIToolboxDoc/examples/mockup/code/long_line.html.twig',
)]
#[UIComponentExample(
    title: 'Without prefix',
    description: 'Displays a browser mockup component with a border.',
    templateName: '@UIToolboxDoc/examples/mockup/code/without_prefix.html.twig',
)]
#[UIComponentExample(
    title: 'With color',
    description: 'Displays a browser mockup component with a background color.',
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
