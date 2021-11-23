<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setName('soyer');
        $contact->setFirstname('Beaugosse');

        $manager->persist($contact);
        $manager->flush();

        $article = new Article();;
        $article->setNom('Pk les arabe vole ?');
        $article->SetContenu('Arabe');

        $manager->persist($article);
        $manager->flush();
    }
}
