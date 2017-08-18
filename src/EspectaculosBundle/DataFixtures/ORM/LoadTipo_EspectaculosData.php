<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\TipoEspectaculos;


Class LoadTipo_EspectaculosData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)

	{
		$Tipos = array();

		
		$tipo = new TipoEspectaculos();
		$tipo -> setNombre ('Pelicula');

		$Tipos[] = $tipo;

		$tipo = new TipoEspectaculos();
		$tipo -> setNombre ('Teatro');

		$Tipos[] = $tipo;

		$tipo = new TipoEspectaculos();
		$tipo -> setNombre ('Recital');

		$Tipos[] = $tipo;


		$tipo = new TipoEspectaculos();
		$tipo -> setNombre ('Concierto');

		$Tipos[] = $tipo;



		foreach( $Tipos as $tipoespectaculo){
			$manager->persist($tipoespectaculo);
		}

		$manager->flush();
	

		$this->addReference("Tipo1",$Tipos[0]);
		$this->addReference("Tipo2",$Tipos[1]);
		$this->addReference("Tipo3",$Tipos[2]);
		$this->addReference("Tipo4",$Tipos[3]);		
	}

	public function getOrder(){
		return 2;
	}

}