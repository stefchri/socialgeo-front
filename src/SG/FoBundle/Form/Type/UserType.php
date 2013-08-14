<?php

namespace SG\FoBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function getName() {
        return 'Register';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('userFirstname', 'text', array(
                    'label' => 'Firstname:',
                ))
                ->add('userSurname', 'text', array(
                    'label' => 'Surname:',
                ))
                ->add('userUsername' , 'text', array(
                    'label' => 'Username:',
                ))
                ->add('userPassword' , 'password', array(
                    'label' => 'Password:',
                ))
                ->add('userEmail' , 'email', array(
                    'label' => 'Email:',
                ))
                ->add('userSecurityquestion' , 'text', array(
                    'label' => 'Security Question:',
                ))
                ->add('userSecurityanswer' , 'text', array(
                    'label' => 'Security Answer:',
                ))
                ->add('userAvatarurl' , 'text', array(
                    'label' => 'Avatar:',
                ))
                ->add('userHomeaddress' , new \SG\FoBundle\Form\Type\AddressType(), array(
                    'label' => 'Address:',
                ))
                
        ;
    }

}

