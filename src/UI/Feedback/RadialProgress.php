<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('radialProgress', template: '@UIToolbox/ui/feedback/radial_progress.html.twig')]
#[UIComponentDoc(
    title: 'Radial Progress',
    description: 'A customizable radial progress component based on DaisyUI. Supports color, style, and additional classes.',
    url: 'https://daisyui.com/components/radial-progress/',
)]
#[UIComponentExample(
    title: 'Radial progress',
    description: 'Displays a radial progress component with default configuration.',
    templateName: '@UIToolboxDoc/examples/feedback/radial_progress/radial_progress.html.twig',
)]
#[UIComponentExample(
    title: 'Different values',
    description: 'Displays multiple radial progress components with different values.',
    templateName: '@UIToolboxDoc/examples/feedback/radial_progress/different_values.html.twig',
)]
#[UIComponentExample(
    title: 'Custom color',
    description: 'Displays a radial progress component with a custom color.',
    templateName: '@UIToolboxDoc/examples/feedback/radial_progress/custom_color.html.twig',
)]
#[UIComponentExample(
    title: 'With background color and border',
    description: 'Displays a radial progress component with background and border.',
    templateName: '@UIToolboxDoc/examples/feedback/radial_progress/with_background.html.twig',
)]
#[UIComponentExample(
    title: 'Custom size and custom thickness',
    description: 'Displays a radial progress component with custom size and thickness.',
    templateName: '@UIToolboxDoc/examples/feedback/radial_progress/custom_size.html.twig',
)]
class RadialProgress
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Color', type: 'string|null', description: 'Defines the alert color.', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['radial-progress'];

        if ($this->color) {
            $classes[] = "progress-{$this->color}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
