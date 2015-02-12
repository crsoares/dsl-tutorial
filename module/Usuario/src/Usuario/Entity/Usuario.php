<?php
namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZfcUser\Entity\UserInterface as ZfcUserInterface;
use ZfcRbac\Identity\IdentityInterface;
use Zend\Form\Annotation as Form;
use LosBase\Entity\AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 * @Form\Name("formUsuario")
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Form\Type("LosBase\Form\AbstractForm")
 */
class Usuario extends AbstractEntity implements ZfcUserInterface, IdentityInterface
{
	/**
	 * @ORM\Column(type="string", length=250)
	 */
	protected $nome;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $email = '';

	/**
	 * @ORM\ManyToOne(targetEntity="Cliente\Entity\Cliente", inversedBy="usuarios")
	 * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
	 * @ORM\OrderBy({"nome" = "ASC"})
	 */
	protected $cliente;

	/**
	 * @ORM\Column(type="string", length=32)
	 * Possiveis: visitante, usuario, suporte, admin
	 */
	protected $permissao = 'visitante';

	protected $username;

	/**
	 * @ORM\Column(type="string", length=128)
	 */
	protected $password;

	protected $confirmesenha;

	/**
	 * @ORM\OneToMany(targetEntity="Usuario\Entity\Acesso", mappedBy="usuario")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $acessos;

	public function __construct()
	{
		$this->created = new \DateTime('now');
		$this->updated = new \DateTime('now');
		$this->acessos = new ArrayCollection();
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}

	public function getPermissao()
	{
		return $this->permissao;
	}

	public function setPermissao($permissao)
	{
		$this->permissao = $permissao;
		return $this;
	}

	public function getRoles()
	{
		return array(
			$this->permissao,
		);
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	public function getDisplayName()
	{
		return $this->getNome();
	}

	public function setDisplayName($displayName)
	{}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		if (! empty($password)) {
			$this->password = (string) $password;
		}
	}

	public function getState()
	{}

	public function setState($state)
	{}

	public function getConfirmesenha()
	{
		return $this->confirmesenha;
	}

	public function setConfirmesenha($confirmesenha)
	{
		$this->confirmesenha = $confirmesenha;
		return $this;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function setCliente($cliente)
	{
		$this->cliente = $cliente;
		return $this;
	}

	public function getAcessos()
	{
		return $this->acessos;
	}

	public function setAcessos($acessos)
	{
		$this->acessos = $acessos;
		return $this;
	}

	public function addAcessos(Collection $acessos)
	{
		foreach ($acessos as $acesso) {
			$acesso->setUsuario($this);
			$this->acessos->add($acesso);
		}
	}

	public function removeAcessos(Collection $acessos)
	{
		foreach ($acessos as $acesso) {
			$this->acessos->removeElement($acesso);
		}
	}

	public function addAcesso($acesso)
	{
		foreach ($this->acessos as $tok) {
			if ($tok->getId() == $acesso->getId()) {
				return $this;
			}
		}

		$this->acessos[] = $acesso;
		return $this;
	}

	public function __toString()
	{
		return $this->getDisplayName();
	}
}
