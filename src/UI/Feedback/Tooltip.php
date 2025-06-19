<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('tooltip', template: '@UIToolbox/ui/feedback/tooltip.html.twig')]
#[UIComponentDoc(
    title: 'Tooltip',
    description: 'A customizable feedback component based on DaisyUI. Supports position, color, CSS classes.',
    tags: ['tooltip', 'daisyui', 'overlay', 'hover']
)]
#[UIComponentExample(
    title: 'Tooltip',
    description: 'Basic tooltip',
    templateName: '@UIToolboxDoc/examples/feedback/tooltip/tooltip.html.twig',
)]
#[UIComponentExample(
    title: 'Tooltip with tooltip-content',
    description: 'Use a div with class tooltip-content',
    templateName: '@UIToolboxDoc/examples/feedback/tooltip/tooltip-content.html.twig',
)]
#[UIComponentExample(
    title: 'Force open',
    description: 'Tooltip with force-open modifier',
    templateName: '@UIToolboxDoc/examples/feedback/tooltip/tooltip-open.html.twig',
)]
#[UIComponentExample(
    title: 'Positions',
    description: 'Tooltip with top, right, bottom, left placements',
    templateName: '@UIToolboxDoc/examples/feedback/tooltip/tooltip-positions.html.twig',
)]
#[UIComponentExample(
    title: 'Colors',
    description: 'Tooltip with color modifiers',
    templateName: '@UIToolboxDoc/examples/feedback/tooltip/tooltip-colors.html.twig',
)]
class Tooltip
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Position', type: 'string|null', description: 'Defines the tooltip position.', default: null, acceptedValues: [null, 'top', 'bottom', 'left', 'right'])]
    public ?string $position = null;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Sets the tooltip color.', default: null, acceptedValues: [null, 'neutral', 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['tooltip'];

        if ($this->position) {
            $classes[] = "tooltip-{$this->position}";
        }

        if ($this->color) {
            $classes[] = "tooltip-{$this->color}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
