<?php

namespace AppoloDev\UIToolboxBundle\UI\Actions;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('button', template: '@UIToolbox/ui/actions/button.html.twig')]
#[UIComponentDoc(
    title: 'Button',
    description: 'A customizable action element based on DaisyUI. Supports color, size, style, shape, class, element.',
    url: 'https://daisyui.com/components/button/',
)]
#[UIComponentExample(
    title: 'Sizes: Small to Extra Large',
    description: 'Displays all available button sizes from extra small to extra large.',
    templateName: '@UIToolboxDoc/examples/actions/button/sized-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Colors: All Variants',
    description: 'Shows each button color variant supported by DaisyUI.',
    templateName:  '@UIToolboxDoc/examples/actions/button/colored-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Soft Style: All Colors',
    description: 'Applies the soft visual style to every DaisyUI color option.',
    templateName: '@UIToolboxDoc/examples/actions/button/soft-styled-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Outline Style: All Colors',
    description: 'Applies the outline visual style to every DaisyUI color option.',
    templateName:  '@UIToolboxDoc/examples/actions/button/outline-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Dashed Style: All Colors',
    description: 'Applies a dashed border style to each color variant.',
    templateName: '@UIToolboxDoc/examples/actions/button/dashed-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Minimalist Styles: Ghost and Link',
    description: 'Uses ghost and link styles for minimalist button appearance.',
    templateName: '@UIToolboxDoc/examples/actions/button/minimalist-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Wide Shape: Full Width',
    description: 'Stretches the button to take the full available width.',
    templateName:  '@UIToolboxDoc/examples/actions/button/wide-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'HTML Element Variants',
    description: 'Renders the button using various HTML elements such as button, anchor, and input.',
    templateName: '@UIToolboxDoc/examples/actions/button/anytag-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Disabled State',
    description: 'Shows how the button appears and behaves when disabled.',
    templateName:  '@UIToolboxDoc/examples/actions/button/disabled-button.html.twig',
)]
#[UIComponentExample(
    title: 'Icon Only: Square and Circle',
    description: 'Shows icon-only buttons with square and circle shapes.',
    templateName: '@UIToolboxDoc/examples/actions/button/square-and-circle-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Icon and Text',
    description: 'Places an icon next to the button label for visual emphasis.',
    templateName:  '@UIToolboxDoc/examples/actions/button/icon-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Block Shape: Full Container Width',
    description: 'Expands the button to occupy the entire width of its container.',
    templateName:  '@UIToolboxDoc/examples/actions/button/block-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Loading State',
    description: 'Displays a button with a loading spinner to indicate progress.',
    templateName: '@UIToolboxDoc/examples/actions/button/loading-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Authentication Buttons',
    description: 'Presents login buttons styled for popular authentication services.',
    templateName: '@UIToolboxDoc/examples/actions/button/login-buttons.html.twig',
)]
class Button
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(
        label: 'Color',
        type: 'string|null',
        description: 'Defines the color style such as primary, secondary, or accent.',
        default: null,
        acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral']
    )]
    public ?string $color = null;

    #[UIComponentProp(
        label: 'Style',
        type: 'string|null',
        description: 'Specifies the visual style such as soft, outline, or ghost.',
        default: null,
        acceptedValues: [null, 'soft', 'outline', 'dash', 'ghost', 'link']
    )]
    public ?string $style = null;

    #[UIComponentProp(
        label: 'Size',
        type: 'string|null',
        description: 'Determines the size, for example large or small.',
        default: null,
        acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs']
    )]
    public ?string $size = null;

    #[UIComponentProp(
        label: 'Shape',
        type: 'string|null',
        description: 'Applies a shape such as wide, block, square, or circle.',
        default: null,
        acceptedValues: [null, 'wide', 'block', 'square', 'circle']
    )]
    public ?string $shape = null;

    #[UIComponentProp(
        label: 'CSS Classes',
        type: 'string|null',
        description: 'Adds custom CSS classes for extra styling.',
        default: null
    )]
    public ?string $class = null;

    #[UIComponentProp(
        label: 'HTML Element',
        type: 'string',
        description: 'Selects the HTML element to render, such as button, anchor, or input.',
        default: 'button',
        acceptedValues: ['button', 'a', 'input']
    )]
    public string $element = 'button';

    public function getClasses(): string
    {
        $classes = ['btn'];

        if ($this->color) {
            $classes[] = "btn-{$this->color}";
        }

        if ($this->style !== null) {
            $classes[] = "btn-{$this->style}";
        }

        if ($this->size) {
            $classes[] = "btn-{$this->size}";
        }

        if ($this->shape) {
            $classes[] = "btn-{$this->shape}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
