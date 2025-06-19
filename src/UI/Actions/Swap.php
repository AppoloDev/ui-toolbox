<?php

namespace AppoloDev\UIToolboxBundle\UI\Actions;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('swap', template: '@UIToolbox/ui/actions/swap.html.twig')]
#[UIComponentDoc(
    title: 'Swap',
    description: 'A customizable action component based on DaisyUI. Supports style, class.',
    tags: ['swap', 'daisyui', 'form', 'UI'],
    url: 'https://daisyui.com/components/swap/'
)]
#[UIComponentExample(
    title: 'Swap text',
    description: 'Text swaps on toggle',
    templateName: '@UIToolboxDoc/examples/actions/swap/swap-text.html.twig',
)]
#[UIComponentExample(
    title: 'Swap volume icons',
    description: 'Volume on/off icons swap',
    templateName: '@UIToolboxDoc/examples/actions/swap/swap-volume-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Swap icons with rotate effect',
    description: 'Icons swap with rotate transition',
    templateName: '@UIToolboxDoc/examples/actions/swap/swap-rotate.html.twig',
)]
#[UIComponentExample(
    title: 'Hamburger button',
    description: 'Hamburger icon toggle for menu',
    templateName: '@UIToolboxDoc/examples/actions/swap/swap-hamburger.html.twig',
)]
#[UIComponentExample(
    title: 'Swap icons with flip effect',
    description: 'Icons flip on toggle',
    templateName: '@UIToolboxDoc/examples/actions/swap/swap-flip.html.twig',
)]
class Swap
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(
        label: 'Effect',
        type: 'string|null',
        description: 'Defines the animation effect used when toggling between elements.',
        default: null,
        acceptedValues: [null, 'rotate', 'flip']
    )]
    public ?string $style = null;

    #[UIComponentProp(
        label: 'CSS Classes',
        type: 'string|null',
        description: 'Adds custom CSS classes for extra styling.',
        default: null
    )]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['swap'];

        if ($this->style !== null) {
            $classes[] = "swap-{$this->style}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
