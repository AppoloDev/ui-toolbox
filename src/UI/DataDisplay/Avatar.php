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
    url: 'https://daisyui.com/components/avatar/',
)]
#[UIComponentExample(
    title: 'Basic avatar',
    description: 'Displays a basic avatar using an image.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar sizes',
    description: 'Displays avatars using various predefined sizes.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-sizes.html.twig',
)]
#[UIComponentExample(
    title: 'Rounded avatars',
    description: 'Displays avatars with different rounded styles.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-rounded.html.twig',
)]
#[UIComponentExample(
    title: 'Masked avatars',
    description: 'Uses mask classes to display avatars with custom shapes.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-masked.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar with ring indicator',
    description: 'Displays a ring indicator around avatars using Tailwind utilities.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-ring.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar with presence',
    description: 'Displays avatars with online or offline presence indicators.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-status.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar with placeholder',
    description: 'Displays a placeholder instead of an image when no avatar is provided.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-placeholder.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar group',
    description: 'Groups multiple avatars with spacing for collective display.',
    templateName: '@UIToolboxDoc/examples/data_display/avatar/avatar-group.html.twig',
)]
#[UIComponentExample(
    title: 'Avatar group with counter',
    description: 'Includes a counter placeholder when the number of avatars exceeds the visible limit.',
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
