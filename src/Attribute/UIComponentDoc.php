<?php

namespace AppoloDev\UIToolboxBundle\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class UIComponentDoc
{
    public function __construct(
        public string $title,
        public string $description = '',
        public ?string $url = null,
    ) {
    }
}
