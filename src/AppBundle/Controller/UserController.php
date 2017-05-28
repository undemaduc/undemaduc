<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Form\FormInterface;
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
     * @Rest\Post("/user/create")
     */
    protected function createUser(Request $request)
    {
        $user = new User();

        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $phoneNumber = $request->get('phone_number');
        $image = $request->get('image');

        if (empty($name) && empty($email) && empty($password) && empty($phoneNumber) && empty($image)){
            return new View("Bad Request", Response::HTTP_BAD_REQUEST);
        }

        $user->setAge(18)
            ->setDescription('non')
            ->setGender('M')
            ->setFile($image)
            ->setName($name)
            ->setEmail($email)
            ->setPassword($password)
            ->setPhoneNumber($phoneNumber);

        $em = $this->getDoctrine()
                   ->getManager()
        ;
        $em->persist($user);
        $em->flush();

        return new View("User Added Successfully", Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return View
     * @Rest\Post("/user/login")
     */
    public function loginUser(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $em = $this->getDoctrine()->getManager();

        /**
         * @var $luser User
         */
        $user = $em->getRepository('AppBundle:Luser')->findOneBy(array('email' => $email));

        if ( $user->getPassword() === $password ){
            return new View($user, Response::HTTP_ACCEPTED);
        }else{
            return new View($user, Response::HTTP_BAD_REQUEST);
        }
    }

}
