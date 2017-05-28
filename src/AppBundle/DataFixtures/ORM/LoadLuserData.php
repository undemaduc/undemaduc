<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Luser;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadLuserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $luser1 = new Luser();
        $luser1
            ->setEmail('oz@example.com')
            ->setPassword('test')
            ->setName('Vrajitorul din Oz')
            ->setDescription('Vrajesc la festivaluri si caut loc de refugiu')
            ->setBeds(8)
            ->setRooms(3)
            ->setDisable(false)
            ->setPhoneNumber(0000)
        ;

        $manager->persist($luser1);
        $manager->flush();
    }
}