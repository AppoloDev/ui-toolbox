<?php

namespace AppoloDev\UIToolboxBundle\UI\Layout;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('join', template: '@UIToolbox/ui/layout/join.html.twig')]
#[UIComponentDoc(
    title: 'Join',
    description: 'Group UI elements together (e.g. buttons, inputs) using DaisyUI’s join component.',
    tags: ['join', 'group', 'layout', 'UI']
)]
#[UIComponentExample(
    title: 'Join',
    description: 'Basic join group with buttons',
    templateName: '@UIToolboxDoc/examples/layout/join/join.html.twig',
)]
#[UIComponentExample(
    title: 'Group items vertically',
    description: 'Join items stacked vertically',
    templateName: '@UIToolboxDoc/examples/layout/join/join-vertical.html.twig',
)]
#[UIComponentExample(
    title: 'Responsive: vertical on small screen, horizontal on large',
    description: 'Join layout adapting to screen size',
    templateName: '@UIToolboxDoc/examples/layout/join/join-responsive.html.twig',
)]
#[UIComponentExample(
    title: 'With extra elements in the group',
    description: 'Join group with mixed elements (input, select, button)',
    templateName: '@UIToolboxDoc/examples/layout/join/join-extra.html.twig',
)]
#[UIComponentExample(
    title: 'Custom border radius',
    description: 'Join with a rounded border on the last button',
    templateName: '@UIToolboxDoc/examples/layout/join/join-rounded.html.twig',
)]
#[UIComponentExample(
    title: 'Join radio inputs with button style',
    description: 'Join group with styled radio inputs',
    templateName: '@UIToolboxDoc/examples/layout/join/join-radio.html.twig',
)]
class Join
{
    #[UIComponentProp(label: 'Direction', type: 'string|null', description: 'Join direction', default: null, acceptedValues: [null, 'vertical', 'horizontal'])]
    public ?string $direction = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['join'];

        if (!is_null($this->direction)) {
            $classes[] = "join-".$this->direction;
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
