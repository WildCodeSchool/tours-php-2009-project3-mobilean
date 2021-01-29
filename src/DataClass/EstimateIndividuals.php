<?php

namespace App\DataClass;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data Class for EstimateIndividualsType
 */
class EstimateIndividuals
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
    private string $firstName;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private string $lastName;

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
     * @Assert\Type(type="bool")
     */
    private bool $isConnectedToGas;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Positive(message="Veuillez renseigner un nombre positif")
     */
    private int $numberOfVehicles;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Count(
     *      min=1,
     *      max=2,
     *      minMessage="Veuillez selectionner au moins {{ limit }} option",
     *      maxMessage="Veuillez selectionner au plus {{ limit }} options",
     * )
     * @Assert\Collection(
     *      fields={
     *          "0"=@Assert\Choice({"commercialVehicles", "tourismVehicles"}),
     *          "1"=@Assert\Choice({"tourismVehicles", "commercialVehicles"})
     *      },
     *      allowMissingFields = true
     * )
     * @var string[]
     */
    private array $typeOfVehicles;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Positive(message="Veuillez renseigner un nombre positif")
     */
    private int $averageDistance;

    /**
     * @Assert\Length(max=2000, maxMessage="Ce champ doit faire maximum {{ limit }} caractères")
     */
    private ?string $message = null;

    /**
     * @Assert\Date()
     */
    private DateTime $submitDate;

    private string $type;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getIsConnectedToGas(): ?bool
    {
        return $this->isConnectedToGas;
    }

    public function setIsConnectedToGas(bool $isConnectedToGas): self
    {
        $this->isConnectedToGas = $isConnectedToGas;

        return $this;
    }

    public function getNumberOfVehicles(): ?int
    {
        return $this->numberOfVehicles;
    }

    public function setNumberOfVehicles(int $numberOfVehicles): self
    {
        $this->numberOfVehicles = $numberOfVehicles;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTypeOfVehicles(): ?array
    {
        return $this->typeOfVehicles;
    }

    /**
     * @param array{string} $typeOfVehicles
     */
    public function setTypeOfVehicles(array $typeOfVehicles): self
    {
        $this->typeOfVehicles = $typeOfVehicles;

        return $this;
    }

    public function getAverageDistance(): ?int
    {
        return $this->averageDistance;
    }

    public function setAverageDistance(int $averageDistance): self
    {
        $this->averageDistance = $averageDistance;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSubmitDate(): ?DateTime
    {
        return $this->submitDate;
    }

    public function setSubmitDate(DateTime $submitDate): self
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
