<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Please enter the availability of the ticket')]

    private ?bool $disponibilite = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Please enter the price of the ticket')]
    #[Assert\Positive(message: 'The price must be a positive integer')]

    private ?int $prix = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Please enter the maximum number of tickets')]
    #[Assert\Positive(message: 'The maximum number of tickets must be a positive integer')]
    private ?int $nombreMax = null;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    private ?Event $event = null;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    private ?Utilisateur $utilisateurs = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter your name')]
    #[Assert\Length(
        min: 4,
        max: 50,
        minMessage: 'Your name must be at least {{ limit }} characters long',
        maxMessage: 'Your name cannot be longer than {{ limit }} characters'
    )]

   private ?string $nom = null;

    #[ORM\Column(length:255)]
    #[Assert\NotBlank(message:"Please enter your email")]
    #[Assert\Email(message:"Please enter a valid email address")]
   private ?string $email = null;


    #[ORM\Column(type:"datetime")]
    
   private ?\DateTimeInterface $bookingDate = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function isDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNombreMax(): ?int
    {
        return $this->nombreMax;
    }

    public function setNombreMax(int $nombreMax): self
    {
        $this->nombreMax = $nombreMax;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBookingDate(): ?\DateTimeInterface
    {
        return $this->bookingDate;
    }

    public function setBookingDate(\DateTimeInterface $bookingDate): self
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }
    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
    
}
