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
    tags: ['badge', 'daisyui', 'UI']
)]
#[UIComponentExample(
    title: 'Badge sizes',
    description: 'Badges with different sizes',
    templateName: '@UIToolboxDoc/examples/data_display/badge/sized-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Badge colors',
    description: 'Badges with different color variants',
    templateName: '@UIToolboxDoc/examples/data_display/badge/colored-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Soft badges',
    description: 'Soft styled badges for all DaisyUI color variants',
    templateName: '@UIToolboxDoc/examples/data_display/badge/soft-styled-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Outline badges',
    description: 'Outline styled badges for all DaisyUI color variants',
    templateName: '@UIToolboxDoc/examples/data_display/badge/outline-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Dashed badges',
    description: 'Badges with dashed borders',
    templateName: '@UIToolboxDoc/examples/data_display/badge/dashed-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Ghost badges',
    description: 'Ghost styled badges',
    templateName: '@UIToolboxDoc/examples/data_display/badge/ghost-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Empty badges',
    description: 'Badges without label, just styled containers',
    templateName: '@UIToolboxDoc/examples/data_display/badge/empty-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Badges with icons',
    description: 'Badges that include an inline icon SVG and a label',
    templateName: '@UIToolboxDoc/examples/data_display/badge/icon-badges.html.twig',
)]
#[UIComponentExample(
    title: 'Badges in buttons',
    description: 'Badges displayed as notification indicators inside buttons',
    templateName: '@UIToolboxDoc/examples/data_display/badge/button-badges.html.twig',
)]
class Badge
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Label', type: 'string', description: 'Text displayed in the badge', default: '')]
    public string $label = '';

    #[UIComponentProp(label: 'Couleur', type: 'string|null', description: 'Badge color', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Badge style', default: null, acceptedValues: [null, 'soft', 'outline', 'dash', 'ghost'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'Taille', type: 'string|null', description: 'Badge size', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    #[UIComponentProp(label: 'ID', type: 'string|null', description: 'Badge id attribute', default: null)]
    public ?string $id = null;

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
