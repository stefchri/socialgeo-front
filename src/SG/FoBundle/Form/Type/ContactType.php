<?php
namespace SG\FoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType {
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('gender', new GenderType(), array(
                     'expanded' => true,
                     'label' => 'Gender:',
                ))
                ->add('subject', 'text', array(
                    'label' => 'Subject:',
                ))
                ->add('message', 'textarea', array(
                    'label' => 'Message:',
                ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contact';
    }
}
?>