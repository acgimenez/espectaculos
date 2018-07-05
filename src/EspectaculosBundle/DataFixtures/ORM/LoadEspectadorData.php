<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\Espectador;


Class LoadEspectadorData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)

	{

		$espectadores = array();

		

		$espectador = new Espectador();
		$espectador -> setNombre ('Luis');
		$espectador -> setApellido ('Acebal');
		$espectador -> setDni ('24566743');
   		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1982-08-15'));

		$espectadores[] = $espectador;

		$espectador = new Espectador();
		$espectador -> setNombre ('Alejandro');
		$espectador -> setApellido ('Ramirez');
		$espectador -> setDni ('13309688');
   		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1959-12-05'));
		
		$espectadores[] = $espectador;

		$espectador = new Espectador();
		$espectador -> setNombre ('Roberto');
		$espectador -> setApellido ('Fuentes');
		$espectador -> setDni ('20304521');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1968-12-22'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Margarita');
		$espectador -> setApellido ('Fernandez');
		$espectador -> setDni ('10492130');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1945-11-30'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Alejandro');
		$espectador -> setApellido ('Ramirez');
		$espectador -> setDni ('13309688');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1959-05-12'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Sonia');
		$espectador -> setApellido ('Amafuerte');
		$espectador -> setDni ('23189215');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1973-09-02'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Vicente');
		$espectador -> setApellido ('Morinigo');
		$espectador -> setDni ('21490819');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1969-05-07'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Micaela');
		$espectador -> setApellido ('Michelson');
		$espectador -> setDni ('34219567');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1987-11-23'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Andres');
		$espectador -> setApellido ('Ferreyra');
		$espectador -> setDni ('21591342');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1968-07-20'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Karina');
		$espectador -> setApellido ('Velazquez');
		$espectador -> setDni ('40234941');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1996-10-14'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Marta');
		$espectador -> setApellido ('Wollman');
		$espectador -> setDni ('14681257');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1959-07-17'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Jose ');
		$espectador -> setApellido ('Garcia');
		$espectador -> setDni ('26571694');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1979-05-31'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Ruben ');
		$espectador -> setApellido ('Yob');
		$espectador -> setDni ('10592484');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1951-11-05'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Andrea');
		$espectador -> setApellido ('Mendoza');
		$espectador -> setDni ('31267190');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1984-12-25'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Alejandro');
		$espectador -> setApellido ('Escalante');
		$espectador -> setDni ('18613002');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1965-03-06'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Ernesto ');
		$espectador -> setApellido ('Garcia');
		$espectador -> setDni ('33820182');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1987-02-07'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Roman');
		$espectador -> setApellido ('Zeleznik');
		$espectador -> setDni ('22815430');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1971-06-18'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Marcos');
		$espectador -> setApellido ('Segovia');
		$espectador -> setDni ('20456817');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1968-01-10'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Belen');
		$espectador -> setApellido ('Rodriguez');
		$espectador -> setDni ('40618522');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1996-11-04'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Lorena');
		$espectador -> setApellido ('Aguirre');
		$espectador -> setDni ('17621095');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1964-12-09'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Adrian');
		$espectador -> setApellido ('Zitchert');
		$espectador -> setDni ('12784302');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1956-06-06'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Adriana');
		$espectador -> setApellido ('Costa');
		$espectador -> setDni ('26391237');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1977-10-24'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Bejamin');
		$espectador -> setApellido ('Sosa');
		$espectador -> setDni ('32769615');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1987-11-25'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Tatiana');
		$espectador -> setApellido ('Ramirez');
		$espectador -> setDni ('32231813');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1985-04-18'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Ana');
		$espectador -> setApellido ('Colmeiro');
		$espectador -> setDni ('42610932');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1998-02-09'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Lucia');
		$espectador -> setApellido ('Matic');
		$espectador -> setDni ('38230193');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1993-01-27'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Daiana');
		$espectador -> setApellido ('Rodriguez');
		$espectador -> setDni ('44691872');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','2000-07-13'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Guadalupe');
		$espectador -> setApellido ('Colmeiro');
		$espectador -> setDni ('17581634');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1964-12-13'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Rafael');
		$espectador -> setApellido ('Moreno');
		$espectador -> setDni ('27812093');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1979-08-08'));

		$espectadores[] = $espectador;


		$espectador = new Espectador();
		$espectador -> setNombre ('Carina');
		$espectador -> setApellido ('Farias');
		$espectador -> setDni ('42687921');
		$espectador -> setFechanac (\DateTime::createFromFormat('Y-m-d','1996-10-24'));

		$espectadores[] = $espectador;

		




		foreach( $espectadores as $espectador){
			$manager->persist($espectador);
		}

		$manager->flush();

		$this->addReference("Espectador1",$espectadores[0]);
		$this->addReference("Espectador2",$espectadores[1]);
		$this->addReference("Espectador3",$espectadores[2]);
		$this->addReference("Espectador4",$espectadores[3]);
		$this->addReference("Espectador5",$espectadores[4]);
		

	}

	public function getOrder(){
		return 4;
	}
}
