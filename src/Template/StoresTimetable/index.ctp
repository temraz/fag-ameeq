<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTimetable[]|\Cake\Collection\CollectionInterface $storesTimetable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Timetable'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesTimetable index large-9 medium-8 columns content">
    <h3><?= __('Stores Timetable') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('day_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('open') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesTimetable as $storesTimetable): ?>
            <tr>
                <td><?= $this->Number->format($storesTimetable->id) ?></td>
                <td><?= $storesTimetable->has('store') ? $this->Html->link($storesTimetable->store->name, ['controller' => 'Stores', 'action' => 'view', $storesTimetable->store->id]) : '' ?></td>
                <td><?= $storesTimetable->has('day') ? $this->Html->link($storesTimetable->day->title, ['controller' => 'Days', 'action' => 'view', $storesTimetable->day->id]) : '' ?></td>
                <td><?= h($storesTimetable->open) ?></td>
                <td><?= h($storesTimetable->closed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesTimetable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesTimetable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesTimetable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesTimetable->id)]) ?>
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
