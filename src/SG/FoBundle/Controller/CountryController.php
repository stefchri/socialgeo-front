<?php
namespace SG\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;

class CountryController extends Controller 
{
    public function indexAction()
    {
        $countries = array();
        $countries = $this->getDoctrine()
        ->getRepository('SGFoBundle:Countries')
        ->findAll();
        if (!$countries) {
            throw $this->createNotFoundException(
                'No countries found!'
             );
        }
        
        return $this->render('SGFoBundle:Country:index.html.twig', array(
            'countries' => $countries
        ));
    }
}
?>