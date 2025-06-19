<?php

namespace AppoloDev\UIToolboxBundle\UI\DataDisplay;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentDoc;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentExample;
use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use AppoloDev\UIToolboxBundle\Resolver\ComponentOptionsResolverTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('avatar', template: '@UIToolbox/ui/data_display/avatar.html.twig')]
#[UIComponentDoc(
    title: 'Avatar',
    description: 'A customizable data display component based on DaisyUI. Supports image source, alt text, placeholder, presence status, and custom classes.',
    tags: ['avatar', 'image', 'daisyui']
)]
#[UIComponentExample(
    title: 'Avatar',
    description: 'Simple avatar image',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar in custom sizes',
    description: 'Avatars with different size classes',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar rounded',
    description: 'Avatars with various border-radius styles',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-rounded.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar with mask',
    description: 'Avatars using mask classes to create custom shapes',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-masked.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar with ring',
    description: 'Avatars with ring indicators using Tailwind ring utilities',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-ring.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar with presence indicator',
    description: 'Avatars with online/offline indicators',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-status.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar placeholder',
    description: 'Avatars displaying placeholder text instead of an image',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-placeholder.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar group',
    description: 'Multiple avatars grouped together with spacing',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-group.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar group with counter',
    description: 'Grouped avatars with a counter indicator as placeholder',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-group-counter.html.twig',
)]
class Avatar
{
    use ComponentOptionsResolverTrait;

    #[UIComponentProp(label: 'Image Source', type: 'string|null', description: 'Defines the URL of the avatar image.', default: null)]
    public ?string $src = null;

    #[UIComponentProp(label: 'Image Alt', type: 'string|null', description: 'Provides alternative text for the image.', default: null)]
    public ?string $alt = null;

    #[UIComponentProp(label: 'Placeholder', type: 'string|null', description: 'Displays a text placeholder if no image is provided.', default: null)]
    public ?string $placeholder = null;

    #[UIComponentProp(label: 'Status', type: 'string|null', description: 'Indicates the presence status such as online or offline.', default: null, acceptedValues: [null, 'online', 'offline'])]
    public ?string $status = null;

    #[UIComponentProp(label: 'CSS Classes', type: 'string|null', description: 'Adds custom CSS classes for extra styling.', default: null)]
    public ?string $class = null;

    public function getClasses(): string
    {
        $classes = ['avatar'];

        if ($this->status) {
            $classes[] = $this->status;
        }

        if ($this->placeholder !== null) {
            $classes[] = 'avatar-placeholder';
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return \implode(' ', $classes);
    }
}
