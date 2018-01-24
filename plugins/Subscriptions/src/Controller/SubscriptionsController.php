<?php
namespace Subscriptions\Controller;

use Subscriptions\Controller\AppController;

/**
 * Subscriptions Controller
 *
 * @property \Subscriptions\Model\Table\SubscriptionsTable $Subscriptions
 *
 * @method \Subscriptions\Model\Entity\Subscription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionsController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subscription = $this->Subscriptions->newEntity();
        if ($this->request->is('post')) {
            $subscription = $this->Subscriptions->patchEntity($subscription, $this->request->getData());
            if ($this->Subscriptions->save($subscription)) {
                $this->Flash->success(__('The subscription has been saved.'));
            }
            $this->Flash->error(__('The subscription could not be saved. Please, try again.'));
        }

        $plans = $this->Subscriptions->Plans->find('list');
        $this->set(compact('subscription', 'plans'));
    }

}
