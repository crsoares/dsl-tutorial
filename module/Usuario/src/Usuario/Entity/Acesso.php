<?php
namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;
use LosBase\Entity\AbstractEntity as AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="acesso")
 */
class Acesso extends AbstractEntity
{
	/**
	 * @ORM\Column(type="string")	
	 */
	protected $ip;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $agente;

	/**
	 * @ORM\ManyToOne(targetEntity="Usuario\Entity\Usuario", inversedBy="acessos")
	 * @ORM\JoinColumn(nullable=false, onDelete="RESTRICT")
	 */
	protected $usuario;

	public function getIp()
	{
		return $this->ip;
	}

	public function setIp($ip)
	{
		$this->ip = $ip;
		return $this;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
		return $this;
	}

	public function getAgente()
	{
		return $this->agente;
	}

	public function setAgente($agente)
	{
		$this->agente = $agente;
		return $this;
	}
}