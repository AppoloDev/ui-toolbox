<?php

namespace AppoloDev\UIToolboxBundle\UI\Mockup\Browser;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('mockupBrowserContent', template: '@UIToolbox/ui/mockup/browser/browser_content.html.twig')]
class BrowserContent
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
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
