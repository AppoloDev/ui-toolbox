<?php

namespace AppoloDev\UIToolboxBundle\UI\DataDisplay;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('badge', template: '@UIToolbox/ui/data_display/badge.html.twig')]
#[UIComponentDoc(
    title: 'Badge',
    description: 'A customizable badge component based on DaisyUI. Supports color, size, style, and more.',
    url: 'https://daisyui.com/components/badge/',
)]
#[UIComponentExample(
    title: 'Size variations',
    description: 'Displays badges in different sizes from extra small to extra large.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/sized-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Color variants',
    description: 'Displays badges with various color themes.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/colored-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Soft style',
    description: 'Provides badges with a soft visual appearance for all colors.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/soft-styled-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Outline style',
    description: 'Displays badges using an outline style across all color options.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/outline-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Dashed borders',
    description: 'Uses dashed border styles for badges.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/dashed-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Ghost style',
    description: 'Applies a ghost effect style to badges.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/ghost-badges.html.twig',
)]
#[UIComponentExample(
    title: 'With icons',
    description: 'Includes inline SVG icons alongside the badge labels.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/icon-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Inside buttons',
    description: 'Places badges within buttons as notification indicators.',
    templateName: '@UIToolboxDoc/examples/data_display/badge/button-badges.html.twig',
)]
class Badge
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Sets the badge color.', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Determines the visual style of the badge.', default: null, acceptedValues: [null, 'soft', 'outline', 'dash', 'ghost'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'Size', type: 'string|null', description: 'Defines the badge size.', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['badge'];

        if ($this->style !== null) {
            $classes[] = "badge-{$this->style}";
        }

        if ($this->color) {
            $classes[] = "badge-{$this->color}";
        }

        if ($this->size) {
            $classes[] = "badge-{$this->size}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
