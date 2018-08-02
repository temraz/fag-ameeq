<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDocument $usersDocument
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Document'), ['action' => 'edit', $usersDocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Document'), ['action' => 'delete', $usersDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Documents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Document'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Document Types'), ['controller' => 'DocumentTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document Type'), ['controller' => 'DocumentTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersDocuments view large-9 medium-8 columns content">
    <h3><?= h($usersDocument->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersDocument->has('user') ? $this->Html->link($usersDocument->user->name, ['controller' => 'Users', 'action' => 'view', $usersDocument->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Document Type') ?></th>
            <td><?= $usersDocument->has('document_type') ? $this->Html->link($usersDocument->document_type->title, ['controller' => 'DocumentTypes', 'action' => 'view', $usersDocument->document_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersDocument->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $this->Number->format($usersDocument->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= $this->Number->format($usersDocument->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($usersDocument->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expire Date') ?></th>
            <td><?= h($usersDocument->expire_date) ?></td>
        </tr>
    </table>
</div>
