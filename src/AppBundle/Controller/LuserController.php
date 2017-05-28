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
     * @Rest\Post("/luser/create")
     * @param Request $request
     * @return View
     */
    public function postAction(Request $request)
    {
        $data = new Luser();
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $phoneNumber = $request->get('phone_number');
        $description = $request->get('description');
        $bed = $request->get('beds');
        $room = $request->get('rooms');
        $town = $request->get('town');
        $disable = 0;
        $image1 = $request->get('image1');
        $image2 = $request->get('image2');
        $image3 = $request->get('image3');
        $image4 = $request->get('image4');
        $image5 = $request->get('image5');

        if (empty($name) || empty($email) || empty($password) || empty($description) || empty($bed) || empty($room)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }

        $data->setName($name)
            ->setDisable($disable)
            ->setRooms($room)
            ->setBeds($bed)
            ->setPhoneNumber($phoneNumber)
            ->setTown($town)
            ->setDescription($description)
            ->setEmail($email)
            ->setPassword($password)
            ->setFile1($image1)
            ->setFile2($image2)
            ->setFile3($image3)
            ->setFile4($image4)
            ->setFile5($image5)
        ;

        $em = $this->getDoctrine()
                   ->getManager()
        ;
        $em->persist($data);
        $em->flush();

        return new View("User Added Successfully", Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return View
     * @Rest\Post("/luser/login")
     */
    public function loginLuser(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $em = $this->getDoctrine()->getManager();

        /**
         * @var $luser Luser
         */
        $luser = $em->getRepository('AppBundle:Luser')->findOneBy(array('email' => $email));

        if ( $luser && $luser->getPassword() === $password ){
            return new View($luser, Response::HTTP_ACCEPTED);
        }else{
            return new View($luser, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Rest\Post("/luser/{town}")
     */
    public function getViaTown($town)
    {
        $em = $this->getDoctrine()->getManager();

        $result = $em->getRepository('AppBundle:Luser')->findBy(array(
           'town' => $town
        ),array(),15);

        return new View($result, Response::HTTP_ACCEPTED);
    }
}