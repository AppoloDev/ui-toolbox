<?php

namespace AppoloDev\UIToolboxBundle\UI\DataDisplay\Timeline;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('timelineItemStart', template: '@UIToolbox/ui/data_display/timeline/timeline_item_start.html.twig')]
class TimelineItemStart
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
