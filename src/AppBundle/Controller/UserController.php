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
    public function createUser(Request $request)
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
            ->setName($name)
            ->setEmail($email)
            ->setPassword($password)
            ->setPhoneNumber($phoneNumber)
            ->setFile($image)
        ;

        $em = $this->getDoctrine()
                   ->getManager()
        ;
        $em->persist($user);
        $em->flush();

        return new View($user, Response::HTTP_BAD_REQUEST);
    }

    private function getErrorsFromForm(FormInterface $form)
    {
        $errors = array();
        foreach ($form->getErrors(false) as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
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
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('email' => $email));

        if ( $user && $user->getPassword() === $password ){
            return new View($user, Response::HTTP_ACCEPTED);
        }else{
            return new View($user, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Rest\Get("/users")
     */
    public function getUsers()
    {
        $em = $this->getDoctrine()->getManager();

        $results = $em->getRepository('AppBundle:User')->findBy(array(),array(),15);

        if ( empty($results) ){
            return new View("No results found", Response::HTTP_EXPECTATION_FAILED);
        }

        return new View($results, Response::HTTP_ACCEPTED);
    }

}
