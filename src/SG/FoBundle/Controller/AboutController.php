<?php
namespace SG\FoBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller {
    public function indexAction()
    {        
        return $this->render('SGFoBundle:About:index.html.twig');
    }
}
?>