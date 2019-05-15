<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Facture;
use App\Repository\FactureRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PageController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function home() {

        return $this->render('page/home.html.twig', [
            'controller_name' => 'PageController'
        ]);
    }

    /**
     * @Route("/cmd",name="cmd")
     */
    public function cmd(FactureRepository $repo) {

        $services = $repo->findAll();

        return $this->render('page/cmd.html.twig', [
            'services' => $services,
        ]);
    }

    /**
     * @Route("/services",name="page_show")
     */

    public function show(){
        return $this->render('page/show.html.twig');
    }

    /**
     * @Route("/services/sbee",name="sbee")
     */
    public function pay1(Request $request, ObjectManager $manager){
        $facture = new Facture();

        $form = $this->createFormBuilder($facture)
                    ->add('society', ChoiceType::class, [
                        'choices' => [
                            'SBEE' => true,
                            'SONEB' => false,
                        ]
                    ])
                    ->add('compteur', ChoiceType::class, [
                        'choices' => [
                            'ordinaire' => null,
                            'prepaye' => false,
                            'a carte' => null,
                        ]
                    ])
                    ->add('numCompteur', TextType::class, [
                        'attr' => [
                            'placeholder' => "Numero du compteur"
                        ]
                    ])
                    ->add('numAbn')
                    ->add('numPolice')
                    ->add('client')
                    ->add('numFacture')
                    ->add('montant')
                    ->add('mail')
                    ->add('factPeriod',DateType::class,[
                        'widget' => 'single_text'
                    ])
                    ->getForm();
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $facture->setCreatedAt(new \DateTime());

            $manager->persist($facture);
            $manager->flush();

        }
        return $this->render('page/sbee.html.twig', [
            'forms' => $form->createView()
        ]);
    }

    /**
     * @Route("/services/soneb",name="soneb")
     */
    public function pay2(Request $request, ObjectManager $manager){
        $facture = new Facture();

        $form = $this->createFormBuilder($facture)
                    ->add('society', ChoiceType::class, [
                        'choices' => [
                            'SONEB' => true,
                            'SBEE' =>false,
                        ]
                    ])
                    ->add('numCompteur', TextType::class, [
                        'attr' => [
                            'placeholder' => "Numero du compteur"
                        ]
                    ])
                    ->add('compteur', ChoiceType::class, [
                        'choices' => [
                            'ordinaire' => true,
                            ]
                        ])
                    ->add('numAbn')
                    ->add('numPolice')
                    ->add('client')
                    ->add('numFacture')
                    ->add('montant')
                    ->add('mail')
                    ->add('factPeriod',DateType::class,[
                        'widget' => 'single_text'
                    ])
                    ->getform();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $facture->setCreatedAt(new \DateTime());

            $manager->persist($facture);
            $manager->flush();

        }

        return $this->render('page/soneb.html.twig',[
            'formFact' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin",name="admin")
     */
    public function admin()
    {
        return $this->render('register/index.html.twig');
    }

    /**
     * @Route("/about",name="about")
     */
    public function about()
    {
        return $this->render('page/about.html.twig');
    }

    /**
     * @Route("/ccm?",name="ccm")
     */
    public function ccm()
    {
        return $this->render('page/ccm.html.twig');
    }
}
