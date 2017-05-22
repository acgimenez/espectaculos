<?php

namespace Ejempo\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 * @ORM\Table(name= "post")
 */
class Post
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
	protected $name;

	/** 
	 * @ORM\Column(type="text")
	 */
	protected $description;
	// Generar getters y setters


	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $foto;


	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($aName){
		$this->name = $aName;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($aDescription){
		$this->description = $aDescription;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($aFoto){
		$this->foto = $aFoto;
	}

}