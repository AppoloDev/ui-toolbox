<?php

namespace AppoloDev\UIToolboxBundle\UI\Actions\Button;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('button', template: '@UIToolbox/ui/actions/button/button.html.twig')]
#[UIComponentDoc(
    title: 'Button',
    description: 'A customizable button component based on DaisyUI. Supports color, size, style, state, shape, and more.',
    tags: ['button', 'daisyui', 'form', 'UI']
)]
#[UIComponentExample(
    title: 'Button sizes',
    description: 'Buttons with different sizes',
    code: <<<HTML
<button class="btn btn-xs">Extra Small</button>
<button class="btn btn-sm">Small</button>
<button class="btn btn-md">Medium</button>
<button class="btn btn-lg">Large</button>
<button class="btn btn-xl">Extra Large</button>
HTML,
    html: <<<TWIG
<twig:button label="XS" size="xs" />
<twig:button label="SM" size="sm" />
<twig:button label="MD" size="md" />
<twig:button label="LG" size="lg" />
<twig:button label="XL" size="xl" />
TWIG,
)]
#[UIComponentExample(
    title: 'Button colors',
    description: 'Buttons with different color variants',
    code: <<<HTML
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-accent">Accent</button>
<button class="btn btn-info">Info</button>
<button class="btn btn-success">Success</button>
<button class="btn btn-warning">Warning</button>
<button class="btn btn-error">Error</button>
<button class="btn btn-neutral">Neutral</button>
HTML,
    html: <<<TWIG
<twig:button label="Primary" color="primary" />
<twig:button label="Secondary" color="secondary" />
<twig:button label="Accent" color="accent" />
<twig:button label="Info" color="info" />
<twig:button label="Success" color="success" />
<twig:button label="Warning" color="warning" />
<twig:button label="Error" color="error" />
<twig:button label="Neutral" color="neutral" />
TWIG,
)]
#[UIComponentExample(
    title: 'Soft buttons',
    description: 'Soft styled buttons for all DaisyUI color variants',
    code: <<<HTML
<button class="btn btn-soft btn-primary">Primary</button>
<button class="btn btn-soft btn-secondary">Secondary</button>
<button class="btn btn-soft btn-accent">Accent</button>
<button class="btn btn-soft btn-info">Info</button>
<button class="btn btn-soft btn-success">Success</button>
<button class="btn btn-soft btn-warning">Warning</button>
<button class="btn btn-soft btn-error">Error</button>
<button class="btn btn-soft">Default</button>
HTML,
    html: <<<TWIG
<twig:button label="Primary" color="primary" style="soft" />
<twig:button label="Secondary" color="secondary" style="soft" />
<twig:button label="Accent" color="accent" style="soft" />
<twig:button label="Info" color="info" style="soft" />
<twig:button label="Success" color="success" style="soft" />
<twig:button label="Warning" color="warning" style="soft" />
<twig:button label="Error" color="error" style="soft" />
<twig:button label="Default" style="soft" />
TWIG,
)]
#[UIComponentExample(
    title: 'Outline buttons',
    description: 'Outline styled buttons for all DaisyUI color variants',
    code: <<<HTML
<button class="btn btn-outline btn-primary">Primary</button>
<button class="btn btn-outline btn-secondary">Secondary</button>
<button class="btn btn-outline btn-accent">Accent</button>
<button class="btn btn-outline btn-info">Info</button>
<button class="btn btn-outline btn-success">Success</button>
<button class="btn btn-outline btn-warning">Warning</button>
<button class="btn btn-outline btn-error">Error</button>
<button class="btn btn-outline">Default</button>
HTML,
    html: <<<TWIG
<twig:button label="Primary" color="primary" style="outline" />
<twig:button label="Secondary" color="secondary" style="outline" />
<twig:button label="Accent" color="accent" style="outline" />
<twig:button label="Info" color="info" style="outline" />
<twig:button label="Success" color="success" style="outline" />
<twig:button label="Warning" color="warning" style="outline" />
<twig:button label="Error" color="error" style="outline" />
<twig:button label="Default" style="outline" />
TWIG,
)]
#[UIComponentExample(
    title: 'Dashed buttons',
    description: 'Buttons with dashed borders',
    code: <<<HTML
