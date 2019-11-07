<?php

namespace App\Controller;

use App\Entity\RSexe;
use App\Form\EditType;
use App\Entity\RContrat;
use App\Entity\Collaborateur;


use App\Entity\RDureeContrat;


use App\Form\RegistrationType;

use Doctrine\ORM\EntityManagerInterface;
use App\Notifications\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    
class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager,UserPasswordEncoderInterface $encoder,  ContactNotification $notification){

      
       $collab = new Collaborateur();
        
       $form = $this->createForm(RegistrationType::class, $collab, [
           'method' => 'POST'
       ]);

       $form->handleRequest($request);
       
       if($form->isSubmitted() && $form->isValid()){
            $notification->notify($collab);
            $email = $collab->getEmail();
        
            $hash = $encoder->encodePassword($collab, $collab->getPassword());
            $collab->setPassword($hash);
        
            $manager->persist($collab);
            $manager->flush();
      
        return $this->redirectToRoute('collaborateur_authed', [
            'id' => $collab->getId(),
            'nom' => $collab->getNom(),
            'email' => $collab->getEmail()
                ]);
       }
  
        
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ] );
    }

   
    /**
     * @Route("/connexion", name="security_login")
     */

    public function connexion()
    {

        return $this->render('security/login.html.twig', [
           
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */

    public function deconnexion()
    {
       
        return $this->render('security/login.html.twig', [
           
        ]);
    }


     /**
     * @Route("/logged/{nom}", name="security_logged")
     */

    public function logged(Collaborateur $collab)
    {
       
        return $this->render('security/logged.html.twig', [
            'collab' => $collab
        ]);
    }


      /**
     * @Route("/edit/{id}", name="security_edit")
     */

    public function edit(Request $request, Collaborateur $collab)
    {
          
       $form = $this->createForm(EditType::class, $collab);

       $form->handleRequest($request);
       
       if($form->isSubmitted() && $form->isValid()){

        
            $manager->persist($collab);
            $manager->flush();
      
        return $this->redirectToRoute('homepage', [
            'id' => $collab->getId(),
            'nom' => $collab->getNom(),
            'email' => $collab->getEmail()
                ]);
       }
       
        return $this->render('security/edit.html.twig', [
              'form' => $form->createView()
        ]);
    }
}