<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Breadcrumb;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('breadcrumb', template: '@UIToolbox/ui/navigation/breadcrumb/breadcrumb.html.twig')]
#[UIComponentDoc(
    title: 'Breadcrumb',
    description: 'A customizable breadcrumb component based on DaisyUI. Supports class.',
    url: 'https://daisyui.com/components/breadcrumbs/',
)]
#[UIComponentExample(
    title: 'Breadcrumbs',
    description: 'Simple breadcrumb navigation',
    templateName: '@UIToolboxDoc/examples/navigation/breadcrumb/breadcrumb.html.twig',
)]
#[UIComponentExample(
    title: 'Breadcrumbs with icons',
    description: 'Breadcrumbs containing SVG icons alongside text',
    templateName: '@UIToolboxDoc/examples/navigation/breadcrumb/breadcrumb-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Breadcrumbs with max-width',
    description: 'Breadcrumbs layout with limited horizontal space',
    templateName: '@UIToolboxDoc/examples/navigation/breadcrumb/breadcrumb-max-width.html.twig',
)]
class Breadcrumb
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['breadcrumbs'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
