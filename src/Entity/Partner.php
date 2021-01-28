<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartnerRepository::class)
 * @Vich\Uploadable
 */
class Partner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private ?string $icon = "";

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ")
     * @Vich\UploadableField(mapping="partner_icon", fileNameProperty="icon")
     */
    private ?File $partnerIcon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      maxMessage="Ce champ doit faire maximum {{ limit }} caractères",
     *      minMessage="Ce champ doit faire miminum {{ limit }} caractères",
     * )
     */
    private ?string $link;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getPartnerIcon(): ?File
    {
        return $this->partnerIcon;
    }

    public function setPartnerIcon(?File $partnerIcon): self
    {
        $this->partnerIcon = $partnerIcon;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
