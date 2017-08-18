<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 * @ORM\Table(name= "Salas")
 */
class Sala
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
	protected $direccion;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $telefono;
	
	// Generar getters y setters


	
	public function getId(){
		return $this->id;
	}

	public function getnombre(){
		return $this->nombre;
	}

	public function setnombre($anombre){
		$this->nombre = $anombre;
	}

	public function getdireccion(){
		return $this->direccion;
	}

	public function setdireccion($adireccion){
		$this->direccion = $adireccion;
	}

	public function gettelefono(){
		return $this->telefono;
	}

	public function settelefono($atelefono){
		$this->telefono = $atelefono;
	}
	
	public function __toString(){
		return $this->getnombre(); 
	}
	
		
}