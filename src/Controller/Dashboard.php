<?php

namespace AppoloDev\UIToolboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Dashboard extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('@UIToolbox/docs/index.html.twig');
    }
}
