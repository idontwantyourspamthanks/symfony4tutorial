<?php

namespace App\Entity;

use App\Repository\HorseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HorseRepository::class)
 */
class Horse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $legs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alive;

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

    public function getLegs(): ?int
    {
        return $this->legs;
    }

    public function setLegs(int $legs): self
    {
        $this->legs = $legs;

        return $this;
    }

    public function getAlive(): ?bool
    {
        return $this->alive;
    }

    public function setAlive(bool $alive): self
    {
        $this->alive = $alive;

        return $this;
    }
}
