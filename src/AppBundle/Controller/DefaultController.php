<?php

namespace AppBundle\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends Controller
{
    /**
     * @Rest\Get("/", name="homepage")
     */
    public function indexAction()
    {
        return new View("Hello World!", Response::HTTP_OK);
    }
}
