<?php

namespace SG\FoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;
class ArticleController extends Controller
{
    public function indexAction()
    {
        $articles = $this->getDoctrine()
        ->getRepository('SGFoBundle:Articles')
        ->findAll();
        
        if (!$articles) {
            throw $this->createNotFoundException(
                'No articles found!'
            );
        }
        
        return $this->render('SGFoBundle:Article:index.html.twig', array(
            'articles' => $articles,
            
        ));
    }
    
    public function viewAction($id)
    {
        $article = $this->getDoctrine()
        ->getRepository('SGFoBundle:Articles')
        ->find($id);
        
        if (!$article) {
            throw $this->createNotFoundException(
                'No $article found!'
            );
        }
        
        return $this->render('SGFoBundle:Article:view.html.twig', array(
            'article' => $article,
            
        ));
    }
    
    
    public function editAction($id,Request $request)
    {
        $article = $this->getDoctrine()
        ->getRepository('SGFoBundle:Articles')
        ->find($id);
        
        if (!$article) {
            throw $this->createNotFoundException(
                'No $article found!'
            );
        }
        $form = $this->createForm(new Type\ArticleType(), $article);
        if ($request->isMethod('POST')) {
            
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirect($this->generateUrl('sg_fo_articles'));
            
            
        }
        
        
        
        return $this->render('SGFoBundle:Article:edit.html.twig', array(
            'form' => $form->createView(),
            
        ));
    }
}

