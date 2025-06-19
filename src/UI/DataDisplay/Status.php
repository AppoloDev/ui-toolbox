<?php

namespace AppoloDev\UIToolboxBundle\UI\DataDisplay;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('status', template: '@UIToolbox/ui/data_display/status.html.twig')]
#[UIComponentDoc(
    title: 'Status',
    description: 'A customizable status component based on DaisyUI. Supports color, size, CSS classes.',
    url: 'https://daisyui.com/components/status/',
)]
#[UIComponentExample(
    title: 'Status',
    description: 'Basic usage of status',
    templateName: '@UIToolboxDoc/examples/data_display/status/default.html.twig',
)]
#[UIComponentExample(
    title: 'Status sizes',
    description: 'Statuses with different sizes',
    templateName: '@UIToolboxDoc/examples/data_display/status/sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Status with colors',
    description: 'Statuses with different color variants',
    templateName: '@UIToolboxDoc/examples/data_display/status/colors.html.twig',
)]
#[UIComponentExample(
    title: 'Status with ping animation',
    description: 'Statuses with ping animation effect',
    templateName: '@UIToolboxDoc/examples/data_display/status/ping.html.twig',
)]
#[UIComponentExample(
    title: 'Status with bounce animation',
    description: 'Statuses with bounce animation effect',
    templateName: '@UIToolboxDoc/examples/data_display/status/bounce.html.twig',
)]
class Status
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Sets the status color.', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Size', type: 'string|null', description: 'Sets the status size.', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['status'];

        if ($this->color) {
            $classes[] = "status-{$this->color}";
        }

        if ($this->size) {
            $classes[] = "status-{$this->size}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