<button class="btn btn-outline btn-dash btn-primary">Primary</button>
<button class="btn btn-outline btn-dash btn-secondary">Secondary</button>
<button class="btn btn-outline btn-dash btn-accent">Accent</button>
<button class="btn btn-outline btn-dash btn-info">Info</button>
<button class="btn btn-outline btn-dash btn-success">Success</button>
<button class="btn btn-outline btn-dash btn-warning">Warning</button>
<button class="btn btn-outline btn-dash btn-error">Error</button>
<button class="btn btn-outline btn-dash btn-neutral">Neutral</button>
HTML,
    html: <<<TWIG
<twig:button label="Primary" color="primary" style="dash" />
<twig:button label="Secondary" color="secondary" style="dash" />
<twig:button label="Accent" color="accent" style="dash" />
<twig:button label="Info" color="info" style="dash" />
<twig:button label="Success" color="success" style="dash" />
<twig:button label="Warning" color="warning" style="dash" />
<twig:button label="Error" color="error" style="dash" />
<twig:button label="Neutral" color="neutral" style="dash" />
TWIG,
)]
#[UIComponentExample(
    title: 'Ghost and link buttons',
    description: 'Minimalist button styles: ghost and link',
    code: <<<HTML
<button class="btn btn-ghost">Ghost</button>
<button class="btn btn-link">Link</button>
HTML,
    html: <<<TWIG
<twig:button label="Ghost" style="ghost" />
<twig:button label="Link" style="link" />
TWIG,
)]
#[UIComponentExample(
    title: 'Wide button',
    description: 'Button with full width style',
    code: <<<HTML
<button class="btn btn-wide">Wide</button>
HTML,
    html: <<<TWIG
<twig:button label="Wide" shape="wide" />
TWIG,
)]
#[UIComponentExample(
    title: 'Buttons with any HTML tags',
    description: 'Buttons rendered using different HTML elements',
    code: <<<HTML
<a role="button" class="btn">Link</a>
<button type="submit" class="btn">Button</button>
<input type="button" value="Input" class="btn" />
<input type="submit" value="Submit" class="btn" />
<input type="radio" aria-label="Radio" class="btn" />
<input type="checkbox" aria-label="Checkbox" class="btn" />
<input type="reset" value="Reset" class="btn" />
HTML,
    html: <<<TWIG
<twig:button label="Link" element="a" />
<twig:button label="Button" type="submit" />
<twig:button label="Input" element="input" type="button" />
<twig:button label="Submit" element="input" type="submit" />
<twig:button element="input" type="radio" class="btn" ariaLabel="Radio" />
<twig:button element="input" type="checkbox" class="btn" ariaLabel="Checkbox" />
<twig:button label="Reset" element="input" type="reset" />
TWIG,
)]
#[UIComponentExample(
    title: 'Disabled button',
    description: 'Button can be disabled using either the disabled attribute or a class',
    code: <<<HTML
<button class="btn" disabled="disabled">Disabled using attribute</button>
<button class="btn btn-disabled" tabindex="-1" role="button" aria-disabled="true">Disabled using class name</button>
HTML,
    html: <<<TWIG
<twig:button label="Disabled using attribute" disabled="true" />
<twig:button label="Disabled using class name" class="btn-disabled" ariaDisabled="true" tabindex="-1" role="button" />
TWIG,
)]
#[UIComponentExample(
    title: 'Square and circle buttons with icon',
    description: 'Buttons using only an icon with square or circle shape',
    code: <<<HTML
<button class="btn btn-square">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
  </svg>
</button>
<button class="btn btn-circle">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
  </svg>
</button>
HTML,
    html: <<<TWIG
<twig:button shape="square">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
  </svg>
</twig:button>
<twig:button shape="circle">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
  </svg>
</twig:button>
TWIG,
)]
#[UIComponentExample(
    title: 'Button with icon and text',
    description: 'Icon displayed alongside label',
    code: <<<HTML
