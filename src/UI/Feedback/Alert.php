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
    title: 'Basic Alert with Icon',
    description: 'Displays a simple alert containing an icon and a message.',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert.html.twig',
)]
#[UIComponentExample(
    title: 'Alert Color Variants',
    description: 'Shows alerts in multiple color schemes to indicate different statuses.',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-colors.html.twig',
)]
#[UIComponentExample(
    title: 'Soft Style Alert',
    description: 'Provides a soft background style for alerts in various colors.',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-soft.html.twig',
)]
#[UIComponentExample(
    title: 'Outline Style Alert',
    description: 'Uses an outlined border appearance for alerts across colors.',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-outline.html.twig',
)]
#[UIComponentExample(
    title: 'Dashed Border Alert',
    description: 'Displays alerts with a dashed border style for visual emphasis.',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-dash.html.twig',
)]
#[UIComponentExample(
    title: 'Alert with Buttons and Responsive Layout',
    description: 'Includes interactive buttons and adapts the layout responsively.',
    templateName: '@UIToolboxDoc/examples/feedback/alert/alert-with-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Alert with Heading and Description',
    description: 'Displays an alert featuring a heading and supporting description text.',
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
