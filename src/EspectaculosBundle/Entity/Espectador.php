<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 * @ORM\Table(name= "Espectadores")
 */
class Espectador
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
	/** 
	 * @ORM\Column(type="string", length=100)
	 */
	protected $apellido;	
	/**
	 * @ORM\Column(type="string", length=10)
	 */
	protected $dni;
	/**
	 * @ORM\Column(type="date", name="Fecha_Nac", nullable=true)
	 */
	protected $fechanac;



	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($anombre){
		$this->nombre = $anombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($aapellido){
		$this->apellido = $aapellido;
	}

	
	public function getDni(){
		return $this->dni;
	}

	public function setDni($adni){
		$this->dni = $adni;
	}

	public function getFechanac(){
		return $this->fechanac;
	}

	public function setFechanac($afechanac){
		$this->fechanac = $afechanac;
	}


	public function __toString(){
		return $this->getNombre()." ".$this->getApellido(); 
	}
	
}