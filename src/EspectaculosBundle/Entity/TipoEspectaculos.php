<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity

 */
class TipoEspectaculos
{
	/**
	 * @ORM\id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $nombre;

	
	// Generar getters y setters


	
	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($aNombre){
		$this->nombre = $aNombre;
	}


}