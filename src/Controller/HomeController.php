<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\Collaborateur;
use App\Repository\RoleRepository;
use App\Repository\CollaborateurRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        return $this->render('home/index.html.twig', [
           
        ]);
    }

    // /*
    //  * @Route("/equipe", name="equipe")
    //  */
    
    // public function equipe()
    // {
        
    //     return $this->render('roles/index.html.twig');
    // }
    
    /**
     * @Route("/validation/{token}", name="validation")
     */
    public function validation($token, Request $request, CollaborateurRepository $repo ,ObjectManager $manager)
    {
        // on décode notre token 
        $email = base64_decode($token);
        // on cherche precisement lequel c'est dans le repo
        $collab = $repo->findOneBy([
        'email' => $email,
        'isvalid' => 0
        ]);

        // on lance le changement dans la bdd via requette sql

      $em = $this->getDoctrine()->getManager();

      $req = 'UPDATE Collaborateur 
              SET isvalid = 1
              WHERE email = :email
              ';
   
    $statement = $em->getConnection()->prepare($req);
    $statement->bindValue('email', $email);
    $statement->execute();
       
        return $this->render('home/validate.html.twig', [
            'email' => $email
           
        ]);
    }

}
