<?php

$this->extend('Croogo/Core./Common/admin_edit');

$this->Breadcrumbs->add(__d('croogo', 'Subscriptions'), [
        'controller' => 'subscriptions',
        'action' => 'index',
    ])
    ->add(__d('croogo', 'Plans'), [
        'controller' => 'plans',
        'action' => 'index',
    ]);

if ($this->request->params['action'] == 'edit') {
    $this->Breadcrumbs->add($plan->title, $this->request->getRequestTarget());
}

if ($this->request->params['action'] == 'add') {
    $this->Breadcrumbs->add(__d('croogo', 'Add'), $this->request->getRequestTarget());
}

$this->append('form-start', $this->Form->create($plan));

$this->append('tab-heading');
echo $this->Croogo->adminTab(__d('croogo', 'Plan'), '#plan-main');
$this->end();

$this->append('tab-content');

echo $this->Html->tabStart('plan-main') . $this->Form->input('name', [
        'label' => __d('croogo', 'Name'),
    ]) . $this->Form->input('amount', [
        'label' => __d('croogo', 'Amount'),
    ]);
echo $this->Html->tabEnd();
$this->end();
