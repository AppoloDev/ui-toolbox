<?php

namespace AppoloDev\UIToolboxBundle\UI\Mockup;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('mockupPhone', template: '@UIToolbox/ui/mockup/phone.html.twig')]
#[UIComponentDoc(
    title: 'Phone',
    description: 'A customizable mockup phone component based on DaisyUI.',
    url: 'https://daisyui.com/components/mockup-phone/',
)]
#[UIComponentExample(
    title: 'iPhone mockup',
    description: 'Displays an iPhone mockup phone component.',
    templateName: '@UIToolboxDoc/examples/mockup/phone/iphone.html.twig',
)]
#[UIComponentExample(
    title: 'With color and wallpaper',
    description: 'Displays a phone mockup with custom color and wallpaper.',
    templateName: '@UIToolboxDoc/examples/mockup/phone/with_color.html.twig',
)]
class Phone
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['mockup-phone'];

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
