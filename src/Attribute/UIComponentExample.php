<?php

namespace AppoloDev\UIToolboxBundle\Attribute;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
class UIComponentExample
{
    public function __construct(
        public string $title,
        public string $description = '',
        public array $props = [],
        public ?string $templateName = null,
    ) {
    }
}
