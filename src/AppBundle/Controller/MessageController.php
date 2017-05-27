<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Messages;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MessageController extends Controller
{

    /**
     * @Rest\Post("/message/store")
     */
    public function storeMessage(Request $request)
    {
        $fromUser = $request->get('fromUser');
        $toUser = $request->get('toUser');
        $fromLuser = $request->get('fromLuser');
        $toLuser = $request->get('toLuser');
        $text = $request->get('message');

        if ( empty($text) ){
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }

        $manager = $this->getDoctrine()->getManager();

        $message =  new Messages();
        $message->setFromLuser($fromLuser ? $manager->getRepository('AppBundle:Luser')->find($fromLuser) : null)
            ->setFromUser($fromUser ? $manager->getRepository('AppBundle:User')->find($fromUser) : null)
            ->setToLuser($toLuser ? $manager->getRepository('AppBundle:Luser')->find($toLuser) : null)
            ->setToUser($toUser ? $manager->getRepository('AppBundle:User')->find($toUser) : null)
            ->setMessage($text);

        $manager->persist($message);
        $manager->flush();

        return new View("MESSAGE SAVED", Response::HTTP_ACCEPTED);
    }

    /**
     * @Rest\Get("/message/{user_id}/{luser_id}")
     */
    public function getMessageForUser($user_id,$luser_id)
    {
        $viaUser = $this->getDoctrine()->getRepository('AppBundle:Messages')->findMessageViaUser($user_id,$luser_id);
        $viaLuser = $this->getDoctrine()->getRepository('AppBundle:Messages')->findMessageViaLuser($user_id,$luser_id);

        $combined = array_merge($viaUser,$viaLuser);

        usort($combined,function (Messages $a , Messages $b){
            return $a->getCreatedAt() < $b->getCreatedAt() ? true : false;
        });

        return new View($combined,Response::HTTP_ACCEPTED);
    }

}