<button class="btn">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
  </svg>
  Search
</button>
HTML,
    html: <<<TWIG
<twig:button>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-[1.2em]">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
  </svg>
  Search
</twig:button>
TWIG,
)]
#[UIComponentExample(
    title: 'Block button',
    description: 'Block level button taking full container width',
    code: <<<HTML
<button class="btn btn-block">Block</button>
HTML,
    html: <<<TWIG
<twig:button label="Block" shape="block" />
TWIG,
)]
#[UIComponentExample(
    title: 'Button with loading spinner',
    description: 'Button with loading indicator',
    code: <<<HTML
<button class="btn btn-square">
  <span class="loading loading-spinner"></span>
</button>

<button class="btn">
  <span class="loading loading-spinner"></span>
  loading
</button>
HTML,
    html: <<<TWIG
<twig:button shape="square">
  <span class="loading loading-spinner"></span>
</twig:button>

<twig:button>
  <span class="loading loading-spinner"></span>
  loading
</twig:button>
TWIG,
)]
#[UIComponentExample(
    title: 'Login buttons',
    description: 'Buttons used in authentication forms',
    code: <<<HTML
<button class="btn btn-primary">Login</button>
HTML,
    html: <<<TWIG
<twig:button label="Login" color="primary" />
TWIG,
)]
class Button
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Label', type: 'string', description: 'Text displayed in the button', default: '')]
    public string $label = '';

    #[UIComponentProp(label: 'Couleur', type: 'string|null', description: 'Button color', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Button style', default: null, acceptedValues: [null, 'soft', 'outline', 'dash', 'ghost', 'link'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'Taille', type: 'string|null', description: 'Button size', default: null, acceptedValues: [null, 'xl', 'lg', 'md', 'sm', 'xs'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'État', type: 'string|null', description: 'Button state', default: null, acceptedValues: [null, 'active', 'disabled'])]
    public ?string $state = null;

    #[UIComponentProp(label: 'Forme', type: 'string|null', description: 'Button shape', default: null, acceptedValues: [null, 'wide', 'block', 'square', 'circle'])]
    public ?string $shape = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    #[UIComponentProp(label: 'Type', type: 'string', description: 'Type attribute', default: 'button', acceptedValues: ['button', 'submit', 'reset', 'radio', 'checkbox'])]
    public string $type = 'button';

    #[UIComponentProp(label: 'Nom', type: 'string|null', description: 'Button name attribute', default: null)]
    public ?string $name = null;

    #[UIComponentProp(label: 'Valeur', type: 'string|null', description: 'Button value attribute', default: null)]
    public ?string $value = null;

    #[UIComponentProp(label: 'ID', type: 'string|null', description: 'Button id attribute', default: null)]
    public ?string $id = null;

    #[UIComponentProp(
        label: 'Désactivé',
        type: 'bool|string|null',
        description: 'Disables the button',
        default: 'false',
        acceptedValues: [true, false, 'true', 'false', null, '']
    )]
    public bool|string|null $disabled = false;

    #[UIComponentProp(
        label: 'Élément HTML',
        type: 'string',
        description: 'HTML element used',
        default: 'button',
        acceptedValues: ['button', 'a', 'input']
    )]
    public string $element = 'button';

    #[UIComponentProp(label: 'Href', type: 'string|null', description: 'Link href if element is "a"', default: null)]
    public ?string $href = null;

    #[UIComponentProp(label: 'Target', type: 'string|null', description: 'Link target', default: null)]
    public ?string $target = null;

    #[UIComponentProp(label: 'Rel', type: 'string|null', description: 'Link relation', default: null)]
    public ?string $rel = null;

    /**
     * Get the complete CSS class string for the button.
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

        if ($this->color) {
            $classes[] = "btn-{$this->color}";
        }

        if ($this->style !== null) {
            $classes[] = "btn-{$this->style}";
        }

        if ($this->size) {
            $classes[] = "btn-{$this->size}";
        }

        if ($this->state === 'active') {
            $classes[] = 'btn-active';
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
