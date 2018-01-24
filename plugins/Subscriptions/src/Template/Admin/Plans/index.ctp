<?php
$this->extend('Croogo/Core./Common/admin_index');
$this->Breadcrumbs->add(__d('croogo', 'Subscriptions'), ['controller' => 'subscriptions', 'action' => 'index'])
    ->add(__d('croogo', 'Plans'), $this->request->getUri()->getPath());
?>
