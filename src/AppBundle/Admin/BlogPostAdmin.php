<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Show\ShowMapper;

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
            //->add('category',  'sonata_type_model_list', array())
            ->add('category', 'sonata_type_model_autocomplete', array(
                    'class' => 'AppBundle\Entity\Category',
                    'property' => 'name',
                    'required' => true
                ))
//                ->add('category', 'sonata_type_model', array(
//                    'class' => 'AppBundle\Entity\Category',
//                    'property' => 'name',
//                ))
            ->end()
        ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category.name')
            //->add('category', null, array(
            //  'associated_property'  => 'name'
            //), 'entity', array(
            //    'class'    => 'AppBundle\Entity\Category',
            //    'choice_label' => 'name', // In Symfony2: 'property' => 'name'
            //))
            ->add('draft')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category', 'doctrine_orm_model_autocomplete', array('label' => 'AutoComplete'), null, array(
            // in related CategoryAdmin there must be datagrid filter on `title` field to make the autocompletion work
                'class'    => 'AppBundle\Entity\Category',
                'property'=>'name',
            ))
            //->add('category', null, array( ), 'entity', array(
            //    'class'    => 'AppBundle\Entity\Category',
            //    'choice_label' => 'name', // In Symfony2: 'property' => 'name'
            //))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
             ->add('id')
             ->add('title')
         ;
    }

    public function toString($object)
    {
        return $object instanceof \AppBundle\Entity\BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
}
