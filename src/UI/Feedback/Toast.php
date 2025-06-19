<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('toast', template: '@UIToolbox/ui/feedback/toast.html.twig')]
#[UIComponentDoc(
    title: 'Toast',
    description: 'A customizable toast component based on DaisyUI. Supports CSS classes, horizontal position, vertical position.',
    url: 'https://daisyui.com/components/toast/'
)]
#[UIComponentExample(
    title: 'Alert Toast',
    description: 'Displays a toast containing an alert for notification purposes.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-alert.html.twig',
)]
#[UIComponentExample(
    title: 'Top Start Position',
    description: 'Positions the toast at the top and start (left) of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-top-start.html.twig',
)]
#[UIComponentExample(
    title: 'Top Center Position',
    description: 'Places the toast at the top and center of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-top-center.html.twig',
)]
#[UIComponentExample(
    title: 'Top End Position',
    description: 'Positions the toast at the top and end (right) of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-top-end.html.twig',
)]
#[UIComponentExample(
    title: 'Middle Start Position',
    description: 'Shows the toast vertically centered and aligned to the start (left).',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-middle-start.html.twig',
)]
#[UIComponentExample(
    title: 'Middle Center Position',
    description: 'Displays the toast at the vertical and horizontal center of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-middle-center.html.twig',
)]
#[UIComponentExample(
    title: 'Middle End Position',
    description: 'Places the toast vertically centered at the end (right) of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-middle-end.html.twig',
)]
#[UIComponentExample(
    title: 'Bottom Start Position',
    description: 'Positions the toast at the bottom and start (left) of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-bottom-start.html.twig',
)]
#[UIComponentExample(
    title: 'Bottom Center Position',
    description: 'Shows the toast at the bottom and centered horizontally.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-bottom-center.html.twig',
)]
#[UIComponentExample(
    title: 'Bottom End Position',
    description: 'Displays the toast at the bottom and end (right) of the viewport.',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-bottom-end.html.twig',
)]
class Toast
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(
        label: 'CSS Classes',
        type: 'string|null',
        description: 'Adds custom CSS classes for extra styling.',
        default: null
    )]
    public ?string $class = null;

    #[UIComponentProp(
        label: 'Horizontal Position',
        type: 'string|null',
        description: 'Determines the horizontal position of the toast.',
        default: null,
        acceptedValues: [null, 'start', 'center', 'end']
    )]
    public ?string $horizontal = null;

    #[UIComponentProp(
        label: 'Vertical Position',
        type: 'string|null',
        description: 'Determines the vertical position of the toast.',
        default: null,
        acceptedValues: [null, 'top', 'middle', 'bottom']
    )]
    public ?string $vertical = null;

    public function getClasses(): string
    {
        $classes = ['toast'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        if ($this->horizontal !== null) {
            $classes[] = "toast-{$this->horizontal}";
        }

        if ($this->vertical !== null) {
            $classes[] = "toast-{$this->vertical}";
        }

        return \implode(' ', $classes);
    }
}
