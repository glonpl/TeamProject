<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiseaseRepository")
 */
class Disease
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Name;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="integer")
     */
    private $Probability;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Symptoms", inversedBy="diseases")
     */
    private $RelationWithSymptoms;

    public function __construct()
    {
        $this->RelationWithSymptoms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    public function getProbability(): ?int
    {
        return $this->Probability;
    }

    public function setProbability(int $Probability): self
    {
        $this->Probability = $Probability;

        return $this;
    }

    /**
     * @return Collection|Symptoms[]
     */
    public function getRelationWithSymptoms(): Collection
    {
        return $this->RelationWithSymptoms;
    }

    public function addRelationWithSymptom(Symptoms $relationWithSymptom): self
    {
        if (!$this->RelationWithSymptoms->contains($relationWithSymptom)) {
            $this->RelationWithSymptoms[] = $relationWithSymptom;
        }

        return $this;
    }

    public function removeRelationWithSymptom(Symptoms $relationWithSymptom): self
    {
        if ($this->RelationWithSymptoms->contains($relationWithSymptom)) {
            $this->RelationWithSymptoms->removeElement($relationWithSymptom);
        }

        return $this;
    }
}
