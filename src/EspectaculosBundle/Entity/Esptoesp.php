<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 * @ORM\Table(name= "Esptoesp")
 */
class Esptoesp
{	

	/**
	 * @ORM\id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Espectaculo")
	 */
	protected $espectaculo;

	/**
	 * @ORM\ManyToOne(targetEntity="Espectador")
	 */
	protected $espectador;



	public function getId(){
		return $this->id;
	}

	public function getEspectador(){
		return $this->espectador;
	}

	public function setEspectador($aespectador){
		$this->espectador = $aespectador;
	}


	public function getEspectaculo(){
		return $this->espectaculo;
	}

	public function setEspectaculo($aespectaculo){
		$this->espectaculo = $aespectaculo;
	}



}