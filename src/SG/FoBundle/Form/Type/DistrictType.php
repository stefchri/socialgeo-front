<?php
namespace SG\FoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DistrictType extends AbstractType {
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('districtName', 'text', array(
                    'label' => 'Name:',
                ))
                ->add('districtDescription', 'text', array(
                    'label' => 'Description:',
                ))
                ->add('districtImageurl' , 'text',  array(
                    'label' => 'Image URL:',
                ))
                ->add('city' , new CityType(), array(
                    'label' => 'City:',
                ))
        ;
    }
    
    /***
     * 
     */
    public function getName()
    {
        return 'District';
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SG\FoBundle\Entity\Districts',
        ));
    }
}
?>