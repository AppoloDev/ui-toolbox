<?php

namespace AppoloDev\UIToolboxBundle\Controller\Actions;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Button extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('@UIToolbox/docs/actions/button.html.twig');
    }
}
