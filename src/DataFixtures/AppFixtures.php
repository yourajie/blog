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
        $article->setNom('Tuto symfony');
        $article->SetContenu('Synfony');

        $manager->persist($article);
        $manager->flush();
    }
}
