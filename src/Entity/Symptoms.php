<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SymptomsRepository")
 */
class Symptoms
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Area", inversedBy="symptoms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $FK_Area;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Disease", mappedBy="RelationWithSymptoms")
     */
    private $diseases;

    public function __construct()
    {
        $this->diseases = new ArrayCollection();
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

    public function getFKArea(): ?Area
    {
        return $this->FK_Area;
    }

    public function setFKArea(?Area $FK_Area): self
    {
        $this->FK_Area = $FK_Area;

        return $this;
    }

    /**
     * @return Collection|Disease[]
     */
    public function getDiseases(): Collection
    {
        return $this->diseases;
    }

    public function addDisease(Disease $disease): self
    {
        if (!$this->diseases->contains($disease)) {
            $this->diseases[] = $disease;
            $disease->addRelationWithSymptom($this);
        }

        return $this;
    }

    public function removeDisease(Disease $disease): self
    {
        if ($this->diseases->contains($disease)) {
            $this->diseases->removeElement($disease);
            $disease->removeRelationWithSymptom($this);
        }

        return $this;
    }
}
