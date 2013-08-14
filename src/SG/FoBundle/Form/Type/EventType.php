<?php
namespace SG\FoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EventType extends AbstractType {
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('eventName', 'text', array(
                    'label' => 'Name:',
                ))
                ->add('eventDescription', 'text', array(
                    'label' => 'Description:',
                ))
                ->add('eventStartdate', 'text', array(
                    'label' => 'Event starts:',
                ))
                ->add('eventEnddate', 'text', array(
                    'label' => 'Event ends:',
                ))
                ->add('eventPlusvotes', 'text', array(
                    'label' => '+ votes:',
                ))
                ->add('eventMinvotes', 'text', array(
                    'label' => '- votes:',
                ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Event';
    }
}
?>