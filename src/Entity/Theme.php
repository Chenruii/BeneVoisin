<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
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
     * @ORM\Column(type="string", length=150)
     */
    private $titleTheme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionTheme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleTheme(): ?string
    {
        return $this->titleTheme;
    }

    public function setTitleTheme(string $titleTheme): self
    {
        $this->titleTheme = $titleTheme;

        return $this;
    }

    public function getDescriptionTheme(): ?string
    {
        return $this->descriptionTheme;
    }

    public function setDescriptionTheme(string $descriptionTheme): self
    {
        $this->descriptionTheme = $descriptionTheme;

        return $this;
    }
}
