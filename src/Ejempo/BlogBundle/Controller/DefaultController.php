<?php

namespace Ejempo\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     */
      public function indexAction()
    {
        $posts = $this->getDoctrine()
                        ->getRepository('EjempoBlogBundle:Post')
                        ->findAll();
        return $this->render('EjempoBlogBundle:Default:index.html.twig',array(
                                                                                'posts' => $posts
                                                                                )
        );


    }
    /**
     * @Route("/post/{id}", name="ficha_post")
     */
    public function postAction($id)
    {
    	$post = $this->getDoctrine()
                        ->getRepository('EjempoBlogBundle:Post')
                        ->find($id);
    	
    	// src/Ejempo/BlogBundle/views/Default/post.html.twig
    	return $this->render('EjempoBlogBundle:Default:post.html.twig', array(
    		'post' => $post
        ));
    }


   
}

