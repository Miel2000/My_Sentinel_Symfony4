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

class CollaborateurController extends AbstractController
{
    /**
     *  @Route("/collaborateur/{id}/{nom}/{email}", name="collaborateur_authed")
     */
    public function index($id,$nom,$email)
    {

        
        return $this->render('collaborateur/index.html.twig', [
            'id' => $id,
            'nom' => $nom,
            'email' => $email
        ]);
    }
    /**
     * 
     * Page présentation des collaborateur
     * 
     * @Route("/collaborateur", name="collaborateur_list")
     */
    public function collaborateur(CollaborateurRepository $repo)
    {
        $collabs = $repo->findAll();

        return $this->render('roles/index.html.twig', [
            'collabs' => $collabs
        ]);
    }


    

    /**
     * 
     * Permet la suppression un collaborateur
     * 
     * @Route("/collaborateur/delete/{id}", name="collaborateur_delete")
     */
    public function deleteAction( Request $request, $id, ObjectManager $manager,Collaborateur $collab)
    {
        $repository = $this->getDoctrine()->getRepository(Collaborateur::class);
        $collab_to_delete = $repository->find($id);
        $manager->remove($collab_to_delete);
        $manager->flush();
        $response = $this->forward('App\Controller\CollaborateurController::collaborateur', [
    ]);

       return $response; 

    }

}
