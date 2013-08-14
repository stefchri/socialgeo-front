<?php
namespace SG\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;

class CityController extends Controller
{
    public function indexAction()
    {
        $cities = array();
        $cities = $this->getDoctrine()
        ->getRepository('SGFoBundle:Cities')
        ->findAll();
        
        if (!$cities) {
            throw $this->createNotFoundException(
                'No cities found!'
             );
        }
        
        return $this->render('SGFoBundle:City:index.html.twig', array(
            'cities' => $cities
        ));
    }
}