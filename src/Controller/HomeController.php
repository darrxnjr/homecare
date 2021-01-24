<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Form\SearchMedType;
use App\Repository\MedicamentRepository;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/econsul", name="econsul")
     */
    public function econsul(){
        return $this->render('econsul.html.twig');
    }

    /**
     * @Route("/epharma", name="epharma")
     */
    public function epharma(MedicamentRepository $repo_epharma, Request $request){

        $medocs = $repo_epharma->findAll();

        $medocs1 = new Medicament();

        $form = $this->createForm(SearchMedType::class, $medocs1);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $medocs1 = $repo_epharma->findByExampleIndication("Migraine");
            return $this->render('epharma.html.twig', [
                'medocs' => $medocs1,
                'fmedocs' => $form->createView()
            ]);

        }
        return $this->render('epharma.html.twig', [
                'medocs' => $medocs,
                'fmedocs' => $form->createView()
            ]);
    }

    /**
     * @Route("/nutrition", name="nutrition")
     */
    public function nutrition(){
        return $this->render('nutrition.html.twig');
    }

    /**
     * @Route("/articles", name="articles")
     */
    public function articles(){
        return $this->render('articles.html.twig');
    }


    /**
     * @Route("/signup", name="signup")
     */
    public function signup(){
        return $this->render('signup.html.twig');
    }

    /**
     * @Route("/admin", name="admin", methods={"GET", "POST"})
     * @Route("/admin/{NomMed}/edit", name="edit", )
     */
    public function admin(Request  $request, EntityManagerInterface $entityManager):Response
    {
        $medocs = new Medicament();


        $form = $this->createFormBuilder($medocs)
            ->add('nom_med', TextType::class, [
                'attr' => [
                    'placeholder' => "Nom du médicament"
                ]
            ])
            ->add('fabricant', TextType::class,[
                'attr' => [
                    'placeholder' => "Fabricant"
                ]
            ])
            ->add('indications', TextType::class,[
                'attr' => [
                    'placeholder' => "Indications"
                ]
            ])
            ->add('contre_indic', TextType::class,[
                'attr' => [
                    'placeholder' => "Contre Indications"
                ]
            ])
            ->add('composants', TextType::class,[
                'attr' => [
                    'placeholder' => "Composants"
                ]
            ])
            ->getForm();
        ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($medocs);
            $entityManager->flush();

            return  $this->redirectToRoute('epharma', (['nom_med'=> $medocs->getNomMed()]));
        }



        return $this->render('admin.html.twig', [
            'form_med' => $form->createView()
        ]);
    }

    public function search(Request $request){
        $searchMed = new SearchMed();

        $form_search = $this->createForm(SearchMedType::class);
        $form_search->handleRequest($request);
        $medocs = [];

        if($form_search->isSubmitted() && $form_search->isValid()){
            if($medocs !="")
                $medocs=$this->getDoctrine()->getRepository(Medicament::class)->findAll();
            else
                $medocs=$this->getDoctrine()->getRepository(Medicament::class)->findAll();
        }
    }

    public function rechercheMed(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $medoc = $em->getRepository(Medicament::class)->findAll();
        if($request->isMethod("POST"))
        {
            $rechmed = $request->get('fabricant');
            $medoc = $em->getRepository(Medicament::class)->findBy(array('fabricant'=>$rechmed));
        }
        return $this->render('epharma', array('medoc'=>medoc));
    }



}
