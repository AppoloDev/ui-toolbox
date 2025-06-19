<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('alert', template: '@UIToolbox/ui/feedback/alert.html.twig')]
#[UIComponentDoc(
    title: 'Alert',
    description: 'A customizable alert component based on DaisyUI. Supports color, style, and additional classes.',
    url: 'https://daisyui.com/components/alert/',
)]
#[UIComponentExample(
    title: 'Alert',
    description: 'Simple alert with icon and message',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert.html.twig',
)]
#[UIComponentExample(
    title: 'Alert colors',
    description: 'Alerts with different color variants',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-colors.html.twig',
)]
#[UIComponentExample(
    title: 'Alert soft style',
    description: 'Soft style alert variant for different colors',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-soft.html.twig',
)]
#[UIComponentExample(
    title: 'Alert outline style',
    description: 'Outline style alert variant for different colors',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-outline.html.twig',
)]
#[UIComponentExample(
    title: 'Alert dash style',
    description: 'Dashed border style alert variant for different colors',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-dash.html.twig',
)]
#[UIComponentExample(
    title: 'Alert with buttons + responsive',
    description: 'Alert layout with buttons and responsive direction',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-with-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Alert with title and description',
    description: 'Alert with heading and description layout',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-title-description.html.twig',
)]
class Alert
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Defines the alert color.', default: null, acceptedValues: [null, 'info', 'success', 'warning', 'error'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Sets the visual style of the alert.', default: null, acceptedValues: [null, 'soft', 'outline', 'dash'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['alert'];

        if ($this->color) {
            $classes[] = "alert-{$this->color}";
        }

        if ($this->style !== null) {
            $classes[] = "alert-{$this->style}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
