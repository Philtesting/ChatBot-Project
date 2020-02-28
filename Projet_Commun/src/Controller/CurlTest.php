<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

class CurlTest extends AbstractController
{
    /**
     * @Route("/curlTest")
     */
    public function curlTest()
    {
        $ch = curl_init() ;
        $tokenWit = "Authorization: Bearer ODFJVKZRIHQ63W7UHJYZFTQE3D3XXOOR";
        $url =  'https://api.wit.ai/message?v=20200228&q=hello';
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $tokenWit);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        
        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
        return $this->render('base.html.twig');
    }
    

}


//curl  -H 'Authorization: Bearer ODFJVKZRIHQ63W7UHJYZFTQE3D3XXOOR'  'https://api.wit.ai/message?v=20141022&q=temperature


//curl -vvv -H 'Authorization: Bearer VTC3HPPCB6HD4BKUMSLOC3XKH4GEIV5L' 'https://api.wit.ai/message?v=20200228&q=hello'

//curl -vvv http://google.com