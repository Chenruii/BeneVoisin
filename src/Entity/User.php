<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @ManyToOne(targetEntity="Residence")
     * @JoinColumn(name="residence_id", referencedColumnName="id")
     */
    private $residence;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @ManyToOne(targetEntity="Post")
     * @JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $post;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $roles;

    private $password;

    private $plainPassword;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->residences = new ArrayCollection();
        $this->post = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
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

    public function setUsername(?string $email): self
    {
        $this->email = $email;

        return $this;
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
     * @return Collection|Post[]
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    public function addPost(Post $post): self
    {
        if (!$this->post->contains($post)) {
            $this->post[] = $post;
            $post->setAnnouncer($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->post->contains($post)) {
            $this->post->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getAnnouncers() === $this) {
                $post->setAnnouncers( null );
            }
        }
        return $this;
    }
    /**
     * @return Collection|PlaceEvent[]
     */
    public function getResidence(): Collection
    {
        return $this->residence;
    }

    public function addResidence(Residence $residence): self
    {
        if (!$this->residence->contains($residence)) {
            $this->residence[] = $residence;
        }

        return $this;
    }

    public function removeResidence(PlaceEvent $residence): self
    {
        if ($this->residence->contains($residence)) {
            $this->residence->removeElement($residence);
            // set the owning side to null (unless already changed)
        }
        return $this;
    }

}
