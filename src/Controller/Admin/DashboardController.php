<?php
namespace Bakkerij\CakeAdmin\Controller\Admin;

use Bakkerij\CakeAdmin\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use \Cake\Event\Event;

/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController
{
  public function beforeRender(Event $event) {
    parent::beforeRender($event);
    $this->viewBuilder()->layout('admin');
  }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

    }

}
