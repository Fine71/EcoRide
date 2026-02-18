<?php

namespace App\Form;

use App\Entity\Covoiturage;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchCovoiturageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lieu_depart', TextType::class, [
                'required' => false,
                'label'=> 'Lieu de départ',
            ])
            ->add('Lieu_arrivee', TextType::class, [
                'required' => false,
                'label'=> 'Lieu d\'arrivée',
            ])
            ->add('date_depart', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'label'=> 'Date de départ',
            ])
            ->add('recherche', SubmitType::class, [
                'label' => 'Rechercher',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Covoiturage::class,
        ]);
    }
}
