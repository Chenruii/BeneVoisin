<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DatePostRepository")
 */
class DatePost
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\theme", inversedBy="datePost")
     */
    private $theme;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePostStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePostEnd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?theme
    {
        return $this->theme;
    }

    public function setTheme(?theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getDatePostStart(): ?\DateTimeInterface
    {
        return $this->datePostStart;
    }

    public function setDatePostStart(\DateTimeInterface $datePostStart): self
    {
        $this->datePostStart = $datePostStart;

        return $this;
    }

    public function getDatePostEnd(): ?\DateTimeInterface
    {
        return $this->datePostEnd;
    }

    public function setDatePostEnd(\DateTimeInterface $datePostEnd): self
    {
        $this->datePostEnd = $datePostEnd;

        return $this;
    }
}
