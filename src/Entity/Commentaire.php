<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_Commentaire = null;

    #[ORM\Column(length: 255)]
    private ?string $description_Commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Article $articles = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Utilisateur $utilisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->date_Commentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $date_Commentaire): self
    {
        $this->date_Commentaire = $date_Commentaire;

        return $this;
    }

    public function getDescriptionCommentaire(): ?string
    {
        return $this->description_Commentaire;
    }

    public function setDescriptionCommentaire(string $description_Commentaire): self
    {
        $this->description_Commentaire = $description_Commentaire;

        return $this;
    }

    public function getArticles(): ?Article
    {
        return $this->articles;
    }

    public function setArticles(?Article $articles): self
    {
        $this->articles = $articles;

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
