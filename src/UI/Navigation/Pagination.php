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
    description: 'A customizable pagination component based on DaisyUI. Supports class.',
    url: 'https://daisyui.com/components/button/',
)]
#[UIComponentExample(
    title: 'Basic pagination',
    description: 'Displays a standard horizontal pagination with default style.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-default.html.twig',
)]
#[UIComponentExample(
    title: 'Pagination with disabled items',
    description: 'Displays pagination controls with disabled states for some pages.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-disabled.html.twig',
)]
#[UIComponentExample(
    title: 'Pagination with arrow controls',
    description: 'Uses arrow buttons for navigating between pages.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-arrow.html.twig',
)]
#[UIComponentExample(
    title: 'Pagination with numbered buttons',
    description: 'Includes numbered button controls for direct page access.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-button.html.twig',
)]
#[UIComponentExample(
    title: 'Ghost style pagination',
    description: 'Applies the ghost visual variant for a minimal style.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-ghost.html.twig',
)]
#[UIComponentExample(
    title: 'Soft style pagination',
    description: 'Provides a soft variant with subtle background styling.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-soft.html.twig',
)]
#[UIComponentExample(
    title: 'Outline style pagination',
    description: 'Uses outline buttons to emphasize page boundaries.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-outline.html.twig',
)]
#[UIComponentExample(
    title: 'Circular pagination',
    description: 'Displays pagination items with a circular shape.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-circle.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical pagination',
    description: 'Displays pagination controls stacked vertically.',
    templateName: '@UIToolboxDoc/examples/navigation/pagination/pagination-vertical.html.twig',
)]
#[UIComponentExample(
    title: 'Pagination with custom sizes',
    description: 'Provides pagination items in multiple predefined sizes.',
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
