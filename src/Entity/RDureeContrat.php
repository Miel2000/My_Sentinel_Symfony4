<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RDureeContrat
 *
 * @ORM\Table(name="r_duree_contrat")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\RDureeContratRepository")
 */
class RDureeContrat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_contrat", type="string", length=255, nullable=true)
     */
    private $typeContrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }


}
