<?php

namespace AppoloDev\UIToolboxBundle\UI\Feedback;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('loading', template: '@UIToolbox/ui/feedback/loading.html.twig')]
#[UIComponentDoc(
    title: 'Loading',
    description: 'A loading animation component with various styles and sizes.',
    tags: ['loading', 'animation', 'UI', 'feedback']
)]
#[UIComponentExample(
    title: 'Loading spinner',
    description: 'Spinner loading animation',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-spinner.html.twig',
)]
#[UIComponentExample(
    title: 'Loading dots',
    description: 'Dots loading animation',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-dots.html.twig',
)]
#[UIComponentExample(
    title: 'Loading ring',
    description: 'Ring loading animation',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-ring.html.twig',
)]
#[UIComponentExample(
    title: 'Loading ball',
    description: 'Ball loading animation',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-ball.html.twig',
)]
#[UIComponentExample(
    title: 'Loading bars',
    description: 'Bars loading animation',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-bars.html.twig',
)]
#[UIComponentExample(
    title: 'Loading infinity',
    description: 'Infinity loading animation',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-infinity.html.twig',
)]
#[UIComponentExample(
    title: 'Loading with colors',
    description: 'Loading animation with color classes',
    templateName: '@UIToolboxDoc/examples/feedback/loading/loading-colors.html.twig',
)]
class Loading
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Couleur', type: 'string|null', description: 'Button color', default: null, acceptedValues: [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'])]
    public ?string $color = null;

    #[UIComponentProp(label: 'Style', type: 'string|null', description: 'Loading style', default: null, acceptedValues: [null, 'spinner', 'dots', 'ring', 'ball', 'bars', 'infinity'])]
    public ?string $style = null;

    #[UIComponentProp(label: 'Size', type: 'string|null', description: 'Loading size', default: null, acceptedValues: [null, 'xs', 'sm', 'md', 'lg', 'xl'])]
    public ?string $size = null;

    #[UIComponentProp(label: 'Classes CSS', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['loading'];

        if ($this->color) {
            $classes[] = "text-{$this->color}";
        }

        if ($this->style) {
            $classes[] = "loading-{$this->style}";
        }

        if ($this->size) {
            $classes[] = "loading-{$this->size}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
