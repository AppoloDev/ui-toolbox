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
    tags: ['menu', 'navigation', 'daisyui']
)]
#[UIComponentExample(
    title: 'Menu',
    description: 'Basic menu navigation',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with icon only',
    description: 'Menu items with icons only',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with icon only (horizontal)',
    description: 'Horizontal menu with icon-only items',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only-horizontal.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with icon only with tooltip',
    description: 'Icon-only menu with tooltips',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only-with-tooltip.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with icon only (horizontal) with tooltip',
    description: 'Horizontal icon-only menu with tooltips',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icon-only-horizontal-with-tooltip.html.twig',
)]
#[UIComponentExample(
    title: 'Menu sizes',
    description: 'Menus with different sizes',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with disabled items',
    description: 'Menu containing disabled items',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-disabled-items.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with icons',
    description: 'Menu items with icons',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with icons and badge (responsive)',
    description: 'Responsive menu with icons and badges',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-icons-and-badge-responsive.html.twig',
)]
#[UIComponentExample(
    title: 'Menu without padding and border radius',
    description: 'Menu styled without padding and border-radius',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-without-padding-and-border-radius.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with title',
    description: 'Menu including title headers',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-title.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with title as a parent',
    description: 'Menu with titles acting as parent items',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-title-as-a-parent.html.twig',
)]
#[UIComponentExample(
    title: 'Submenu',
    description: 'Menu with nested submenu items',
    templateName: '@UIToolboxDoc/examples/navigation/menu/submenu.html.twig',
)]
#[UIComponentExample(
    title: 'Collapsible submenu',
    description: 'Menu with collapsible submenu',
    templateName: '@UIToolboxDoc/examples/navigation/menu/collapsible-submenu.html.twig',
)]
#[UIComponentExample(
    title: 'File tree',
    description: 'File tree style menu',
    templateName: '@UIToolboxDoc/examples/navigation/menu/file-tree.html.twig',
)]
#[UIComponentExample(
    title: 'Menu with active item',
    description: 'Menu highlighting the active item',
    templateName: '@UIToolboxDoc/examples/navigation/menu/menu-with-active-item.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal menu',
    description: 'Menu displayed horizontally',
    templateName: '@UIToolboxDoc/examples/navigation/menu/horizontal-menu.html.twig',
)]
#[UIComponentExample(
    title: 'Horizontal submenu',
    description: 'Horizontal menu with submenu',
    templateName: '@UIToolboxDoc/examples/navigation/menu/horizontal-submenu.html.twig',
)]
#[UIComponentExample(
    title: 'Mega menu with submenu (responsive)',
    description: 'Responsive mega menu with submenu',
    templateName: '@UIToolboxDoc/examples/navigation/menu/mega-menu-with-submenu-responsive.html.twig',
)]
#[UIComponentExample(
    title: 'Collapsible with submenu (responsive)',
    description: 'Responsive collapsible menu with submenu',
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
