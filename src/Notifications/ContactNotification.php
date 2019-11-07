<?php

namespace App\Notifications;

use Twig\Environment;
use App\Entity\Collaborateur;
use App\Entity\RSexe;

class ContactNotification {

/*
 *@var \Swift_Mailer
 */
private $mailer;


/*
 *@var Environment
 */
private $renderer;



    public function __construct(\Swift_Mailer $mailer, \Twig\Environment $renderer){
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Collaborateur $collab){
    $id_email = $collab->getEmail();
    $id_nom = $collab->getNom();


    $subject =  "le contenu de mon mail";
    $object =  "l'Objet de mon mail";
    $usermail = $id_email;
        // url validation point sur une action validation avec un param 
        $token=base64_encode($usermail);
        $urlvalidation="127.0.0.1:8000/validation/$token";
        $message = (new \Swift_Message())
        ->setSubject('Confirmation du compte ' . $collab->getEmail())
        ->setFrom('f.orsini@my-kiwi.fr')
        ->setContentType('text/html')
        ->setTo($usermail);

        $img = $message->embed(\Swift_Image::fromPath('img/logo_mykiwi.png'));
        
        $message->setBody(
                $this->renderer->render(
                'emails/contact.html.twig',[
                'nom'           => $collab->getNom(),
                'urlvalidation' => $urlvalidation,
                'img'           => $img,
                'sexe'          => $collab->getIdSexe()
                ]));



             //   ->addPart("<p>cliquez sur <a href='{$urlvalidation}'>ce lien</a></p>", 'text/html');
            

        $this->mailer->send($message);
}};

?>