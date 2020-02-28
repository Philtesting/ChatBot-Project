<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Chatbox extends AbstractController
{
    /**
     * @Route("/chatbot")
     */
    public function chatbox()
    {
        return $this->render('chat/chatbox.html.twig');
    }
    

}