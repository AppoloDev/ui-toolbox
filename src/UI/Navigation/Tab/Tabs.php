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
    description: 'A customizable tabs component based on DaisyUI. Supports style, size, placement, class.',
    url: 'https://daisyui.com/components/tab/',
)]
#[UIComponentExample(
    title: 'Basic horizontal tabs',
    description: 'Displays a horizontal layout with default tab style.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs with border style',
    description: 'Displays tabs using the border style for separation.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-border.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs with lift style',
    description: 'Uses the lift style to give a floating appearance to tabs.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs with box style',
    description: 'Displays tabs as individual boxes with spacing.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-box.html.twig',
)]
#[UIComponentExample(
    title: 'Box-style tabs with radio inputs',
    description: 'Uses radio inputs to control box-styled tab selection.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-box-radio.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs with size options',
    description: 'Provides size variants from extra small to extra large.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Border tabs with content',
    description: 'Displays radio-based border tabs with associated content panels.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-border-content.html.twig',
)]
#[UIComponentExample(
    title: 'Lift tabs with content',
    description: 'Displays lift-style radio tabs with associated content.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift-content.html.twig',
)]
#[UIComponentExample(
    title: 'Lift tabs with icons',
    description: 'Includes icons in lift-style radio tabs.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Lift tabs with bottom content',
    description: 'Displays lift-style radio tabs with content positioned below.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-lift-bottom.html.twig',
)]
#[UIComponentExample(
    title: 'Box tabs with content',
    description: 'Displays box-style radio tabs with corresponding content.',
    templateName: '@UIToolboxDoc/examples/navigation/tabs/tabs-box-content.html.twig',
)]
#[UIComponentExample(
    title: 'Tabs with custom colors',
    description: 'Applies custom background and border colors to tabs.',
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
