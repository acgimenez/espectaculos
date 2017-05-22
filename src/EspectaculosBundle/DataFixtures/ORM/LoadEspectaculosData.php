<?php
namespace EspectaculosBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


use Doctrine\Common\Persistence\ObjectManager;

use EspectaculosBundle\Entity\Espectaculo;


Class LoadEspectaculosData extends AbstractFixture implements OrderedFixtureInterface
{

		

	public function load(ObjectManager $manager)

	{
		$Nombres = array();

		$sala = $this->getReference('Sala1');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Rapido y furioso 8');
		$nombre-> setSala ($sala);

		$Nombres[] = $nombre;

		$nombre = new Espectaculo();
		$nombre -> setNombre ('Rey Arturo');

		$Nombres[] = $nombre;

		$nombre = new Espectaculo();
		$nombre -> setNombre ('Mas respeto que soy tu madre');

		$Nombres[] = $nombre;


		foreach( $Nombres as $espectaculo){
			$manager->persist($espectaculo);
		}

		$manager->flush();
	}

	public function getOrder(){
		return 3;
	}
}