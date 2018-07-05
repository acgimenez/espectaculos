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


		$sala = new Sala();
		$sala -> setNombre ('Sunstar Cinemas Ushuaia');
		$sala -> setDireccion ('Av. Perito Moreno 1460-Paseo del Fuego, Ushuaia');
		$sala -> setTelefono ('No informa');

		$salas[] = $sala;


		$sala = new Sala();
		$sala -> setNombre ('Teatro Colón');
		$sala -> setDireccion ('Cerrito 628, C1010 CABA');
		$sala -> setTelefono ('011 4378-7100');

		$salas[] = $sala;


		$sala = new Sala();
		$sala -> setNombre ('Luna Park');
		$sala -> setDireccion ('Av. Eduardo Madero 470, C1106ACR CABA');
		$sala -> setTelefono ('011 5278-5800');

		$salas[] = $sala;



		foreach( $salas as $sala){
			$manager->persist($sala);
		}

		$manager->flush();

		$this->addReference("Sala1",$salas[0]);
		$this->addReference("Sala2",$salas[1]);
		$this->addReference("Sala3",$salas[2]);
		$this->addReference("Sala4",$salas[3]);
		$this->addReference("Sala5",$salas[4]);

	}

	public function getOrder(){
		return 2;
	}
}
