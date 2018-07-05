<?php

namespace EspectaculosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface; 
use Symfony\Component\DependencyInjection\ContainerInterface; 

use EspectaculosBundle\Entity\User;


Class LoadUserData extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface 
{

	/** 
      * @var ContainerInterface 
    */

      private $container; 
  
     /** 
     * {@inheritDoc} 
      */ 
     public function setContainer(ContainerInterface $container = null) 
     { 
         $this->container = $container; 
     } 
  
     /** 
     * {@inheritDoc} 
     */ 
     public function load(ObjectManager $manager) 
     { 
          
        $factory = $this->container->get('security.encoder_factory'); 
        $manager = $this->container->get('fos_user.user_manager'); 
  
        $userAdmin = new User();
        $userAdmin->setUsername('adminuser');
        $userAdmin->setemail('am@gmail.com');

        $encoder = $factory->getEncoder($userAdmin); 
        $password = $encoder->encodePassword('1234', $userAdmin->getSalt()); 
        $userAdmin->setPassword($password); 

        $userAdmin->setroles(array('ROLE_SUPER_ADMIN'));
        $userAdmin->setenabled(true);
 
		$manager->updateUser($userAdmin);	
 
        $userAdmin = new User();
        $userAdmin->setUsername('agimenez');
        $userAdmin->setemail('ag@gmail.com');

        $encoder = $factory->getEncoder($userAdmin); 
        $password = $encoder->encodePassword('4321', $userAdmin->getSalt()); 
        $userAdmin->setPassword($password); 

        $userAdmin->setroles(array('ROLE_USER'));
        $userAdmin->setenabled(true);
 
		$manager->updateUser($userAdmin);	 

    }

    public function getOrder()
    {
        return 1;
    }

}

                    
