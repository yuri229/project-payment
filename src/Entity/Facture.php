<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $numAbn;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $numPolice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numCompteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numFacture;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $factPeriod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $society;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAbn(): ?string
    {
        return $this->numAbn;
    }

    public function setNumAbn(string $numAbn): self
    {
        $this->numAbn = $numAbn;

        return $this;
    }

    public function getNumPolice(): ?string
    {
        return $this->numPolice;
    }

    public function setNumPolice(string $numPolice): self
    {
        $this->numPolice = $numPolice;

        return $this;
    }

    public function getCompteur(): ?string
    {
        return $this->compteur;
    }

    public function setCompteur(string $compteur): self
    {
        $this->compteur = $compteur;

        return $this;
    }

    public function getNumCompteur(): ?string
    {
        return $this->numCompteur;
    }

    public function setNumCompteur(string $numCompteur): self
    {
        $this->numCompteur = $numCompteur;

        return $this;
    }

    public function getNumFacture(): ?string
    {
        return $this->numFacture;
    }

    public function setNumFacture(string $numFacture): self
    {
        $this->numFacture = $numFacture;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFactPeriod(): ?\DateTimeInterface
    {
        return $this->factPeriod;
    }

    public function setFactPeriod(\DateTimeInterface $factPeriod): self
    {
        $this->factPeriod = $factPeriod;

        return $this;
    }

    public function getSociety(): ?string
    {
        return $this->society;
    }

    public function setSociety(string $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
}
