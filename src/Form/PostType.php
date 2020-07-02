<?php

namespace App\Form;


use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titlePost',TextType::class, array(
            	'label'=> 'Titre'
			))
            ->add('descriptionPost',TextareaType::class, array(
				'label'=> 'Description'
			))
            ->add('announcer',TextType::class, array(
				'label'=> 'Annonceur'
			))
            ->add('dateEvent',DateType::class, [
            	'placeholder' => ['day' => 'jour', 'month' => 'mois', 'year' => 'année'],
				'label' => 'Date de l annonce' ])
			->add('contact', EmailType::class, array(
				'label' => 'Email de contact'
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
