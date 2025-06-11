<?php

namespace AppoloDev\UIToolboxBundle\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class UIComponentProp
{
    public function __construct(
        public string $label,
        public string $type,
        public string $description,
        public ?string $default = '',
        public ?array $acceptedValues = null,
    ) {
    }
}
