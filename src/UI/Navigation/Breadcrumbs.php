<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('breadcrumbs', template: '@UIToolbox/ui/navigation/breadcrumbs.html.twig')]
#[UIComponentDoc(
    title: 'Breadcrumbs',
    description: 'Breadcrumb navigation component based on DaisyUI',
    tags: ['breadcrumbs', 'navigation', 'daisyui']
)]
#[UIComponentExample(
    title: 'Breadcrumbs',
    description: 'Simple breadcrumb navigation',
    templateName: '@UIToolboxDoc/examples/navigation/breadcrumbs/breadcrumbs.html.twig',
)]
#[UIComponentExample(
    title: 'Breadcrumbs with icons',
    description: 'Breadcrumbs containing SVG icons alongside text',
    templateName: '@UIToolboxDoc/examples/navigation/breadcrumbs/breadcrumbs-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Breadcrumbs with max-width',
    description: 'Breadcrumbs layout with limited horizontal space',
    templateName: '@UIToolboxDoc/examples/navigation/breadcrumbs/breadcrumbs-max-width.html.twig',
)]
class Breadcrumbs
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    #[UIComponentProp(label: 'ID', type: 'string|null', description: 'Breadcrumb id attribute', default: null)]
    public ?string $id = null;

    #[UIComponentProp(label: 'Items', type: 'array', description: 'Breadcrumb items as raw HTML elements')]
    public array $items = [];

    public function getClasses(): string
    {
        $classes = ['breadcrumbs'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }
}
