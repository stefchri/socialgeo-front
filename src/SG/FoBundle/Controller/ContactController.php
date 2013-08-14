<?php
namespace SG\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;

class ContactController extends Controller {
    public function indexAction()
    {
        $form = $this->createForm(new Type\ContactType());
        return $this->render('SGFoBundle:Contact:index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
?>