<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string", length=150)
     */
    private $email;

    private $password;

    private $plainPassword;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Location", mappedBy="location", orphanRemoval=true)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Annonce", mappedBy="annonce", orphanRemoval=true)
     */
    private $annonce;
    /**
     * @ORM\Column(type="simple_array")
     */
    private $roles;
    /**
     * @ORM\Column()
     * @Assert\NotBlank()
     * @Assert\Length(max=10)
     *
     */

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->location = new ArrayCollection();
        $this->annonce = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function getSalt()
    {
        return null;
    }
    public function getUsername()
    {
        return $this->email;
    }
    public function eraseCredentials(){

    }

    public function getPlainPassword() :?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }
    /**
     * @return Collection|Location[]
     */
    public function getLocation(): Collection
    {
        return $this->location;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->location->contains($location)) {
            $this->location[] = $location;
            $location->setLocation($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->location->contains($location)) {
            $this->location->removeElement($location);
            // set the owning side to null (unless already changed)
            if ($location->getLocation() === $this) {
                $location->setLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonce(): Collection
    {
        return $this->annonce;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonce->contains($annonce)) {
            $this->annonce[] = $annonce;
            $annonce->setAnnonce($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonce->contains($annonce)) {
            $this->annonce->removeElement($annonce);
            // set the owning side to null (unless already changed)
            if ($annonce->getAnnonce() === $this) {
                $annonce->setAnnonce(null);
            }
        }

        return $this;
    }
}
