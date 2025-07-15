<?php

namespace AppoloDev\UIToolboxBundle\UI\Mockup;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('mockupWindow', template: '@UIToolbox/ui/mockup/window.html.twig')]
#[UIComponentDoc(
    title: 'Window',
    description: 'A customizable mockup phone component based on DaisyUI.',
    url: 'https://daisyui.com/components/mockup-window/',
)]
#[UIComponentExample(
    title: 'Window mockup with border',
    description: 'Displays a window mockup component with a border.',
    templateName: '@UIToolboxDoc/examples/mockup/window/with_border.html.twig',
)]
#[UIComponentExample(
    title: 'Window mockup with background color',
    description: 'Displays a window mockup component with a background color.',
    templateName: '@UIToolboxDoc/examples/mockup/window/with_background.html.twig',
)]
class Window
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['mockup-window'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
