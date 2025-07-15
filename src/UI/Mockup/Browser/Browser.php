<?php

namespace AppoloDev\UIToolboxBundle\UI\Mockup\Browser;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('browser', template: '@UIToolbox/ui/mockup/browser/browser.html.twig')]
#[UIComponentDoc(
    title: 'Browser',
    description: 'A customizable mockup browser component based on DaisyUI.',
    url: 'https://daisyui.com/components/mockup-browser/',
)]
#[UIComponentExample(
    title: 'Browser mockup with border',
    description: 'Displays a browser mockup component with a border.',
    templateName: '@UIToolboxDoc/examples/mockup/browser/border.html.twig',
)]
#[UIComponentExample(
    title: 'Browser mockup with background color',
    description: 'Displays a browser mockup component with a background color.',
    templateName: '@UIToolboxDoc/examples/mockup/browser/background_color.html.twig',
)]
class Browser
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['mockup-browser'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
