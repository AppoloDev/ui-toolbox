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
    description: 'A customizable button component based on DaisyUI. Supports color, size, style, state, shape, and more.',
    tags: ['button', 'daisyui', 'form', 'UI']
)]
#[UIComponentExample(
    title: 'Button sizes',
    description: 'Buttons with different sizes',
    templateName: '@UIToolboxDoc/examples/actions/button/sized-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Button colors',
    description: 'Buttons with different color variants',
    templateName:  '@UIToolboxDoc/examples/actions/button/colored-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Soft buttons',
    description: 'Soft styled buttons for all DaisyUI color variants',
    templateName: '@UIToolboxDoc/examples/actions/button/soft-styled-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Outline buttons',
    description: 'Outline styled buttons for all DaisyUI color variants',
    templateName:  '@UIToolboxDoc/examples/actions/button/outline-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Dashed buttons',
    description: 'Buttons with dashed borders',
    templateName: '@UIToolboxDoc/examples/actions/button/dashed-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Ghost and link buttons',
    description: 'Minimalist button styles: ghost and link',
    templateName: '@UIToolboxDoc/examples/actions/button/minimalist-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Wide button',
    description: 'Button with full width style',
    templateName:  '@UIToolboxDoc/examples/actions/button/wide-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Buttons with any HTML tags',
    description: 'Buttons rendered using different HTML elements',
    templateName: '@UIToolboxDoc/examples/actions/button/anytag-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Disabled button',
    description: 'Button can be disabled using either the disabled attribute or a class',
    templateName:  '@UIToolboxDoc/examples/actions/button/disabled-button.html.twig',
)]
#[UIComponentExample(
    title: 'Square and circle buttons with icon',
    description: 'Buttons using only an icon with square or circle shape',
    templateName: '@UIToolboxDoc/examples/actions/button/square-and-circle-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Button with icon and text',
    description: 'Icon displayed alongside label',
    templateName:  '@UIToolboxDoc/examples/actions/button/icon-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Block button',
    description: 'Block level button taking full container width',
    templateName:  '@UIToolboxDoc/examples/actions/button/block-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Button with loading spinner',
    description: 'Button with loading indicator',
    templateName: '@UIToolboxDoc/examples/actions/button/loading-buttons.html.twig',
)]
#[UIComponentExample(
    title: 'Login buttons',
    description: 'Buttons used for authentication with popular services.',
    templateName: '@UIToolboxDoc/examples/actions/button/login-buttons.html.twig',
)]
class Button
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Couleur', type: 'string|null', description: 'Button color', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Button style', default: null, acceptedValues: [null, 'soft', 'outline', 'dash', 'ghost', 'link'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'Taille', type: 'string|null', description: 'Button size', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'Forme', type: 'string|null', description: 'Button shape', default: null, acceptedValues: [null, 'wide', 'block', 'square', 'circle'])]
    public ?string $shape = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    #[UIComponentProp(
        label: 'Élément HTML',
        type: 'string',
        description: 'HTML element used',
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
