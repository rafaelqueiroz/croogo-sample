<?php
namespace Subscriptions\Controller\Admin;

use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * Plans Controller
 *
 * @property \Subscriptions\Model\Table\PlansTable $Plans
 *
 * @method \Subscriptions\Model\Entity\Plan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlansController extends CroogoController
{

    public $modelClass = 'Subscriptions.Plans';

    public function initialize()
    {
        parent::initialize();

        $this->_setupPrg();

        $this->Crud->config('actions.index', [
            'displayFields' => $this->Plans->displayFields(),
            'searchFields' => ['name']
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

    /**
     * Add method
     */
    public function add()
    {
        return $this->Crud->execute();
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        return $this->Crud->execute();
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        return $this->Crud->execute();
    }

}
