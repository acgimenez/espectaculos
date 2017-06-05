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
	 * @ORM\ManyToOne(targetEntity="TipoEspectaculos")
	 */
	protected $tipo;

	

	public function getId(){
		return $this->id;
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

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($atipo){
		$this->tipo = $atipo;

		}
}