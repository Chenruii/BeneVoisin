<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostTypeRepository")
 */
class PostType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isShare;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDiscover;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\post", mappedBy="post")
     */
    private $post;

    public function __construct()
    {
        $this->post = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsShare(): ?bool
    {
        return $this->isShare;
    }

    public function setIsShare(bool $isShare): self
    {
        $this->isShare = $isShare;

        return $this;
    }

    public function getIsDiscover(): ?bool
    {
        return $this->isDiscover;
    }

    public function setIsDiscover(bool $isDiscover): self
    {
        $this->isDiscover = $isDiscover;

        return $this;
    }

    /**
     * @return Collection|post[]
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    public function addPost(post $post): self
    {
        if (!$this->post->contains($post)) {
            $this->post[] = $post;
            $post->setPost($this);
        }

        return $this;
    }

    public function removePost(post $post): self
    {
        if ($this->post->contains($post)) {
            $this->post->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getPost() === $this) {
                $post->setPost(null);
            }
        }

        return $this;
    }
}
