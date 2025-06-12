<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Tab;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('tabItemHeader', template: '@UIToolbox/ui/navigation/tabs/tab_item_header.html.twig')]
class TabItemHeader
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Active', type: 'string|null', description: 'Active state', default: null)]
    public ?bool $active = null;

    #[UIComponentProp(label: 'Disabled', type: 'string|null', description: 'Disabled state', default: null)]
    public ?bool $disabled = null;

    #[UIComponentProp(label: 'Link', type: 'string|null', description: 'Anchor link', default: null)]
    public ?string $href = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    #[UIComponentProp(label: 'ID', type: 'string|null', description: 'Custom ID for radio input', default: null)]
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
