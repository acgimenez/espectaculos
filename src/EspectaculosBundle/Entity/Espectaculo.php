<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 * @ORM\Table(name= "Espectaculos")
 */
class Espectaculo
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
	 * @ORM\ManyToOne(targetEntity="Sala")
	 */
	protected $sala;

	/**
	 * @ORM\Column(type="date", name="Desde", nullable=true)
	 */

	protected $fecha;
	
	/**
	 * @ORM\ManyToOne(targetEntity="TipoEspectaculos")
	 */

	protected $tipo;
	/** 
	 * @ORM\Column(type="text")
	 */

	protected $description;	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $imagen;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $cupo;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $cuporest;



	public function getId(){
		return $this->id;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($adescription){
		$this->description = $adescription;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($aimagen){
		$this->imagen = $aimagen;
	}
	
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($anombre){
		$this->nombre = $anombre;
	}

	public function getSala(){
		return $this->sala;
	}

	public function setSala($asala){
		$this->sala = $asala;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($afecha){
		$this->fecha = $afecha;
	}


	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($atipo){
		$this->tipo = $atipo;

		}

	public function getCupo(){
		return $this->cupo;
	}

	public function setCupo($acupo){
		$this->cupo = $acupo;
	}

	public function getCuporest(){
		return $this->cuporest;
	}

	public function setCuporest($acuporest){
		$this->cuporest = $acuporest;
	}



	public function __toString(){
		return $this->getnombre(); 
	}


	
}