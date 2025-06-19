<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Tab;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('tabs', template: '@UIToolbox/ui/navigation/tabs/tabs.html.twig')]
#[UIComponentDoc(
    title: 'Tabs',
    description: 'A customizable navigation component based on DaisyUI. Supports style, size, placement, class.',
    tags: ['tabs', 'navigation', 'daisyui']
)]
#[UIComponentExample(
    title: 'Tabs (default)',
    description: 'Basic tab layout',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs - Border style',
    description: 'Tabs with border style',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-border.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs - Lift style',
    description: 'Tabs with lift style',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs - Box style',
    description: 'Tabs with box style',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-box.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs Box with radio inputs',
    description: 'Tabs using radio inputs with box style',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-box-radio.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs - Size variations',
    description: 'Tabs with size variants (xs to xl)',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs Border with tab content',
    description: 'Radio tabs with border style and associated content',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-border-content.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs Lift with tab content',
    description: 'Radio tabs with lift style and content',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift-content.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs Lift with icons',
    description: 'Radio tabs with lift style and icons',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs Lift with bottom content',
    description: 'Radio tabs with lift style and content on bottom',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift-bottom.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs Box with tab content',
    description: 'Radio tabs with box style and content',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-box-content.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs with custom color',
    description: 'Tabs with custom background and border color',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-custom-color.html.twig',
)]
class Tabs
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Sets the visual style of the tabs.', default: null, acceptedValues: [null, 'box', 'border', 'lift'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'Size', type: 'string|null', description: 'Defines the size of each tab.', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'Placement', type: 'string|null', description: 'Controls the vertical placement of the tab list.', default: 'top', acceptedValues: ['top', 'bottom'])]
    public string $placement = 'top';

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['tabs'];

        if ($this->size) {
            $classes[] = "tabs-{$this->size}";
        }

        if ($this->style !== null) {
            $classes[] = "tabs-{$this->style}";
        }

        if ($this->placement) {
            $classes[] = "tabs-{$this->placement}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
