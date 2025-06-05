<?php

namespace AppoloDev\UIToolboxBundle;

use AppoloDev\UIToolboxBundle\DependencyInjection\UIToolboxExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class UIToolboxBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new UIToolboxExtension();
    }
}
