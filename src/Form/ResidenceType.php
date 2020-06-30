<?php

namespace App\Form;

use App\Entity\Residence;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResidenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trackNumber',TextType::class)
            ->add('track',TextType::class)
            ->add('hall',TextType::class)
            ->add('city',TextType::class)
            ->add('zipCode',TextType::class)
            ->add('zipCode',TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Residence::class,
        ]);
    }
}
