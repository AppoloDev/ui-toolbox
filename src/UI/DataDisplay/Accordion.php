<?php

namespace AppoloDev\UIToolboxBundle\UI\DataDisplay;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('accordion', template: '@UIToolbox/ui/data_display/accordion.html.twig')]
#[UIComponentDoc(
    title: 'Accordion',
    description: 'Accordion component based on DaisyUI. Supports arrow or plus/minus icons, grouping, and more.',
    tags: ['accordion', 'collapse', 'daisyui']
)]
#[UIComponentExample(
    title: 'Accordion using radio inputs',
    templateName: '@UIToolboxDoc/examples/data_display/accordion/radio-inputs.html.twig',
)]
#[UIComponentExample(
    title: 'Accordion with arrow icon',
    templateName: '@UIToolboxDoc/examples/data_display/accordion/arrow-icon.html.twig',
)]
#[UIComponentExample(
    title: 'Accordion with plus/minus icon',
    templateName: '@UIToolboxDoc/examples/data_display/accordion/plus-icon.html.twig',
)]
#[UIComponentExample(
    title: 'Accordion with join-vertical',
    templateName: '@UIToolboxDoc/examples/data_display/accordion/join-vertical.html.twig',
)]
class Accordion
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Title', type: 'string', description: 'Accordion title')]
    public string $title;

    #[UIComponentProp(label: 'Content', type: 'string', description: 'Accordion content')]
    public string $content;

    #[UIComponentProp(label: 'Active', type: 'bool', description: 'Whether this accordion is open by default', default: false)]
    public bool $active = false;

    #[UIComponentProp(
        label: 'Style',
        type: 'string',
        description: "Visual style of the accordion's icon (arrow or plus/minus)",
        default: 'arrow',
        acceptedValues: ['arrow', 'plus']
    )]
    public string $style = 'arrow';

    #[UIComponentProp(label: 'Additional Classes', type: 'string|null', description: 'Additional CSS classes', default: null)]
    public ?string $class = null;


    public function getClasses(): string
    {
        $classes = ['collapse'];
        if ($this->style === 'arrow') {
            $classes[] = 'collapse-arrow';
        } elseif ($this->style === 'plus') {
            $classes[] = 'collapse-plus';
        }
        if ($this->class) {
            $classes[] = $this->class;
        }
        return implode(' ', $classes);
    }

    protected function resolveComponentOptions(array &$options): void
    {
        // No additional resolution required
    }
}
