<?php

namespace AppoloDev\UIToolboxBundle\UI\Navigation\Tab;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('tabItemContent', template: '@UIToolbox/ui/navigation/tabs/tab_item_content.html.twig')]
class TabItemContent
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = [];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
