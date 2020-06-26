<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $placeEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postType;

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
}
