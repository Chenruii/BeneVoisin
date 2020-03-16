<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="theme")
     */
    private $descriptionPost;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DatePost", mappedBy="theme")
     */
    private $datePost;

    public function __construct()
    {
        $this->descriptionPost = new ArrayCollection();
        $this->datePost = new ArrayCollection();
    }

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getDescriptionPost(): Collection
    {
        return $this->descriptionPost;
    }

    public function addDescriptionPost(Post $descriptionPost): self
    {
        if (!$this->descriptionPost->contains($descriptionPost)) {
            $this->descriptionPost[] = $descriptionPost;
            $descriptionPost->setTheme($this);
        }

        return $this;
    }

    public function removeDescriptionPost(Post $descriptionPost): self
    {
        if ($this->descriptionPost->contains($descriptionPost)) {
            $this->descriptionPost->removeElement($descriptionPost);
            // set the owning side to null (unless already changed)
            if ($descriptionPost->getTheme() === $this) {
                $descriptionPost->setTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DatePost[]
     */
    public function getDatePost(): Collection
    {
        return $this->datePost;
    }

    public function addDatePost(DatePost $datePost): self
    {
        if (!$this->datePost->contains($datePost)) {
            $this->datePost[] = $datePost;
            $datePost->setTheme($this);
        }

        return $this;
    }

    public function removeDatePost(DatePost $datePost): self
    {
        if ($this->datePost->contains($datePost)) {
            $this->datePost->removeElement($datePost);
            // set the owning side to null (unless already changed)
            if ($datePost->getTheme() === $this) {
                $datePost->setTheme(null);
            }
        }

        return $this;
    }
}
