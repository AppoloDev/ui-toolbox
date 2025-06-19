<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Tab;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('tabItemHeader', template: '@UIToolbox/ui/navigation/tabs/tab_item_header.html.twig')]
class TabItemHeader
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Active', type: 'string|null', description: 'Sets the active state.', default: null)]
    public ?bool $active = null;

    #[UIComponentProp(label: 'Disabled', type: 'string|null', description: 'Defines whether the tab is disabled.', default: null)]
    public ?bool $disabled = null;

    #[UIComponentProp(label: 'Link', type: 'string|null', description: 'Sets the URL of the tab.', default: null)]
    public ?string $href = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    #[UIComponentProp(label: 'ID', type: 'string|null', description: 'Defines a custom ID for the radio input.', default: null)]
    public ?string $id = null;

    public function getClasses(): string
    {
        $classes = [];

        if (null !== $this->disabled) {
            $classes[] = 'tab-disabled';
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
