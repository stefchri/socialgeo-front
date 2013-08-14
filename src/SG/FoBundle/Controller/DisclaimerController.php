<?php
namespace SG\FoBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DisclaimerController extends Controller {
    public function indexAction()
    {        
        return $this->render('SGFoBundle:Disclaimer:index.html.twig');
    }
}
?>