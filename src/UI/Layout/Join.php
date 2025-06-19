<?php

namespace AppoloDev\UIToolboxBundle\UI\Layout;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('join', template: '@UIToolbox/ui/layout/join.html.twig')]
#[UIComponentDoc(
    title: 'Join',
    description: 'A customizable join component based on DaisyUI. Supports direction, CSS classes.',
    url: 'https://daisyui.com/components/join/',
)]
#[UIComponentExample(
    title: 'Horizontal group of buttons',
    description: 'Displays buttons styled as a single joined element horizontally.',
    templateName: '@UIToolboxDoc/examples/layout/join/join.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical stack of elements',
    description: 'Displays elements stacked vertically in a joined layout.',
    templateName: '@UIToolboxDoc/examples/layout/join/join-vertical.html.twig',
)]
#[UIComponentExample(
    title: 'Responsive horizontal/vertical layout',
    description: 'Adapts the layout direction based on screen size: vertical on small screens and horizontal on large.',
    templateName: '@UIToolboxDoc/examples/layout/join/join-responsive.html.twig',
)]
#[UIComponentExample(
    title: 'Group with mixed form elements',
    description: 'Includes input, select, and button elements within a joined group.',
    templateName: '@UIToolboxDoc/examples/layout/join/join-extra.html.twig',
)]
#[UIComponentExample(
    title: 'Rounded border on last element',
    description: 'Adds a custom rounded border to the last item in the joined group.',
    templateName: '@UIToolboxDoc/examples/layout/join/join-rounded.html.twig',
)]
#[UIComponentExample(
    title: 'Styled radio input group',
    description: 'Displays radio buttons styled and joined to appear as a unified group.',
    templateName: '@UIToolboxDoc/examples/layout/join/join-radio.html.twig',
)]
class Join
{
    #[UIComponentProp(label: 'Direction', type: 'string|null', description: 'Sets the direction in which the elements are joined.', default: null, acceptedValues: [null, 'vertical', 'horizontal'])]
    public ?string $direction = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['join'];

        if (null !== $this->direction) {
            $classes[] = 'join-'.$this->direction;
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
