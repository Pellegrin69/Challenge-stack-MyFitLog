<?php

namespace App\Entity;

use App\Repository\DatasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatasRepository::class)]
class Datas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'datas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $_user = null;


    #[ORM\Column]
    private ?float $value = null;

    #[ORM\ManyToOne(inversedBy: 'datas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataTypes $data_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->_user;
    }

    public function setUser(?Users $_user): self
    {
        $this->_user = $_user;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDataType(): ?DataTypes
    {
        return $this->data_type;
    }

    public function setDataType(?DataTypes $data_type): self
    {
        $this->data_type = $data_type;

        return $this;
    }
}
