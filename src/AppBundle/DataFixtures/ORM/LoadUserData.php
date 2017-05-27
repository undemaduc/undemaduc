<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1
            ->setUsername('oz')
            ->setPassword('test')
            ->setName('Vrajitorul din Oz')
            ->setEmail('oz@example.com')
        ;

        $manager->persist($user1);
        $manager->flush();
    }
}