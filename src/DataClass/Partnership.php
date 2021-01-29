<?php

namespace App\DataClass;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Class for PartnerType
 */
class Partnership
{
    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $businessName;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Regex(
     *      pattern="/\b(?:Installation|Maintenance|Autre|Aucune)\b/",
     *      message="Veuillez rensigner une option valide",
     * )
     */
    private string $expertise;

    /**
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private ?string $otherExpertise = 'Autre';

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Regex(
     *      pattern="/^[0-9]+$/",
     *      message="Ce champ ne peut contenir que des chiffres (0 - 9)",
     * )
     * @Assert\Length(
     *      min=9,
     *      max=9,
     *      exactMessage="Ce champ doit faire exactement {{ limit }} caractères",
     * )
     */
    private string $numberSIREN;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $fullName;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $jobTitle;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Regex(
     *      pattern="/^[0-9]+$/",
     *      message="Ce champ ne peut contenir que des chiffres (0 - 9)",
     * )
     * @Assert\Length(
     *      min=10,
     *      max=10,
     *      exactMessage="Ce champ doit faire exactement {{ limit }} caractères",
     * )
     */
    private string $telephone;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Email(message="Veuillez entrer une adresse email valide")
     */
    private string $email;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=5,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $address;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Regex(
     *      pattern="/^[0-9]+$/",
     *      message="Ce champ ne peut contenir que des chiffres (0 - 9)",
     * )
     * @Assert\Length(
     *      min=5,
     *      max=5,
     *      exactMessage="Ce champ doit faire exactement {{ limit }} caractères",
     * )
     */
    private string $zipCode;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=1,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $city;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Positive(message="Veuillez renseigner un nombre positif")
     */
    private int $workforce;

    /**
     * @Assert\Length(max=2000, maxMessage="Ce champ doit faire maximum 2000 caractères")
     */
    private ?string $message = null;

    /**
     * @Assert\Date()
     */
    private DateTime $submitDate;

    private string $type;

    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    public function setBusinessName(string $businessName): self
    {
        $this->businessName = $businessName;

        return $this;
    }

    public function getExpertise(): ?string
    {
        return $this->expertise;
    }

    public function setExpertise(string $expertise): self
    {
        $this->expertise = $expertise;

        return $this;
    }

    public function getOtherExpertise(): ?string
    {
        return $this->otherExpertise;
    }

    public function setOtherExpertise(?string $otherExpertise): self
    {
        $this->otherExpertise = $otherExpertise;

        return $this;
    }

    public function getNumberSIREN(): ?string
    {
        return $this->numberSIREN;
    }

    public function setNumberSIREN(string $numberSIREN): self
    {
        $this->numberSIREN = $numberSIREN;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getWorkforce(): ?int
    {
        return $this->workforce;
    }

    public function setWorkforce(int $workforce): self
    {
        $this->workforce = $workforce;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSubmitDate(): ?DateTime
    {
        return $this->submitDate;
    }

    public function setsubmitDate(DateTime $submitDate): self
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
