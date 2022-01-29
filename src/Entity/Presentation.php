<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PresentationRepository::class)]
class Presentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $title2;

    #[ORM\Column(type: 'text')]
    private $content1;

    #[ORM\Column(type: 'text', nullable: true)]
    private $content2;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private $headline1;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private $headline2;

    #[ORM\Column(type: 'string', length: 255)]
    private $image1;

    #[ORM\Column(type: 'string', length: 255)]
    private $image2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle1(): ?string
    {
        return $this->title1;
    }

    public function setTitle1(string $title1): self
    {
        $this->title1 = $title1;

        return $this;
    }

    public function getTitle2(): ?string
    {
        return $this->title2;
    }

    public function setTitle2(?string $title2): self
    {
        $this->title2 = $title2;

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

    public function getContent2(): ?string
    {
        return $this->content2;
    }

    public function setContent2(?string $content2): self
    {
        $this->content2 = $content2;

        return $this;
    }

    public function getHeadline1(): ?string
    {
        return $this->headline1;
    }

    public function setHeadline1(?string $headline1): self
    {
        $this->headline1 = $headline1;

        return $this;
    }

    public function getHeadline2(): ?string
    {
        return $this->headline2;
    }

    public function setHeadline2(?string $headline2): self
    {
        $this->headline2 = $headline2;

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

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): self
    {
        $this->image4 = $image4;

        return $this;
    }
}
