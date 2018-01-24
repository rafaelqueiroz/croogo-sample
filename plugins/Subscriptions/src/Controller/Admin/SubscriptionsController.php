<?php
namespace Subscriptions\Controller\Admin;

use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * Subscriptions Controller
 *
 * @property \Subscriptions\Model\Table\SubscriptionsTable $Subscriptions
 *
 * @method \Subscriptions\Model\Entity\Subscription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionsController extends CroogoController
{


    public function implementedEvents()
    {
        return parent::implementedEvents() + [
            'Crud.beforeFind' => 'beforeCrudFind',
        ];
    }

    public function beforeCrudFind(\Cake\Event\Event $event)
    {
        /** @var \Cake\ORM\Query $query */
        $query = $event->subject()->query;
        $query->contain([
            'Plans'
        ]);
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);
        return $this->Crud->execute();
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        return $this->Crud->execute();
    }

}
