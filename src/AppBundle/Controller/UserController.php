<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
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
        $email = $request->get('email');
        $description = $request->get('description');


        $password = $this->get('security.password_encoder')->encodePassword(
            $data,
            $request->get('plainPassword')
        );


        if (empty($name)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $data->setName($name);
        $data->setEmail($email);
        $data->setDescription($description);
        $data->setPassword($password);

        $em = $this->getDoctrine()
                   ->getManager()
        ;
        $em->persist($data);
        $em->flush();

        return new View("User Added Successfully", Response::HTTP_OK);
    }

    public function newAction()
    {
        return $this->processForm(new User());
    }

    private function processForm(User $user)
    {
        $em = $this->getDoctrine()
                   ->getManager()
        ;


        $statusCode = $user->isNew() ? Response::HTTP_CREATED : Response::HTTP_NO_CONTENT;

        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->persist($user);
            $em->flush();

            $response = new Response();
            $response->setStatusCode($statusCode);

            // set the `Location` header only when creating new resources
            if (201 === $statusCode) {
                $response->headers->set('Location',
                    $this->generateUrl(
                        'acme_demo_user_get', array('id' => $user->getId()),
                        true // absolute
                    )
                );
            }

            return $response;
        }

        return View::create($form, 400);
    }
}
