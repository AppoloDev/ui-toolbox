<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Breadcrumb;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('breadcrumbItem', template: '@UIToolbox/ui/navigation/breadcrumb/breadcrumb_item.html.twig')]
class BreadcrumbItem
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    #[UIComponentProp(label: 'Link', type: 'string|null', description: 'Defines the anchor link destination.', default: null)]
    public ?string $href = null;

    public function getClasses(): string
    {
        $classes = [];

        if (null === $this->href) {
            $classes[] = '!cursor-default !hover:no-underline';
        }
        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
