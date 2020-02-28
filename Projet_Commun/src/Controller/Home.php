<?php
// src/Controller/Home.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Home extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return $this->render('base.html.twig');
    }
}