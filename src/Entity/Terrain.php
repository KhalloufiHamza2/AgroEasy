<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\IntegerType ;
#[ORM\Entity(repositoryClass: TerrainRepository::class)]
class Terrain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\NotBlank(message:"ce champ est obligatoire")]
    #[Assert\Type(
        type: 'integer',
        message: 'le numero {{ value }} n est pas valide {{ type }}.',)]
    #[Assert\Positive]
    #[ORM\Column]
    private ?int $numero = null;
   #[Assert\Positive(message:"ce champ doit etre positive")]
   #[Assert\NotBlank(message:"ce champ est obligatoire")]
    #[Assert\Type(
        type: 'integer',
        message: 'la surface{{ value }} nest pas valide {{ type }}.',)]
    #[ORM\Column]
    private ?int $surface = null;
    #[Assert\NotBlank(message:"ce champ est obligatoire")]
    #[Assert\Length(
        min: 4,
        max: 10,
        minMessage: 'donner le lieu au moins {{ limit }} caractères ',
        maxMessage: 'donner le lieu maximum {{ limit }} caractères',)]
        #[Assert\Type(
            type: 'string',
            message: 'le lieu {{ value }} n est pas valide {{ type }}.',)]
    #[ORM\Column(length: 255)]
    private ?string $lieu = null;
    #[Assert\NotBlank(message:"ce champ est obligatoire")]
    #[ORM\ManyToOne(inversedBy: 'terrain')]
    private ?Culture $culture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCulture(): ?Culture
    {
        return $this->culture;
    }

    public function setCulture(?Culture $culture): self
    {
        $this->culture = $culture;

        return $this;
    }

    
}
