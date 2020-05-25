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
	 * @ORM\Column(type="string", length=200)
	 */
	private $title;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $description;

	/**
	 * @ORM\Column(type="text", length=255)
	 */
	private $content;

	/**
	 * @ORM\Column(type="integer", length=255, nullable=true)
	 * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="annonces")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $author;

	/**
	 * @Assert\DateTime
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $datePost;

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

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}

	public function getDatePost(): ?\DateInterval
	{
		return $this->datePost;
	}

	public function setDatePost(?\DateInterval $datePost): self
	{
		$this->datePost = $datePost;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent($content): void
	{
		$this->content = $content;
	}

	public function getAuthor(): ?User
	{
		return $this->author;
	}
	public function setAuthor(?User $author): self
	{
		$this->author = $author;
		return $this;
	}
}
