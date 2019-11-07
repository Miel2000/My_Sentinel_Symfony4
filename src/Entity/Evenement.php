<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="event_rdv", type="datetime", nullable=true)
     */
    private $eventRdv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="event_convocation", type="text", length=0, nullable=true)
     */
    private $eventConvocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="event_avertissement", type="text", length=0, nullable=true)
     */
    private $eventAvertissement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventRdv(): ?\DateTimeInterface
    {
        return $this->eventRdv;
    }

    public function setEventRdv(?\DateTimeInterface $eventRdv): self
    {
        $this->eventRdv = $eventRdv;

        return $this;
    }

    public function getEventConvocation(): ?string
    {
        return $this->eventConvocation;
    }

    public function setEventConvocation(?string $eventConvocation): self
    {
        $this->eventConvocation = $eventConvocation;

        return $this;
    }

    public function getEventAvertissement(): ?string
    {
        return $this->eventAvertissement;
    }

    public function setEventAvertissement(?string $eventAvertissement): self
    {
        $this->eventAvertissement = $eventAvertissement;

        return $this;
    }


}
