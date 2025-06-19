<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Menu;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('menu', template: '@UIToolbox/ui/navigation/menu/menu.html.twig')]
#[UIComponentDoc(
    title: 'Menu',
    description: 'Menu navigation component based on DaisyUI',
    url: 'https://daisyui.com/components/menu/',
)]
#[UIComponentExample(
    title: 'Basic navigation menu',
    description: 'Displays a simple vertical menu with default styling.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu.html.twig',
)]
#[UIComponentExample(
    title: 'Icon-only menu',
    description: 'Displays menu items with icons and no labels.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal icon-only menu',
    description: 'Displays a horizontal menu with only icons.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only-horizontal.html.twig',
)]
#[UIComponentExample(
    title: 'Icon-only menu with tooltips',
    description: 'Displays icons with tooltips on hover for improved accessibility.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only-with-tooltip.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal icon-only menu with tooltips',
    description: 'Displays a horizontal layout of icon-only items with hover tooltips.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only-horizontal-with-tooltip.html.twig',
)]
#[UIComponentExample(
    title: 'Menu size variations',
    description: 'Displays menus in various predefined sizes.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with disabled states',
    description: 'Displays menu items that are non-interactive using the disabled state.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-disabled-items.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with labeled icons',
    description: 'Displays menu items with both icons and text labels.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Responsive menu with icons and badges',
    description: 'Displays a responsive menu including icons and notification-style badges.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icons-and-badge-responsive.html.twig',
)]
#[UIComponentExample(
    title: 'Menu without spacing and radius',
    description: 'Displays a compact menu without internal padding or rounded corners.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-without-padding-and-border-radius.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with section titles',
    description: 'Includes headings to separate menu sections.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-title.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with titled parent items',
    description: 'Uses section titles as clickable parent items.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-title-as-a-parent.html.twig',
)]
#[UIComponentExample(
    title: 'Nested submenu',
    description: 'Displays a hierarchical menu with expandable submenus.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/submenu.html.twig',
)]
#[UIComponentExample(
    title: 'Collapsible nested menu',
    description: 'Provides a collapsible submenu that expands on click.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/collapsible-submenu.html.twig',
)]
#[UIComponentExample(
    title: 'File tree layout',
    description: 'Displays a menu styled like a collapsible file explorer.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/file-tree.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with active highlight',
    description: 'Highlights the currently selected menu item.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-active-item.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal layout menu',
    description: 'Displays menu items in a single horizontal row.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/horizontal-menu.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal menu with dropdown',
    description: 'Provides a horizontal layout with dropdown submenus.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/horizontal-submenu.html.twig',
)]
#[UIComponentExample(
    title: 'Responsive mega menu',
    description: 'Displays a wide, responsive menu with nested submenus.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/mega-menu-with-submenu-responsive.html.twig',
)]
#[UIComponentExample(
    title: 'Responsive collapsible menu',
    description: 'Provides a collapsible, mobile-friendly menu with nested items.',
    templateName: '@UIToolboxDoc/examples/navigation/menu/collapsible-with-submenu-responsive.html.twig',
)]
class Menu
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Size', type: 'string|null', description: 'Menu size', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'Direction', type: 'string|null', description: 'Menu direction', default: null, acceptedValues: [null, 'vertical', 'horizontal'])]
    public ?string $direction = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['menu'];

        if ($this->size) {
            $classes[] = "menu-{$this->size}";
        }

        if (null !== $this->direction) {
            $classes[] = 'menu-'.$this->direction;
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
