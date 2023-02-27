<?php

namespace App\Entity;

use App\Repository\UnitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnitsRepository::class)]
class Units
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?float $coefficient = null;

    #[ORM\OneToMany(mappedBy: 'unit', targetEntity: DataTypes::class)]
    private Collection $dataTypes;


    public function __construct()
    {
        $this->dataTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(?float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * @return Collection<int, DataTypes>
     */
    public function getDataTypes(): Collection
    {
        return $this->dataTypes;
    }

    public function addDataType(DataTypes $dataType): self
    {
        if (!$this->dataTypes->contains($dataType)) {
            $this->dataTypes->add($dataType);
            $dataType->setUnit($this);
        }

        return $this;
    }

    public function removeDataType(DataTypes $dataType): self
    {
        if ($this->dataTypes->removeElement($dataType)) {
            // set the owning side to null (unless already changed)
            if ($dataType->getUnit() === $this) {
                $dataType->setUnit(null);
            }
        }

        return $this;
    }
}
