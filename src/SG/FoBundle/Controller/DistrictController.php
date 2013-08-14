<?php
namespace SG\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;

class DistrictController extends Controller
{
    public function indexAction()
    {
        $districts = array();
        $districts = $this->getDoctrine()
        ->getRepository('SGFoBundle:Districts')
        ->findAll();
        
        if (!$districts) {
            throw $this->createNotFoundException(
                'No districts found!'
            );
        }
        
        return $this->render('SGFoBundle:District:index.html.twig', array(
            'districts' => $districts
        ));
    }
    
    public function viewAction($id)
    {
        
        $district = $this->getDoctrine()
        ->getRepository('SGFoBundle:Districts')
        ->find($id);
        
        if (!$district) {
            throw $this->createNotFoundException(
                'No districts found!'
            );
        }
        
        return $this->render('SGFoBundle:District:view.html.twig', array(
            'district' => $district
        ));
    }
    
    
}