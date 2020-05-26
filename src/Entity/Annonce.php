<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="le titre ne doit pas être vide")
     * @Assert\Length(
     *   max=200,
     *   maxMessage="le titre ne doit pas dépasser 200 caractères"
     * )
     * @ORM\Column(type="string", length=200)
     */
    private $title;

    /**
     * @Assert\NotBlank(message="le contenu ne doit pas être vide")
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * Get id
     * @ORM\Column(type="string", length=20,nullable=true)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonce")
     */
    private $annonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getAnnonce(): ?User
    {
        return $this->annonce;
    }

    public function setAnnonce(?User $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }
}
