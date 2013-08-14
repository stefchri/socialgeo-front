<?php
namespace SG\FoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ArticleType extends AbstractType{
    
    public function getName() {
        return 'Article';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('articleTitle', 'text', array(
                    'label' => 'Street:',
                ))
                ->add('articleSynopsis', 'text', array(
                    'label' => 'Synopsis:',
                ))
                ->add('articleBody', 'textarea', array(
                    'label' => 'Body:',
                ))
                ->add('articleImageurl', 'text', array(
                    'label' => 'Imageurl:',
                ))
                ->add('articlePlusvotes', 'text', array(
                    'label' => 'Plusvotes:',
                ))
                ->add('articlePlusvotes', 'text', array(
                    'label' => 'Minvotes:',
                ))              
        ;
        
    }

}

?>
