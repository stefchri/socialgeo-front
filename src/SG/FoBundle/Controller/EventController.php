<?php
namespace SG\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;

class EventController extends Controller 
{
    public function indexAction()
    {
        $events = array();
        $events = $this->getDoctrine()
        ->getRepository('SGFoBundle:Events')
        ->findAll();
        if (!$events) {
            throw $this->createNotFoundException(
                'No events found!'
             );
        }
        
        return $this->render('SGFoBundle:Event:index.html.twig', array(
            'events' => $events
        ));
    }
}
?>