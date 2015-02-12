<?php
namespace Cliente\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;
use LosBase\Entity\AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="cliente")
 * @Form\Name("formCliente")
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Form\Type("LosBase\Form\AbstractForm")
 */
class Cliente extends AbstractEntity
{
	/**
	 * @ORM\Column(type="string", length=150)
	 */
	protected $nome;

	/**
	 * @ORM\Column(type="brprice")
	 */
	protected $credito;

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}

	public function getCredito()
	{
		return $this->credito;
	}

	public function setCredito($credito)
	{
		$this->credito = $credito;
		return $this;
	}

	public function __toString()
	{
		return $this->nome;
	}
}
