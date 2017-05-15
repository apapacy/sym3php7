<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureSideMenu(\Knp\Menu\ItemInterface $menu, $action, \Sonata\AdminBundle\Admin\AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit'))) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this; // ????????????????????

        $id = $admin->getRequest()->get('id');

        $menu->addChild(
                'Voir/Editer',
                array('uri' => $admin->generateUrl('edit', array('id' => $id)))
            );

        $menu->addChild(
                'Services',
                array('uri' => $admin->generateUrl('admin.blog_post.list', array('id' => $id)))
            );
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }

    public function toString($object)
    {
        return $object instanceof \AppBundle\Entity\Category
            ? $object->getName()
            : 'Category'; // shown in the breadcrumb on the create view
    }
}
