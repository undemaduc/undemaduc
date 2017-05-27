<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;


class UserController extends FOSRestController
{
    /**
     * @Rest\Get("/user")
     */
    public function getAction()
    {
        $restresult = $this->getDoctrine()
                           ->getRepository('AppBundle:User')
                           ->findAll()
        ;

        if (empty($restresult)) {
            return new View("There are no users.", Response::HTTP_NOT_FOUND);
        }

        return $restresult;
    }

    /**
     * @Rest\Get("/user/{id}")
     */
    public function idAction($id)
    {
        $singleresult = $this->getDoctrine()
                             ->getRepository('AppBundle:User')
                             ->find($id)
        ;
        if ($singleresult === null) {
            return new View("User not found.", Response::HTTP_NOT_FOUND);
        }

        return $singleresult;
    }

    /**
     * @Rest\Post("/user")
     */
    public function postAction(Request $request)
    {
        $data = new User;
        $name = $request->get('name');
        if (empty($name)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $data->setName($name);
        $em = $this->getDoctrine()
                   ->getManager()
        ;
        $em->persist($data);
        $em->flush();

        return new View("User Added Successfully", Response::HTTP_OK);
    }
}
