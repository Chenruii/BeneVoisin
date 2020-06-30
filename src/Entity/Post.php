<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="le titre ne doit pas être vide")
     * @Assert\Length( max=50, maxMessage="le titre ne doit pas dépasser 50 caractères")
     */
    private $titlePost;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="le contenu ne doit pas être vide")
     */
    private $descriptionPost;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $announcer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEvent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlaceEvent", mappedBy="post")
     */
    private $placeEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postType;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="post")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $users;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Theme", mappedBy="user", orphanRemoval=true)
     */
    private $themes;


    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitlePost(): ?string
    {
        return $this->titlePost;
    }

    public function setTitlePost(string $titlePost): self
    {
        $this->titlePost = $titlePost;

        return $this;
    }

    public function getDescriptionPost(): ?string
    {
        return $this->descriptionPost;
    }

    public function setDescriptionPost(string $descriptionPost): self
    {
        $this->descriptionPost = $descriptionPost;

        return $this;
    }

    public function getAnnouncer(): ?string
    {
        return $this->announcer;
    }

    public function setAnnouncer(string $announcer): self
    {
        $this->announcer = $announcer;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->dateEvent;
    }

    public function setDateEvent(\DateTimeInterface $dateEvent): self
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    public function getPlaceEvent(): ?string
    {
        return $this->placeEvent;
    }

    public function setPlaceEvent(string $placeEvent): self
    {
        $this->placeEvent = $placeEvent;

        return $this;
    }

    public function getPostType(): ?string
    {
        return $this->postType;
    }

    public function setPostType(string $postType): self
    {
        $this->postType = $postType;

        return $this;
    }
    public function getUsers(): ?string
    {
        return $this->users;
    }

    public function setUsers(string $users): self
    {
        $this->users = $users;

        return $this;
    }
    /**
    * @return Collection|Theme[]
    */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $themes): self
    {
        if (!$this->themes->contains($themes)) {
            $this->themes[] = $themes;
            $themes->setTheme($this);
        }

        return $this;
    }

    public function removeTheme(Theme $themes): self
    {
        if ($this->themes->contains($themes)) {
            $this->themes->removeElement($themes);
            // set the owning side to null (unless already changed)
            if ($theme->getPost() === $this) {
                $theme->setPost(null);
            }
        }

        return $this;
    }


}
