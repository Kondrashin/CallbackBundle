<?php
namespace CallbackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

/**
 * Класс формирования формы обратной связи
 */
class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                    'label' => 'name',
                    'attr' => array(
                        'minlength' => 2,
                        'maxlength' => 50,
                        'ng-model' => 'name'
                    )
                )
            )
            ->add('email', EmailType::class, array(
                    'label' => 'email',
                    'attr' => array(
                        'minlength' => 5,
                        'maxlength' => 50,
                        'ng-model' => 'email'
                    )
                )
            )
            ->add('comment', TextType::class, array(
                    'label' => 'comment',
                    'attr' => array(
                        'minlength' => 5,
                        'maxlength' => 250,
                        'ng-model' => 'comment'
                    )
                )
            )
            ->add('submit', SubmitType::class, array(
                'label' => 'send'
                ));
    }
}