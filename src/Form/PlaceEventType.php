<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\PlaceEvent;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('districtPlaceEvent',TextType::class)
            ->add('labelPlaceEvent',TextType::class)
            ->add('cityPlaceEvent',TextType::class)
            ->add('zipCodePlaceEvent',TextType::class)
            ->add('countryPlaceEvent',CountryType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlaceEvent::class,
        ]);
    }
}
