<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Luser;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuserController extends Controller
{
    /**
     * @Rest\Post("/luser")
     * @param Request $request
     * @return View
     */
    public function postAction(Request $request)
    {
        $data = new Luser();
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $description = $request->get('description');
        $bed = $request->get('bed');
        $room = $request->get('rooms');
        $disable = $request->get('disable');

        if (empty($name) || empty($email) || empty($password) || empty($description) || empty($bed) || empty($room)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }

        $data->setName($name)
            ->setDisable($disable)
            ->setRooms($room)
            ->setBeds($bed)
            ->setDescription($description)
            ->setEmail($email)
            ->setPassword($password);

        $em = $this->getDoctrine()
                   ->getManager()
        ;
        $em->persist($data);
        $em->flush();

        return new View("User Added Successfully", Response::HTTP_OK);
    }
}