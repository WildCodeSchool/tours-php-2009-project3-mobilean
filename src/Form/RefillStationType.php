<?php

namespace App\Form;

use App\Entity\RefillStation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RefillStationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la borne : ',
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description de la borne : ',
            ])

            ->add('debit', IntegerType::class, [
                'label' => 'Débit de la borne : ',
                'required' => false,
            ])

            ->add('installation', ChoiceType::class, [
                'choices' => [
                    'Intérieure' => 'Intérieure',
                    'Extérieure' => 'Extérieure',
                    'Intérieure et Extérieure' => 'Intérieure et Extérieure'
                ],
                'label' => 'Choix de l\'installation : ',
                'expanded' => true,
                'required' => false,
            ])

            ->add('refillTime', IntegerType::class, [
                'label' => 'Temps de recharge : ',
                'required' => false,
            ])

            ->add('additionalStorage', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => 'Stockage supplémentaire? ',
                'expanded' => true,
                'required' => false,
            ])

            ->add('chargingStationPhoto', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'download_uri' => false,
                'label' => 'Image'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RefillStation::class,
        ]);
    }
}
