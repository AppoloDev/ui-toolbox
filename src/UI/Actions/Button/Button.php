<?php

namespace AppoloDev\UIToolboxBundle\UI\Actions\Button;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('button', template: '@UIToolbox/ui/actions/button/button.html.twig')]
class Button
{
    /**
     * Button text content
     */
    public string $label = '';

    /**
     * Button color variant
     * Options: primary, secondary, accent, info, success, warning, error, neutral
     */
    public ?string $color = null;

    /**
     * Button style variant
     * Options: outline, ghost, link, dash, soft
     */
    public ?string $style = null;

    /**
     * Button size
     * Options: lg, md, sm, xs, xl
     */
    public ?string $size = null;

    /**
     * Button state
     * Options: active, disabled
     */
    public ?string $state = null;

    /**
     * Button shape modifiers
     * Options: wide, block, square, circle
     */
    public ?string $shape = null;

    /**
     * Additional CSS classes
     */
    public ?string $class = null;

    /**
     * Button type attribute
     * Options: button, submit, reset
     */
    public string $type = 'button';

    /**
     * Button name attribute
     */
    public ?string $name = null;

    /**
     * Button value attribute
     */
    public ?string $value = null;

    /**
     * Button id attribute
     */
    public ?string $id = null;

    /**
     * Button disabled state
     */
    public bool $disabled = false;

    /**
     * HTML element to use
     * Options: button, a, input
     */
    public string $element = 'button';

    /**
     * Link href attribute (for <a> element)
     */
    public ?string $href = null;

    /**
     * Link target attribute (for <a> element)
     * Options: _blank, _self, _parent, _top
     */
    public ?string $target = null;

    /**
     * Link rel attribute (for <a> element)
     */
    public ?string $rel = null;

    /**
     * Get the complete CSS class string for the button
     *
     * Note: Since these classes are dynamically generated at runtime,
     * they need to be included in the tailwind-safelist.txt file
     * to ensure they're included in the final CSS build.
     *
     * @see /assets/styles/tailwind-safelist.txt
     */
    public function getClasses(): string
    {
        $classes = ['btn'];

        // Add color variant
        if ($this->color) {
            $classes[] = "btn-{$this->color}";
        }

        // Add style variant
        if ($this->style) {
            $classes[] = "btn-{$this->style}";
        }

        // Add size
        if ($this->size) {
            $classes[] = "btn-{$this->size}";
        }

        // Add state
        if ($this->state === 'active') {
            $classes[] = 'btn-active';
        }

        // Add shape modifiers
        if ($this->shape) {
            $classes[] = "btn-{$this->shape}";
        }

        // Add custom classes
        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }
}
