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
		$fechadesde="10-04-17";
		$Nombres = array();

		$sala = $this->getReference('Sala2');
		$tipo = $this->getReference('Tipo1');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Rapido y furioso 8');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);


		$Nombres[] = $nombre;

		$sala = $this->getReference('Sala2');
		$tipo = $this->getReference('Tipo1');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Rey Arturo');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);

		$Nombres[] = $nombre;

		$sala = $this->getReference('Sala1');
		$tipo = $this->getReference('Tipo2');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Mas respeto que soy tu madre');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);

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