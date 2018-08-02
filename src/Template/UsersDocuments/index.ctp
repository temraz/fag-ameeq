<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDocument[]|\Cake\Collection\CollectionInterface $usersDocuments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Document'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Document Types'), ['controller' => 'DocumentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document Type'), ['controller' => 'DocumentTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersDocuments index large-9 medium-8 columns content">
    <h3><?= __('Users Documents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expire_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersDocuments as $usersDocument): ?>
            <tr>
                <td><?= $this->Number->format($usersDocument->id) ?></td>
                <td><?= $usersDocument->has('user') ? $this->Html->link($usersDocument->user->name, ['controller' => 'Users', 'action' => 'view', $usersDocument->user->id]) : '' ?></td>
                <td><?= $usersDocument->has('document_type') ? $this->Html->link($usersDocument->document_type->title, ['controller' => 'DocumentTypes', 'action' => 'view', $usersDocument->document_type->id]) : '' ?></td>
                <td><?= h($usersDocument->expire_date) ?></td>
                <td><?= $this->Number->format($usersDocument->created) ?></td>
                <td><?= $this->Number->format($usersDocument->modified) ?></td>
                <td><?= $this->Number->format($usersDocument->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersDocument->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersDocument->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDocument->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
