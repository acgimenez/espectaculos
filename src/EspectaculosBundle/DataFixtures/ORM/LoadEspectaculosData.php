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

		$sala = $this->getReference('Sala2');
		$tipo = $this->getReference('Tipo1');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Rapido y furioso 8');
		$nombre-> setDescription('Descripcion: The Fate of the Furious es una película de acción estadounidense de 2017 dirigida por Felix Gary Gray y escrita por Chris Morgan. Es la octava película de la franquicia The Fast and the Furious. Fecha de estreno: 13 de abril de 2017 (Argentina) Director: F. Gary Gray Música compuesta por: Brian Tyler Guion: Chris Morgan Productores: Vin Diesel, Neal H. Moritz, Michael Fottrell');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);
		$nombre-> setImagen ('http://localhost/espectaculos/web/RF8.jpg');
		$nombre-> setcupo ('5');
		$nombre-> setcuporest ('5');
		$nombre-> setfecha (\DateTime::createFromFormat('Y-m-d','2017-08-15'));


		$Nombres[] = $nombre;


		$sala = $this->getReference('Sala2');
		$tipo = $this->getReference('Tipo1');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Rey Arturo');
		$nombre-> setDescription('No informa');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);
		$nombre-> setImagen ('http://img.aullidos.com/imagenes/caratulas/rey-arturo-2017.jpg');
		$nombre-> setcupo ('5');
		$nombre-> setcuporest ('5');
		$nombre-> setfecha (\DateTime::createFromFormat('Y-m-d','2017-08-25'));

		$Nombres[] = $nombre;


		$sala = $this->getReference('Sala1');
		$tipo = $this->getReference('Tipo2');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Mas respeto que soy tu madre');
		$nombre-> setDescription('Descripcion: Mirta Bertotti, un ama de casa argentina de cincuenta años, se le cae el mundo encima cuando la crisis económica de 2001 desbarranca a su familia, desde la clase media a la pobreza absoluta. Un marido desocupado, dos hijos adolescentes con problemas, un suegro drogadicto y la llegada de la menopausia hacen que su vida se convierta en un infierno. La protagonista necesitará un humor a prueba de balas para convertir cada desgracia familiar en una lección de vida.');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);
		$nombre-> setImagen ('http://localhost/espectaculos/web/STM.jpg');
		$nombre-> setcupo ('5');
		$nombre-> setcuporest ('5');
		$nombre-> setfecha (\DateTime::createFromFormat('Y-m-d','2017-09-07'));

		$Nombres[] = $nombre;


		$sala = $this->getReference('Sala3');
		$tipo = $this->getReference('Tipo1');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Mi villano favorito 3 (3D)');
		$nombre-> setDescription(' Es una película de animación, tercera entrega de la franquicia de Despicable Me, estrenada el 30 de junio de 2017, producida por la productora Illumination Entertainment y distribuida por Universal Studios.');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);
		$nombre-> setImagen ('https://i.ytimg.com/vi/J2WSxkUL5vU/maxresdefault.jpg');
		$nombre-> setcupo ('5');
		$nombre-> setcuporest ('5');
		$nombre-> setfecha (\DateTime::createFromFormat('Y-m-d','2017-09-20'));

		$Nombres[] = $nombre;


		$sala = $this->getReference('Sala5');
		$tipo = $this->getReference('Tipo3');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Sabina - Lo niego todo');
		$nombre-> setDescription('Joaquín Sabina ha conseguido el número 1 en la lista de ventas de discos española con su nuevo álbum, Lo niego todo, publicado el pasado 10 de marzo, que ya es Disco de Platino con 40.000 unidades distribuidas Lo niego todo alcanza el número 1 de ventas con la cifra más alta de todos los lanzamientos discográficos de los últimos dos años en su primera semana", informa Sony Music en un comunicado. Detrás del jienense se sitúan en la lista de esta semana Ed Sheeran con Divide, Jarabe de Palo con 50 palos (nueva entrada), la banda sonora de La La Land y Melendi con Quítate las gafas (que lleva 18 semanas).');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);
		$nombre-> setImagen ('http://localhost/espectaculos/web/Sabina1857.jpg');
		$nombre-> setcupo ('5');
		$nombre-> setcuporest ('5');
		$nombre-> setfecha (\DateTime::createFromFormat('Y-m-d','2017-11-22'));

		$Nombres[] = $nombre;


		$sala = $this->getReference('Sala4');
		$tipo = $this->getReference('Tipo4');
		$nombre = new Espectaculo();
		$nombre-> setNombre ('Festival Barenboim');
		$nombre-> setDescription('MAURICE RAVEL: SUITE DE “MI MADRE LA OCA”; DMITRI SHOSTAKOVICH: CONCIERTO PARA PIANO, TROMPETA Y ORQUESTA N° 1 EN DO MENOR OP 35; MAURICE RAVEL: LA TUMBA DE COUPERIN, ALBAN BERG, TRES PIEZAS PARA ORQUESTA OP. 6');
		$nombre-> setSala ($sala);
		$nombre-> setTipo ($tipo);
		$nombre-> setImagen ('http://localhost/espectaculos/web/perfil_barenboim[1].jpg');
		$nombre-> setcupo ('5');
		$nombre-> setcuporest ('5');
		$nombre-> setfecha (\DateTime::createFromFormat('Y-m-d','2017-10-24'));

		$Nombres[] = $nombre;




		foreach( $Nombres as $espectaculo){
			$manager->persist($espectaculo);
		}

		$manager->flush();

		$this->addReference("Espectaculo1",$Nombres[0]);
		$this->addReference("Espectaculo6",$Nombres[5]);

	}

	public function getOrder(){
		return 5;
	}
}