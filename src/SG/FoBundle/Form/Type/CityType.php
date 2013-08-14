<?php
namespace SG\FoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CityType extends AbstractType {
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cityName', 'text', array(
                    'label' => 'Name:',
                ))
                ->add('cityDescription', 'text', array(
                    'label' => 'Description:',
                ))
                ->add('cityPostcode' , 'text',  array(
                    'attr' => array(
                        'maxlength' => 4,
                    ),
                    'label' => 'Zip Code:',
                ))
                ->add('country' , new CountryType(), array(
                    'label' => 'Country:',
                ))
        ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'City';
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SG\FoBundle\Entity\Cities',
        ));
    }
}
?>