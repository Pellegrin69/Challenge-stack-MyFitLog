<?php

namespace App\Entity;

use App\Repository\DataTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataTypesRepository::class)]
class DataTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'dataTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $category = null;

    #[ORM\ManyToOne(inversedBy: 'dataTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Units $unit = null;

    #[ORM\OneToMany(mappedBy: 'data_type', targetEntity: Datas::class)]
    private Collection $datas;

    #[ORM\OneToMany(mappedBy: 'data_type', targetEntity: Goals::class)]
    private Collection $goals;

    public function __construct()
    {
        $this->datas = new ArrayCollection();
        $this->goals = new ArrayCollection();
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

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUnit(): ?Units
    {
        return $this->unit;
    }

    public function setUnit(?Units $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return Collection<int, Datas>
     */
    public function getDatas(): Collection
    {
        return $this->datas;
    }

    public function addData(Datas $data): self
    {
        if (!$this->datas->contains($data)) {
            $this->datas->add($data);
            $data->setDataType($this);
        }

        return $this;
    }

    public function removeData(Datas $data): self
    {
        if ($this->datas->removeElement($data)) {
            // set the owning side to null (unless already changed)
            if ($data->getDataType() === $this) {
                $data->setDataType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Goals>
     */
    public function getGoals(): Collection
    {
        return $this->goals;
    }

    public function addGoal(Goals $goal): self
    {
        if (!$this->goals->contains($goal)) {
            $this->goals->add($goal);
            $goal->setDataType($this);
        }

        return $this;
    }

    public function removeGoal(Goals $goal): self
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getDataType() === $this) {
                $goal->setDataType(null);
            }
        }

        return $this;
    }
}
