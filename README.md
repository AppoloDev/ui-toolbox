# UI Toolbox Bundle

A Symfony bundle providing a collection of DaisyUI components for reuse across projects.

## Installation

```bash
composer require appolodev/ui-toolbox
```

## Configuration

### Documentation Web Application

The bundle includes a built-in documentation web application that provides examples and usage information for all the components. 

To make the documentation available only in the development environment and accessible at `/_uitoolbox`, create a file at `config/routes/ui_toolbox.yaml` with the following content:

```yaml
# Routes for UI Toolbox Bundle
# These routes are only loaded in the dev environment

when@dev:
    ui_toolbox:
        resource: '@UIToolboxBundle/config/routes/documentation.yaml'
        prefix: /_uitoolbox
        type: yaml
```

With this configuration, you can access the documentation at `/_uitoolbox` in your browser when in the development environment.

This approach is recommended because:
1. It restricts the documentation to the development environment, enhancing security in production
2. The `/_uitoolbox` prefix follows Symfony's convention for development tools (like `/_profiler`)
3. It avoids potential conflicts with your application's routes

## Tailwind CSS Integration

This bundle uses Tailwind CSS with DaisyUI components. Since many component classes are generated dynamically at runtime, we use a safelist approach to ensure all necessary classes are included in the final CSS build.

### Safelist

The file `assets/styles/tailwind-safelist.txt` contains all the CSS classes that should be included in the final build, even if they're not explicitly found in your templates. This is necessary for dynamically generated classes like `btn-primary`, `btn-lg`, etc.

If you add new components or modify existing ones, make sure to update the safelist file with any new classes.

## Usage

### Button Component

The Button component is a wrapper around the DaisyUI button component. It provides a simple way to create buttons with various styles, colors, sizes, and behaviors.

#### Basic Usage

```twig
{{ component('button', {
    label: 'Click me',
    color: 'primary'
}) }}
```

#### Available Options

- **label** (string): The text to display on the button
- **color** (string): The color variant of the button
  - Options: primary, secondary, accent, info, success, warning, error, neutral
- **style** (string): The style variant of the button
  - Options: outline, ghost, link, dash, soft
- **size** (string): The size of the button
  - Options: lg, md, sm, xs, xl
- **state** (string): The state of the button
  - Options: active, disabled
- **shape** (string): The shape modifier of the button
  - Options: wide, block, square, circle
- **class** (string): Additional CSS classes to add to the button
- **type** (string): The type attribute of the button
  - Options: button, submit, reset
  - Default: button
- **name** (string): The name attribute of the button
- **value** (string): The value attribute of the button
- **id** (string): The id attribute of the button
- **disabled** (boolean): Whether the button is disabled
  - Default: false
- **element** (string): The HTML element to use
  - Options: button, a, input
  - Default: button
- **href** (string): The href attribute (for <a> element)
- **target** (string): The target attribute (for <a> element)
  - Options: _blank, _self, _parent, _top
- **rel** (string): The rel attribute (for <a> element)

#### Examples

Primary button:
```twig
{{ component('button', {
    label: 'Primary Button',
    color: 'primary'
}) }}
```

Outline secondary button:
```twig
{{ component('button', {
    label: 'Outline Button',
    color: 'secondary',
    style: 'outline'
}) }}
```

Large success button:
```twig
{{ component('button', {
    label: 'Large Button',
    color: 'success',
    size: 'lg'
}) }}
```

Disabled error button:
```twig
{{ component('button', {
    label: 'Disabled Button',
    color: 'error',
    disabled: true
}) }}
```

Wide info button:
```twig
{{ component('button', {
    label: 'Wide Button',
    color: 'info',
    shape: 'wide'
}) }}
```

Submit button:
```twig
{{ component('button', {
    label: 'Submit',
    color: 'primary',
    type: 'submit'
}) }}
```

Using block content:
```twig
{% component button with {
    color: 'primary'
} %}
    {% block content %}
        <i class="fas fa-save"></i> Save
    {% endblock %}
{% endcomponent %}
```

Link button:
```twig
{{ component('button', {
    label: 'Visit our website',
    color: 'primary',
    element: 'a',
    href: 'https://example.com',
    target: '_blank',
    rel: 'noopener'
}) }}
```

Input button:
```twig
{{ component('button', {
    label: 'Click me',
    color: 'primary',
    element: 'input',
    type: 'button'
}) }}
```

Button with dash style:
```twig
{{ component('button', {
    label: 'Dash Style',
    color: 'primary',
    style: 'dash'
}) }}
```

Extra large button:
```twig
{{ component('button', {
    label: 'Extra Large',
    color: 'primary',
    size: 'xl'
}) }}
```
