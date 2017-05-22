<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\Sala;


Class LoadSalaData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)

	{
		$salas = array();

		

		$sala = new Sala();
		$sala -> setNombre ('Maipo');
		$sala -> setDireccion ('Av Corrientes 1200');
		$sala -> setTelefono ('011 4453629');

		$salas[] = $sala;

		$sala = new Sala();
		$sala -> setNombre ('Cinemark');
		$sala -> setDireccion ('Av Alicia Moreau de Justo 200');
		$sala -> setTelefono ('011 4455364');


		$salas[] = $sala;

		foreach( $salas as $sala){
			$manager->persist($sala);
		}

		$manager->flush();

		$this->addReference("Sala1",$salas[0]);
	}

	public function getOrder(){
		return 1;
	}
}
