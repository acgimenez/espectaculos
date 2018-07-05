<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\Esptoesp;


Class LoadEsptoespData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)

	{

		$Asignaciones = array();

		$espectaculo = $this->getReference('Espectaculo1');
		$espectador = $this->getReference('Espectador1');

		$asignacion = new Esptoesp();
		$asignacion -> setEspectaculo ($espectaculo);
		$asignacion -> setEspectador ($espectador);

		$Asignaciones[] = $asignacion;

		$espectaculo = $this->getReference('Espectaculo1');
		$espectador = $this->getReference('Espectador2');

		$asignacion = new Esptoesp();
		$asignacion -> setEspectaculo ($espectaculo);
		$asignacion -> setEspectador ($espectador);

		$Asignaciones[] = $asignacion;

		$espectaculo = $this->getReference('Espectaculo1');
		$espectador = $this->getReference('Espectador3');

		$asignacion = new Esptoesp();
		$asignacion -> setEspectaculo ($espectaculo);
		$asignacion -> setEspectador ($espectador);

		$Asignaciones[] = $asignacion;

		$espectaculo = $this->getReference('Espectaculo1');
		$espectador = $this->getReference('Espectador4');

		$asignacion = new Esptoesp();
		$asignacion -> setEspectaculo ($espectaculo);
		$asignacion -> setEspectador ($espectador);

		$Asignaciones[] = $asignacion;

		foreach( $Asignaciones as $asignacion){
			$manager->persist($asignacion);
		}

		$manager->flush();
	}

	public function getOrder(){
		return 6;
	}
}