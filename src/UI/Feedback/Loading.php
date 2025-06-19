<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('loading', template: '@UIToolbox/ui/feedback/loading.html.twig')]
#[UIComponentDoc(
    title: 'Loading',
    description: 'A customizable loading component based on DaisyUI. Supports color, style, size, and custom classes.'
)]
#[UIComponentExample(
    title: 'Spinner animation',
    description: 'Displays a spinner loading animation.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-spinner.html.twig',
)]
#[UIComponentExample(
    title: 'Dots animation',
    description: 'Shows a loading animation with dots.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-dots.html.twig',
)]
#[UIComponentExample(
    title: 'Ring animation',
    description: 'Displays a ring style loading animation.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-ring.html.twig',
)]
#[UIComponentExample(
    title: 'Ball animation',
    description: 'Shows a ball style loading animation.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-ball.html.twig',
)]
#[UIComponentExample(
    title: 'Bars animation',
    description: 'Displays a bars style loading animation.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-bars.html.twig',
)]
#[UIComponentExample(
    title: 'Infinity animation',
    description: 'Displays an infinity style loading animation.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-infinity.html.twig',
)]
#[UIComponentExample(
    title: 'Color variants',
    description: 'Demonstrates loading animations with color options.',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-colors.html.twig',
)]
class Loading
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(
        label: 'Color',
        type: 'string|null',
        description: 'Defines the color variant to use.',
        default: null,
        acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral']
    )]
    public ?string $color = null;

    #[UIComponentProp(
        label: 'Style',
        type: 'string|null',
        description: 'Specifies the animation style to display.',
        default: null,
        acceptedValues: [null, 'spinner', 'dots', 'ring', 'ball', 'bars', 'infinity']
    )]
    public ?string $style = null;

    #[UIComponentProp(
        label: 'Size',
        type: 'string|null',
        description: 'Controls the size of the items.',
        default: null,
        acceptedValues: [null, 'xs', 'sm', 'md', 'lg', 'xl']
    )]
    public ?string $size = null;

    #[UIComponentProp(
        label: 'CSS Classes',
        type: 'string|null',
        description: 'Adds custom CSS classes for extra styling.',
        default: null
    )]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['loading'];

        if ($this->color) {
            $classes[] = "text-{$this->color}";
        }

        if ($this->style) {
            $classes[] = "loading-{$this->style}";
        }

        if ($this->size) {
            $classes[] = "loading-{$this->size}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
