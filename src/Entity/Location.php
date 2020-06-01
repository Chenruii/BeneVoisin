<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="integer", length=200)
	 */
	private $identifier;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="locations")
	 */
	private $users;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $street;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $city;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $zipCode;

	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $country;

	public function __construct()
	{
		$this->users = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getIdentifier()
	{
		return $this->identifier;
	}

	/**
	 * @param mixed $identifier
	 */
	public function setIdentifier($identifier): void
	{
		$this->identifier = $identifier;
	}

	/**
	 * @return Collection|User[]
	 */
	public function getUsers(): Collection
	{
		return $this->users;
	}
	public function addUser(User $user): self
	{
		if (!$this->users->contains($user)) {
			$this->users[] = $user;
			$user->addLocation($this);
		}
		return $this;
	}
	public function removeUser(User $user): self
	{
		if ($this->users->contains($user)) {
			$this->users->removeElement($user);
			$user->removeLocation($this);
		}
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * @param mixed $street
	 */
	public function setStreet($street): void
	{
		$this->street = $street;
	}

	/**
	 * @return mixed
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @param mixed $city
	 */
	public function setCity($city): void
	{
		$this->city = $city;
	}

	/**
	 * @return mixed
	 */
	public function getZipCode()
	{
		return $this->zipCode;
	}

	/**
	 * @param mixed $zipCode
	 */
	public function setZipCode($zipCode): void
	{
		$this->zipCode = $zipCode;
	}

	/**
	 * @return mixed
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @param mixed $country
	 */
	public function setCountry($country): void
	{
		$this->country = $country;
	}
}
