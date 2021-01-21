<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Idea;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        $wd = new City();
        $wd->setName('Global');
        $wd->setZip('');
        $wd->setCountry('The entire World!');
        $manager->persist($wd);

        $bx = new City();
        $bx->setName('Bordeaux');
        $bx->setZip('33000');
        $bx->setCountry('France');
        $manager->persist($bx);
        
        $li = new City();
        $li->setName('Lille');
        $li->setZip('59000');
        $li->setCountry('France');
        $manager->persist($li);
        
        $sf = new City();
        $sf->setName('San Francisco');
        $sf->setZip('XXX');
        $sf->setCountry('USA');
        $manager->persist($sf);

        $camille = new User();
        $camille->setPseudo('camille');
        $camille->setCity($bx);
        $camille->setEmail('camille.jouan@epsi.fr');
        $camille->setPassword($this->passwordEncoder->encodePassword($camille, 'camille'));
        $camille->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($camille);

        $johanna = new User();
        $johanna->setPseudo('johanna');
        $johanna->setCity($bx);
        $johanna->setEmail('johanna.jato@epsi.fr');
        $johanna->setPassword($this->passwordEncoder->encodePassword($johanna, 'johanna'));
        $johanna->setRoles(['ROLE_USER']);
        $manager->persist($johanna);

        $i1 = new Idea();
        $i1->setAuthor($camille);
        $i1->setTitle("Des potagers sur les Quais");
        $i1->setLocation("Quais de Garonne");
        $i1->setCity($bx);
        $i1->setContent("Je propose d'implanter des potagers participatifs et partages dans les espaces verts sur les Quais.");
        $manager->persist($i1);

        $i2 = new Idea();
        $i2->setAuthor($johanna);
        $i2->setTitle("Une piscine olympique");
        $i2->setCity($li);
        $i2->setContent("Le sport c'est la sante! Installons une piscine Olympique dans notre belle ville pour maintenir ses habitants en forme!!!");
        $manager->persist($i2);

        $i3 = new Idea();
        $i3->setAuthor($camille);
        $i3->setTitle("Bliblablou");
        $i3->setCity($li);
        $i3->setContent("Et si on se creait un club de conversation entre voisin.e.s?");
        $manager->persist($i3);

        $i4 = new Idea();
        $i4->setAuthor($johanna);
        $i4->setTitle("Trees");
        $i4->setLocation("City centers");
        $i4->setCity($wd);
        $i4->setContent("Let us instore a min. number of trees per habitant in every City in the world!");
        $manager->persist($i4);

        $manager->flush();
    }
}
