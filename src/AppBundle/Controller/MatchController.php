<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Match;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MatchController extends Controller
{
    /**
     * @Rest\Get("/match")
     */
    public function getAllMatches()
    {
        $allMatches = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Match')
            ->findAll();

        if ( empty($allMatches) ){
            return new View("NO MATCHES FOUND", Response::HTTP_EXPECTATION_FAILED);
        }

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        return new View($allMatches, Response::HTTP_ACCEPTED);
    }

    /**
     * @Rest\Get("/match/user/{user_id}")
     */
    public function getOneMatchForUser($user_id)
    {
        $match = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Match')
            ->findOneBy(array('id' => $user_id, 'u_to_l' => 1, 'l_to_u' => 1));

        if ( empty($match) ){
            return new View("NO MATCHES FOUND", Response::HTTP_EXPECTATION_FAILED);
        }

        return new View($match, Response::HTTP_ACCEPTED);
    }

    /**
     * @Rest\Get("/match/luser/{luser_id}")
     */
    public function getOneMatchForLuser($luser_id)
    {
        $match = $this->getDoctrine()->getManager()
                      ->getRepository('AppBundle:Luser')
                      ->findOneBy(array('id' => $luser_id, 'u_to_l' => 1, 'l_to_u' => 1));

        if ( empty($match) ){
            return new View("NO MATCHES FOUND", Response::HTTP_EXPECTATION_FAILED);
        }

        return new View($match, Response::HTTP_ACCEPTED);
    }

    /**
     * @Rest\Post("/match/user")
     */
    public function createMatchUser(Request $request)
    {
        $match = new Match();
        $em = $this->getDoctrine()->getManager();

        if ( empty( $request->get('user_id') ) ){
            return new View("NULL VALUES NOT ALLOWED", Response::HTTP_BAD_REQUEST);
        }
        if ( empty( $request->get('luser_id') ) ){
            return new View("NULL VALUES NOT ALLOWED", Response::HTTP_BAD_REQUEST);
        }

        $match->setUser($em->getRepository('AppBundle:User')->find($request->get('user_id')));
        $match->setLuser($em->getRepository('AppBundle:Luser')->find($request->get('luser_id')));

        $match->setUToL(true);

        $em->persist($match);
        $em->flush();

        return new View("ALL GOOD", Response::HTTP_ACCEPTED);
    }

    /**
     * @Rest\Post("/match/user/")
     */
    public function createMatchLuser(Request $request)
    {
        $match = new Match();

        if ( empty( $request->get('user_id') ) ){
            return new View("NULL VALUES NOT ALLOWED", Response::HTTP_BAD_REQUEST);
        }
        if ( empty( $request->get('luser_id') ) ){
            return new View("NULL VALUES NOT ALLOWED", Response::HTTP_BAD_REQUEST);
        }

        $match->setUser($request->get('user_id'));
        $match->setLuser($request->get('luser_id'));

        $match->setLToU(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($match);
        $em->flush();

        return new View($match, Response::HTTP_ACCEPTED);
    }

    /**
     * @Rest\Post("/match/edit")
     */
    public function editMatch(Request $request)
    {
        $user_id = $request->get('user_id');
        $luser_id = $request->get('luser_id');

        if ( empty($user_id) ){
            return new View("NULL VALUES NOT ALLOWED", Response::HTTP_BAD_REQUEST);
        }
        if ( empty($luser_id) ){
            return new View("NULL VALUES NOT ALLOWED", Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();

        /**
         * @var $edit Match
         */
        $edit = $em->getRepository('AppBundle:Match')->findOneBy(array(
            'user' => $user_id,
            'luser' => $luser_id
        ));

        if ( empty($edit) ){
            return new View("NO VALUES FOUND", Response::HTTP_EXPECTATION_FAILED);
        }

        $edit->setLToU(true);
        $edit->setUToL(true);

        $em->persist($edit);
        $em->flush();

        return new View("ALL GOOD",Response::HTTP_ACCEPTED);
    }


}