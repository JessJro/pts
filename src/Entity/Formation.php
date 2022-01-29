<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $content1;

    #[ORM\Column(type: 'string', length: 255)]
    private $image1;

    #[ORM\Column(type: 'text', nullable: true)]
    private $content2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image2;

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

    public function getContent1(): ?string
    {
        return $this->content1;
    }

    public function setContent1(string $content1): self
    {
        $this->content1 = $content1;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getContent2(): ?string
    {
        return $this->content2;
    }

    public function setContent2(?string $content2): self
    {
        $this->content2 = $content2;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }
}
