<?php

namespace App\Entity;

use App\Repository\ResidenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResidenceRepository::class)
 */
class Residence
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
    private $trackNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $track;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hall;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $zipCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrackNumber(): ?string
    {
        return $this->trackNumber;
    }

    public function setTrackNumber(string $trackNumber): self
    {
        $this->trackNumber = $trackNumber;

        return $this;
    }

    public function getTrack(): ?string
    {
        return $this->track;
    }

    public function setTrack(string $track): self
    {
        $this->track = $track;

        return $this;
    }

    public function getHall(): ?string
    {
        return $this->hall;
    }

    public function setHall(?string $hall): self
    {
        $this->hall = $hall;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }
}
