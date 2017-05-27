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
     * @Rest\Post("/user")
     * @param Request $request
     *
     * @return View
     */
    public function newAction(Request $request)
    {
        return $this->processForm(new User(), $request);
    }

    /**
     * @Rest\Post("/user/{id}")
     *
     * @param Request $request
     * @param User $user
     *
     * @return View
     */
    public function editAction(Request $request, User $user)
    {
        return $this->processForm($user, $request);
    }

    private function processForm(User $user, $request)
    {
        // 200 for updated
        $statusCode = $user->isNew() ? Response::HTTP_CREATED : Response::HTTP_OK;

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            if ($user->getPlainPassword()) {
                $password = $this->get('security.password_encoder')->encodePassword(
                    $user,
                    $user->getPlainPassword()
                );
                $user->setPassword($password);
            }

            $em = $this->getDoctrine()
                       ->getManager()
            ;

            $em->persist($user);
            $em->flush();

            return new View('User ok.', $statusCode);
        }

        $errors = [ 'errors' => $this->getErrorsFromForm($form) ];

        return new View($errors, Response::HTTP_BAD_REQUEST);
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
}
