<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,array('label'=>'Name','attr'=>array('class'=>"form-control",'placeholder'=>'Someone')))
            ->add('mobile', TextType::class,array('label'=>'Mobile','attr'=>array('class'=>"form-control",'placeholder'=>'99999999999')))
            ->add('email', EmailType::class,array('label'=>'Email','attr'=>array('class'=>"form-control",'placeholder'=>'Someone@someone')))
            ->add('submit', SubmitType::class,array('attr'=>array('class'=>"waves-effect waves-light btn blue center",'style' =>'margin-top: 13px;')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
