<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->tab('Post')
            ->with('Content', array('class' => 'col-md-9'))
                ->add('title', 'text')
                ->add('body', 'textarea')
            ->end()
        ->end()
        ->tab('Pudlish Options')
            ->with('Meta data', array('class' => 'col-md-3'))
                ->add('category', 'sonata_type_model', array(
                    'class' => 'AppBundle\Entity\Category',
                    'property' => 'name',
                ))
            ->end()
        ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        // ... configure $listMapper
    }
}
