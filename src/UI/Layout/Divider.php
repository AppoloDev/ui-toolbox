<?php

namespace AppoloDev\UIToolboxBundle\UI\Layout;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('divider', template: '@UIToolbox/ui/layout/divider.html.twig')]
#[UIComponentDoc(
    title: 'Divider',
    description: 'A customizable divider component based on DaisyUI. Supports color variants and custom styling.',
    tags: ['divider', 'daisyui', 'UI', 'layout']
)]
#[UIComponentExample(
    title: 'Divider',
    description: 'Basic divider with text',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider.html.twig',
)]
#[UIComponentExample(
    title: 'Divider horizontal',
    description: 'Divider explicitly set to horizontal',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-horizontal.html.twig',
)]
#[UIComponentExample(
    title: 'Divider with no text',
    description: 'Divider used as a line without text content',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-no-text.html.twig',
)]
#[UIComponentExample(
    title: 'Divider with colors',
    description: 'Dividers using different color variants',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-colors.html.twig',
)]
#[UIComponentExample(
    title: 'Divider in different positions',
    description: 'Dividers with text aligned to start or end',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-positions.html.twig',
)]
#[UIComponentExample(
    title: 'Divider in different positions (horizontal)',
    description: 'Dividers in horizontal orientation with varied text alignment',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-positions-horizontal.html.twig',
)]
class Divider
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Divider color', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Direction', type: 'string|null', description: 'Direction', default: null, acceptedValues: [null, 'vertical', 'horizontal'])]
    public ?string $direction = null;

    #[UIComponentProp(label: 'Placement', type: 'string|null', description: 'Placement', default: null, acceptedValues: [null, 'start', 'end'])]
    public ?string $placement = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['divider'];

        if ($this->color) {
            $classes[] = "divider-{$this->color}";
        }

        if ($this->direction !== null) {
            $classes[] = "divider-{$this->direction}";
        }

        if ($this->placement !== null) {
            $classes[] = "divider-{$this->placement}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
