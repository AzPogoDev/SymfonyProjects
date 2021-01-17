<?php

namespace App\Entity;

use App\Repository\ProjectsEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;


/**
 * @ORM\Entity(repositoryClass=ProjectsEntityRepository::class)
 */
class ProjectsEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Date;

    public function getSlug():string
    {
        return  (new Slugify())->slugify($this->titre);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLieux(): ?string
    {
        return $this->Lieux;
    }

    public function setLieux(string $Lieux): self
    {
        $this->Lieux = $Lieux;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->Date;
    }

    public function setDate(string $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

}
