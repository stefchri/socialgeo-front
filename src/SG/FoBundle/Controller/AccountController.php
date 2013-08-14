<?php
namespace SG\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

use SG\FoBundle\Form\Type;
use SG\FoBundle\Entity;
use SG\FoBundle\Utilities;

class AccountController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(      SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('SGFoBundle:Account:login.html.twig', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    public function registerAction(Request $request)
    {
//        if ($this->get('security.context')->isGranted('ROLE_USER')) {
//            throw new AccessDeniedException();
//        }

        $user = new Entity\Users();

        $form = $this->createForm(new Type\UserType(), $user);

        if ($request->isMethod('POST')) { 
            $form->bind($request);

            if ($form->isValid()) {
                
                //var_dump($user);
                $salt = Utilities\Utility::get_key();
                $user->setUserPasswordsalt($salt);
                
                $user->setUserCreateddate(date_create(gmdate("Y-m-d H:i:s")));
                
                $address = new Entity\Addresses();
                $address = $this->getDoctrine()
                    ->getRepository('SGFoBundle:Addresses')
                    ->find(1);
                
                $user->setUserHomeaddress($address);
                
                // Hash password with Security Encoder Factory service
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setUserPassword($password);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user); // Manage entity User for persistance.
                $entityManager->flush();        // Persist all managed entities.

                return $this->redirect($this->generateUrl('sg_fo_home'));
            }
        }

        return $this->render('SGFoBundle:Account:register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function viewAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            return $this->render('SGFoBundle:Account:view.html.twig', array(
                'user' => $user
            ));
        }  else {
            $this->redirect('/');
        }
    }
    
    public function editAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            //$usert = $user;
        $form = $this->createForm(new Type\UserType(), $user);
        
        if ($request->isMethod('POST')) {
            
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('sg_fo_home'));
            
            
        }
            return $this->render('SGFoBundle:Account:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }  else {
                return $this->redirect($this->generateUrl('sg_fo_home'));
        }   
        
    }
    public function eventAction()
    {
        $u = new Entity\Users();
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            $u = $user;
            $criteria = array(
                "user" => array(
                    'id' => $u->getUserId()
                ),
            );
            $events = $this->getDoctrine()
                    ->getRepository('SGFoBundle:Events')
                    ->findBy($criteria, array(
                        'eventStartdate' => 'ASC'
                    ));
        
            return $this->render('SGFoBundle:Account:event.html.twig', array(
                'events' => $events
            ));
        }  else {
                return $this->redirect($this->generateUrl('sg_fo_home'));
        }   
        
    }
    
    public function bookmarksAction()
    {
        $u = new Entity\Users();
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            $u = $user;
            
            $articles = $u->getArticleFollowed();
            $events = $u->getEventFollowed();
            $media = $u->getMediaFollowed();
            
            return $this->render('SGFoBundle:Account:bookmarks.html.twig', array(
                'events' => $events,
                'articles' => $articles,
                'media' => $media
            ));
        }  else {
                return $this->redirect($this->generateUrl('sg_fo_home'));
        }   
        
    }
}