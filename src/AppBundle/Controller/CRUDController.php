<?php
namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CRUDController extends BaseController
{

    function __construnct() {
      $this->configure();
    }

    protected function redirectTo($object)
    {
        $request = $this->getRequest();
        $response = parent::redirectTo($object, $request);

        if (null !== $request->get('btn_update_and_list') || null !== $request->get('btn_create_and_list')) {
            $url = $this->admin->generateUrl('list');

            $last_list = $this->get('session')->get('last_list');

            if(strstr($last_list['uri'], $url) && !empty($last_list['filters'])) {
                $response = new RedirectResponse($this->admin->generateUrl(
                    'list',
                    array('filter' => $last_list['filters'])
                ));
            }
        }

        return $response;
    }

    public function listAction()
    {
        $request = $this->getRequest();
        $uri_parts = explode('?', $request->getUri(), 2);
        $filters = $this->admin->getFilterParameters();
        print_r($uri_parts);
        $this->get('session')->set('last_list', array('uri' => $uri_parts[0], 'filters' => $filters));

        $response = parent::listAction($request);

        return $response;
    }
}
