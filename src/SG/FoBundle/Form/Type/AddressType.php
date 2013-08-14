<?php
namespace SG\FoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddressType extends AbstractType{
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('addressStreet', 'text', array(
                    'label' => 'Street:',
                ))
                ->add('addressHousenumber', 'text', array(
                    'label' => 'House number:',
                ))
                ->add('district' , new DistrictType(), array(
                    'label' => 'District:',
                ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Address';
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SG\FoBundle\Entity\Addresses',
        ));
    }
}
?>