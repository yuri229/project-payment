<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach($this->getUserData() as [$username,$email,$password,$roles]){
            $user=new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setRoles($roles);

            $manager->persist($user);
            $this->addReference($username,$user);
        }

        $manager->flush();
    }

    private function getUserData():array
    {
        return [
            //$userData = [$sername, $email, $password, $roles];
            ['jonh_Doe', 'Trendco62@gmail.com', '123456789', ['ROLE_USER']],
            ['drake', 'drake@music.cn', 'official', ['ROLE_ADMIN']],
        ];
    }
}
