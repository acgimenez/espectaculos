<?php
namespace Ejempo\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ejempo\BlogBundle\Entity\Post;

Class LoadPostData implements FixtureInterface
{
	public function load(ObjectManager $manager)

	{
		$posts = array();

		

		$post = new Post();
		$post -> setName ('Rapido y Furioso 8');
		$post -> setDescription ('Pelicula de la serie rapido y furioso');
		$post -> setFoto ('http://es.web.img3.acsta.net/c_215_290/pictures/17/03/07/14/12/442907.jpg');

		$posts[] = $post;

		$post = new Post();
		$post -> setName ('Rey Arturo');
		$post -> setDescription ('Pelicula de accion');
		$post -> setFoto ('http://www.fotogramas.es/var/ezflow_site/storage/images/noticias-cine/rey-arturo-trailer/128984881-1-esl-ES/Rey-Arturo-La-leyenda-de-Excalibur-Nuevo-trailer_reference.png');

		$posts[] = $post;

		foreach( $posts as $post){
			$manager->persist($post);
		}

		$manager->flush();
	}


}
