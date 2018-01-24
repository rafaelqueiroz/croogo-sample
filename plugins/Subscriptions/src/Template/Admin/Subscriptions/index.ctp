<?php

$this->extend('Croogo/Core./Common/admin_index');

$this->Breadcrumbs->add(__d('croogo', 'Subscriptions'), $this->request->getUri()->getPath());

$this->append('table-footer', $this->element('admin/modal', [
        'id' => 'comment-modal',
    ]));

$this->append('action-buttons'); echo "&nbsp;"; $this->end();

$this->append('form-start', $this->Form->create(null, [
    'url' => ['action' => 'process'],
    'align' => 'inline',
]));

$this->start('table-heading');
$tableHeaders = $this->Html->tableHeaders([
    $this->Paginator->sort('name', __d('croogo', 'Name')),
    $this->Paginator->sort('email', __d('croogo', 'Email')),
    $this->Paginator->sort('plan_id', __d('croogo', 'Plan')),
    $this->Paginator->sort('amount', __d('croogo', 'Amount')),
    $this->Paginator->sort('created', __d('croogo', 'Created')),
    __d('croogo', 'Actions'),
]);
echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
$commentIcon = $this->Html->icon($this->Theme->getIcon('comment'));
$rows = [];
foreach ($subscriptions as $subscription) {
    $actions = [];

    $actions[] = $this->Croogo->adminRowAction('', ['action' => 'view', $subscription->id],
        ['icon' => $this->Theme->geticon('read'), 'tooltip' => __d('croogo', 'View this item')]);
    $actions[] = $this->Croogo->adminRowActions($subscription->id);

    $actions = $this->Html->div('item-actions', implode(' ', $actions));
    $rows[] = [
        
        $subscription->name,
        $subscription->email,
        $subscription->plan->name,
        $this->Number->currency($subscription->plan->amount),
        $this->Time->i18nFormat($subscription->created),
        $actions,
    ];
}
echo $this->Html->tableCells($rows);
$this->end();
