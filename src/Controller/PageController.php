<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Facture;
use App\Entity\User;
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
        if ($request->isMethod('POST')){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();
            $this->addFlash('notice','facture ajoutee');
            return $this->redirectToRoute('cmd');
        }else{
            return $this->render('page/sbee.html.twig');
        }
    }

    /**
     * @Route("/services/soneb",name="soneb")
     */
    public function pay2(Request $request, ObjectManager $manager){
        $facture = new Facture();

        $form = $this->createFormBuilder($facture)
                    ->add('compteur', ChoiceType::class, [
                        'choices' => [
                            'ordinaire' => true,
                            ]
                        ])
                    ->add('numPolice')
                    ->add('montant')
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
