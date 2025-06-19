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
    description: 'A customizable divider component based on DaisyUI. Supports color, direction, placement, CSS classes.',
    url: 'https://daisyui.com/components/divider/',
)]
#[UIComponentExample(
    title: 'Default Divider',
    description: 'Displays a basic divider with centered text.',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal Divider',
    description: 'Displays a divider with an explicit horizontal orientation.',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-horizontal.html.twig',
)]
#[UIComponentExample(
    title: 'Divider without Text',
    description: 'Displays a divider line without any text.',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-no-text.html.twig',
)]
#[UIComponentExample(
    title: 'Colored Divider',
    description: 'Uses different color variants to style the divider.',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-colors.html.twig',
)]
#[UIComponentExample(
    title: 'Aligned Text Divider',
    description: 'Aligns the divider text to the start or end position.',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-positions.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal Text Alignment',
    description: 'Displays horizontal dividers with start, center, or end text alignment.',
    templateName: '@UIToolboxDoc/examples/layout/divider/divider-positions-horizontal.html.twig',
)]
class Divider
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Sets the color of the divider.', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Direction', type: 'string|null', description: 'Determines the orientation of the divider.', default: null, acceptedValues: [null, 'vertical', 'horizontal'])]
    public ?string $direction = null;

    #[UIComponentProp(label: 'Placement', type: 'string|null', description: 'Aligns the divider text to a specific position.', default: null, acceptedValues: [null, 'start', 'end'])]
    public ?string $placement = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
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
