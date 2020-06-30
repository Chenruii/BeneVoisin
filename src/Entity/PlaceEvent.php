<?php

namespace App\Entity;

use App\Repository\PlaceEventRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass=PlaceEventRepository::class)
 */
class PlaceEvent
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
    private $districtPlaceEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $labelPlaceEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityPlaceEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zipCodePlaceEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $countryPlaceEvent;

    /**
     * @ORM\Column(type="string", length=255)
     * @ManyToOne(targetEntity="Post", inversedBy="placeEvent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDistrictPlaceEvent(): ?string
    {
        return $this->districtPlaceEvent;
    }

    public function setDistrictPlaceEvent(string $districtPlaceEvent): self
    {
        $this->districtPlaceEvent = $districtPlaceEvent;

        return $this;
    }

    public function getLabelPlaceEvent(): ?string
    {
        return $this->labelPlaceEvent;
    }

    public function setLabelPlaceEvent(string $labelPlaceEvent): self
    {
        $this->labelPlaceEvent = $labelPlaceEvent;

        return $this;
    }

    public function getCityPlaceEvent(): ?string
    {
        return $this->cityPlaceEvent;
    }

    public function setCityPlaceEvent(string $cityPlaceEvent): self
    {
        $this->cityPlaceEvent = $cityPlaceEvent;

        return $this;
    }

    public function getZipCodePlaceEvent(): ?string
    {
        return $this->zipCodePlaceEvent;
    }

    public function setZipCodePlaceEvent(string $zipCodePlaceEvent): self
    {
        $this->zipCodePlaceEvent = $zipCodePlaceEvent;

        return $this;
    }

    public function getCountryPlaceEvent(): ?string
    {
        return $this->countryPlaceEvent;
    }

    public function setCountryPlaceEvent(string $countryPlaceEvent): self
    {
        $this->countryPlaceEvent = $countryPlaceEvent;

        return $this;
    }
}
