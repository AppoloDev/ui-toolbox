<?php

namespace AppoloDev\UIToolboxBundle\UI\DataDisplay\Timeline;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('timeline', template: '@UIToolbox/ui/data_display/timeline/timeline.html.twig')]
#[UIComponentDoc(
    title: 'Timeline',
    description: 'A customizable timeline component based on DaisyUI. Supports color, size, and more.',
    url: 'https://daisyui.com/components/timeline/'
)]
#[UIComponentExample(
    title: 'Both sides with icons',
    description: 'Displays events on both sides of the timeline with icons.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/both-sides-with-icon.html.twig',
)]
#[UIComponentExample(
    title: 'Bottom side only',
    description: 'Displays all events on the bottom side of the timeline.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/bottom-side-only.html.twig',
)]
#[UIComponentExample(
    title: 'Top side only',
    description: 'Displays all events on the top side of the timeline.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/top-side-only.html.twig',
)]
#[UIComponentExample(
    title: 'Alternating sides',
    description: 'Displays events alternating between top and bottom sides.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/different-sides.html.twig',
)]
#[UIComponentExample(
    title: 'Colorful lines',
    description: 'Displays the timeline using different colors for lines and dots.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/colorful-lines.html.twig',
)]
#[UIComponentExample(
    title: 'No icons',
    description: 'Displays timeline entries without any icons.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/no-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical both sides with icons',
    description: 'Displays a vertical timeline with text on both sides and icons.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/vertical-both-sides-with-icon.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical right side only',
    description: 'Displays a vertical timeline with all entries on the right.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/vertical-right-side-only.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical left side only',
    description: 'Displays a vertical timeline with all entries on the left.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/vertical-left-side-only.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical alternating sides',
    description: 'Displays a vertical timeline with entries on alternating sides.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/vertical-different-sides.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical colorful lines',
    description: 'Displays a vertical timeline using multiple colors.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/vertical-colorful-lines.html.twig',
)]
#[UIComponentExample(
    title: 'Vertical no icons',
    description: 'Displays a vertical timeline without any icons.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/vertical-no-icons.html.twig',
)]
#[UIComponentExample(
    title: 'Icon aligned start',
    description: 'Displays icons aligned at the start of each timeline entry.',
    templateName: '@UIToolboxDoc/examples/data_display/timeline/icon-start.html.twig',
)]
class Timeline
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(
        label: 'Direction',
        type: 'string|null',
        description: 'Timeline orientation: vertical, horizontal',
        default: null,
        acceptedValues: [null, 'vertical', 'horizontal']
    )]
    public ?string $direction = null;

    #[UIComponentProp(
        label: 'CSS classes',
        type: 'string|null',
        description: 'Custom CSS classes to add to the timeline',
        default: null
    )]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['timeline'];

        if ($this->direction !== null) {
            $classes[] = "timeline-{$this->direction}";
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
