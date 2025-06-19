<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Step;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('stepItem', template: '@UIToolbox/ui/navigation/steps/step_item.html.twig')]
class StepItem
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

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['step'];

        if ($this->color) {
            $classes[] = "step-{$this->color}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
