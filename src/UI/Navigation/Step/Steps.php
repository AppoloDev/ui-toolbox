<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Step;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('steps', template: '@UIToolbox/ui/navigation/steps/steps.html.twig')]
#[UIComponentDoc(
    title: 'Step',
    description: 'A customizable steps component based on DaisyUI. Supports class.',
    url: 'https://daisyui.com/components/steps/',
)]
#[UIComponentExample(
    title: 'Horizontal steps',
    description: 'Displays a horizontal sequence of steps.',
    templateName: '@UIToolboxDoc/examples/navigation/steps/steps-horizontal.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical steps',
    description: 'Displays a vertical sequence of steps.',
    templateName: '@UIToolboxDoc/examples/navigation/steps/steps-vertical.html.twig',
)]
#[UIComponentExample(
    title: 'Steps with custom icons',
    description: 'Includes custom HTML content inside each step icon.',
    templateName: '@UIToolboxDoc/examples/navigation/steps/steps-custom-icon.html.twig',
)]
#[UIComponentExample(
    title: 'Steps with data-content',
    description: 'Uses the data-content attribute to label each step.',
    templateName: '@UIToolboxDoc/examples/navigation/steps/steps-data-content.html.twig',
)]
#[UIComponentExample(
    title: 'Steps with custom colors',
    description: 'Applies different colors to steps for visual emphasis.',
    templateName: '@UIToolboxDoc/examples/navigation/steps/steps-color.html.twig',
)]
#[UIComponentExample(
    title: 'Scrollable steps',
    description: 'Displays a horizontal steps bar with scrollable overflow.',
    templateName: '@UIToolboxDoc/examples/navigation/steps/steps-scroll.html.twig',
)]
class Steps
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Direction', type: 'string|null', description: 'Steps direction', default: null, acceptedValues: [null, 'vertical', 'horizontal'])]
    public ?string $direction = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['steps'];

        if ($this->direction) {
            $classes[] = "steps-{$this->direction}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
