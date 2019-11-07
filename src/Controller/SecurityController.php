<?php

namespace App\Controller;

use App\Entity\RSexe;
use App\Form\EditType;
use App\Entity\RContrat;
use App\Entity\Collaborateur;


use App\Entity\RDureeContrat;


use App\Form\FgtPasswordType;

use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use App\Notifications\ContactNotification;
use App\Repository\CollaborateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

    
class SecurityController extends AbstractController
{
    /**
     * Permet l'inscription d'un compte
     * 
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
     * Permet la connexion à un compte 
     * 
     * @Route("/connexion", name="security_login")
     */

    public function connexion()
    {

        return $this->render('security/login.html.twig', [
           
        ]);
    }

    /**
     * Permet de retrouvé un mot de passe oublié
     * 
     * @Route("/forgot_password", name="security_forgot_password")
     */

    public function forgot_password( CollaborateurRepository $repo,
                                     Request $request,
                                     UserPasswordEncoderInterface $encoder,
                                    \Swift_Mailer $mailer,
                                    TokenGeneratorInterface $tokenGenerator
                                    ): Response
    {
       $form = $this->createForm(FgtPasswordType::class,  [
           'method' => 'POST'
       ]);

       $form->handleRequest($request);

        if ($request->isMethod('POST')) {

            $email = $request->request->get('email');

            $entityManager = $this->getDoctrine()->getManager();
      
            $user = $repo->findOneByEmail($email);
           

             /* @var $user Collaborateur */

            if ($user === null) {
                $this->addFlash('danger', 'Email Inconnu');
                return $this->redirectToRoute('homepage');
            }

             $token = $tokenGenerator->generateToken();

            try{
                $user->setResetToken($token);
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());
                return $this->redirectToRoute('homepage');
            }

            $url = $this->generateUrl('app_reset_password', array('token' => $token), UrlGeneratorInterface::ABSOLUTE_URL);

            $message = (new \Swift_Message('Forgot Password'))
                ->setFrom('fabien.orsn@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    "blablabla voici le token pour reseter votre mot de passe : " . $url,
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('notice', 'Mail envoyé');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/fgt_password.html.twig');
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