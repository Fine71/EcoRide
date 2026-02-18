<?php

namespace App\Entity;

use App\Repository\ConfigurationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfigurationRepository::class)]
class Configuration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Parametre>
     */
    #[ORM\ManyToMany(targetEntity: Parametre::class, inversedBy: 'configurations')]
    private Collection $parametre;

    public function __construct()
    {
        $this->parametre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Parametre>
     */
    public function getParametre(): Collection
    {
        return $this->parametre;
    }

    public function addParametre(Parametre $parametre): static
    {
        if (!$this->parametre->contains($parametre)) {
            $this->parametre->add($parametre);
        }

        return $this;
    }

    public function removeParametre(Parametre $parametre): static
    {
        $this->parametre->removeElement($parametre);

        return $this;
    }
}
