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
    title: 'Toast with alert inside',
    description: 'Basic toast component with an alert',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-alert.html.twig',
)]
#[UIComponentExample(
    title: 'Toast top and start',
    description: 'Toast aligned top and start',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-top-start.html.twig',
)]
#[UIComponentExample(
    title: 'Toast top and center',
    description: 'Toast aligned top and center',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-top-center.html.twig',
)]
#[UIComponentExample(
    title: 'Toast top and end',
    description: 'Toast aligned top and end',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-top-end.html.twig',
)]
#[UIComponentExample(
    title: 'Toast middle and start',
    description: 'Toast aligned middle and start',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-middle-start.html.twig',
)]
#[UIComponentExample(
    title: 'Toast middle and center',
    description: 'Toast aligned middle and center',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-middle-center.html.twig',
)]
#[UIComponentExample(
    title: 'Toast middle and end',
    description: 'Toast aligned middle and end',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-middle-end.html.twig',
)]
#[UIComponentExample(
    title: 'Toast bottom and start',
    description: 'Toast aligned bottom and start',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-bottom-start.html.twig',
)]
#[UIComponentExample(
    title: 'Toast bottom and center',
    description: 'Toast aligned bottom and center',
    templateName: '@UIToolboxDoc/examples/feedback/toast/toast-bottom-center.html.twig',
)]
#[UIComponentExample(
    title: 'Toast bottom and end',
    description: 'Toast aligned bottom and end',
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
