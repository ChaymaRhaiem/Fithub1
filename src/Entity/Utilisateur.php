<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Merci de taper votre nom")]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Merci de taper votre prenom")]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(message:"***@***.***")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Merci de taper votre mot de passe")]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Merci de choisir votre role")]
    private ?string $role = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message:"Merci de taper votre poids")]
    private ?int $poids = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message:"Merci de taper votre taille")]
    private ?float $taille = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message:"Merci de taper votre telephone")]
    private ?int $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(message:"Merci de taper votre specialite")]
    private ?string $specialite = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(message:"Merci de taper le nombre d'annee d'experience")]
    private ?string $experience = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(message:"Merci de taper votre adresse")]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Assert\NotBlank(message:"Merci d'entrer votre date de naissance")]
    private ?\DateTimeInterface $date_de_naissance = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Merci de choisir votre genre")]
    private ?string $genre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $token = null;

    #[ORM\ManyToMany(targetEntity: Consultation::class, mappedBy: 'utilisateurs')]
    private Collection $consultations;

    #[ORM\ManyToMany(targetEntity: Fiche::class, mappedBy: 'utilisateurs')]
    private Collection $fiches;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Participation::class)]
    private Collection $participations;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Ticket::class)]
    private Collection $tickets;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: ParticipationEvent::class)]
    private Collection $participationEvents;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    private ?Abonnement $abonnement = null;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
        $this->fiches = new ArrayCollection();
        $this->participations = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->tickets = new ArrayCollection();
        $this->participationEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(?int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(?float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(?string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations->add($consultation);
            $consultation->addUtilisateur($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            $consultation->removeUtilisateur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Fiche>
     */
    public function getFiches(): Collection
    {
        return $this->fiches;
    }

    public function addFich(Fiche $fich): self
    {
        if (!$this->fiches->contains($fich)) {
            $this->fiches->add($fich);
            $fich->addUtilisateur($this);
        }

        return $this;
    }

    public function removeFich(Fiche $fich): self
    {
        if ($this->fiches->removeElement($fich)) {
            $fich->removeUtilisateur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Participation>
     */
    public function getParticipations(): Collection
    {
        return $this->participations;
    }

    public function addParticipation(Participation $participation): self
    {
        if (!$this->participations->contains($participation)) {
            $this->participations->add($participation);
            $participation->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->participations->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getUtilisateurs() === $this) {
                $participation->setUtilisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUtilisateurs() === $this) {
                $commentaire->setUtilisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ticket>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);
            $ticket->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getUtilisateurs() === $this) {
                $ticket->setUtilisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ParticipationEvent>
     */
    public function getParticipationEvents(): Collection
    {
        return $this->participationEvents;
    }

    public function addParticipationEvent(ParticipationEvent $participationEvent): self
    {
        if (!$this->participationEvents->contains($participationEvent)) {
            $this->participationEvents->add($participationEvent);
            $participationEvent->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeParticipationEvent(ParticipationEvent $participationEvent): self
    {
        if ($this->participationEvents->removeElement($participationEvent)) {
            // set the owning side to null (unless already changed)
            if ($participationEvent->getUtilisateurs() === $this) {
                $participationEvent->setUtilisateurs(null);
            }
        }

        return $this;
    }

    public function getAbonnement(): ?Abonnement
    {
        return $this->abonnement;
    }

    public function setAbonnement(?Abonnement $abonnement): self
    {
        $this->abonnement = $abonnement;

        return $this;
    }
}
