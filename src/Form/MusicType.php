<?php

namespace App\Form;

use App\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('releaseDate',  DateTimeType::class, [
                "widget" => "single_text"
            ])
            ->add('artists')
            ->add('cover', FileType::class, [
                'label' => "Votre cover",
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '8024k',
                        'mimeTypes' => [
                            'image/*'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image document',
                    ]),
                ],
                'data_class' => null,
            ])
            // ...
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
