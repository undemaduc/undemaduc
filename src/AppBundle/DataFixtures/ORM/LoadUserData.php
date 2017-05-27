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
            ->setEmail('oz@example.com')
            ->setPassword('test')
            ->setName('Vrajitorul din Oz')
            ->setDescription('Vrajesc la festivaluri si caut loc de refugiu')
            ->setAge('19')
            ->setGender('M')
        ;

        $manager->persist($user1);
        $manager->flush();
    }
}