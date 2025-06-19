<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('pagination', template: '@UIToolbox/ui/navigation/pagination/pagination.html.twig')]
#[UIComponentDoc(
    title: 'Pagination',
    description: 'A customizable navigation component based on DaisyUI. Supports class.'
)]
#[UIComponentExample(
    title: 'Default',
    description: 'Default pagination navigation',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-default.html.twig',
)]
#[UIComponentExample(
    title: 'Disabled',
    description: 'Pagination with disabled state',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-disabled.html.twig',
)]
#[UIComponentExample(
    title: 'Control: Arrow',
    description: 'Pagination using arrow controls',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-arrow.html.twig',
)]
#[UIComponentExample(
    title: 'Control: Button',
    description: 'Pagination using button controls',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-button.html.twig',
)]
#[UIComponentExample(
    title: 'Variant: Ghost',
    description: 'Pagination with ghost variant',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-ghost.html.twig',
)]
#[UIComponentExample(
    title: 'Variant: Soft',
    description: 'Pagination with soft variant',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-soft.html.twig',
)]
#[UIComponentExample(
    title: 'Variant: Outline',
    description: 'Pagination with outline variant',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-outline.html.twig',
)]
#[UIComponentExample(
    title: 'Shape: Circle',
    description: 'Pagination with circle shape',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-circle.html.twig',
)]
#[UIComponentExample(
    title: 'Orientation: Vertical',
    description: 'Vertical pagination navigation',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-vertical.html.twig',
)]
#[UIComponentExample(
    title: 'Size',
    description: 'Pagination with different sizes',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-size.html.twig',
)]
class Pagination
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['pagination'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
