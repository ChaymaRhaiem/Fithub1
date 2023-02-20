<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_service = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_participation = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?Seance $seances = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?Utilisateur $utilisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeService(): ?string
    {
        return $this->type_service;
    }

    public function setTypeService(string $type_service): self
    {
        $this->type_service = $type_service;

        return $this;
    }

    public function getDateParticipation(): ?\DateTimeInterface
    {
        return $this->date_participation;
    }

    public function setDateParticipation(\DateTimeInterface $date_participation): self
    {
        $this->date_participation = $date_participation;

        return $this;
    }

    public function getSeances(): ?Seance
    {
        return $this->seances;
    }

    public function setSeances(?Seance $seances): self
    {
        $this->seances = $seances;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateur
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(?Utilisateur $utilisateurs): self
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }
}
