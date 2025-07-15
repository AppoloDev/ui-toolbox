<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('progress', template: '@UIToolbox/ui/feedback/progress.html.twig')]
#[UIComponentDoc(
    title: 'Progress',
    description: 'A customizable progress component based on DaisyUI. Supports color, style, and additional classes.',
    url: 'https://daisyui.com/components/progress/',
)]
#[UIComponentExample(
    title: 'Progress',
    description: 'Displays a simple alert containing an icon and a message.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/progress.html.twig',
)]
#[UIComponentExample(
    title: 'Primary color',
    description: 'Shows alerts in multiple color schemes to indicate different statuses.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/primary.html.twig',
)]
#[UIComponentExample(
    title: 'Secondary color',
    description: 'Provides a soft background style for alerts in various colors.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/secondary.html.twig',
)]
#[UIComponentExample(
    title: 'Accent color',
    description: 'Uses an outlined border appearance for alerts across colors.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/accent.html.twig',
)]
#[UIComponentExample(
    title: 'Neutral color',
    description: 'Displays alerts with a dashed border style for visual emphasis.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/neutral.html.twig',
)]
#[UIComponentExample(
    title: 'Info color',
    description: 'Includes interactive buttons and adapts the layout responsively.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/info.html.twig',
)]
#[UIComponentExample(
    title: 'Success color',
    description: 'Displays an alert featuring a heading and supporting description text.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/success.html.twig',
)]
#[UIComponentExample(
    title: 'Warning color',
    description: 'Displays an alert featuring a heading and supporting description text.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/warning.html.twig',
)]
#[UIComponentExample(
    title: 'Error color',
    description: 'Displays an alert featuring a heading and supporting description text.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/error.html.twig',
)]
#[UIComponentExample(
    title: 'Indeterminate (without value)',
    description: 'Displays an alert featuring a heading and supporting description text.',
    templateName: '@UIToolboxDoc/examples/feedback/progress/indeterminate.html.twig',
)]
class Progress
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Defines the alert color.', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['progress'];

        if ($this->color) {
            $classes[] = "progress-{$this->color}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
