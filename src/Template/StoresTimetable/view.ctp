<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTimetable $storesTimetable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Timetable'), ['action' => 'edit', $storesTimetable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Timetable'), ['action' => 'delete', $storesTimetable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesTimetable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Timetable'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Timetable'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesTimetable view large-9 medium-8 columns content">
    <h3><?= h($storesTimetable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storesTimetable->has('store') ? $this->Html->link($storesTimetable->store->name, ['controller' => 'Stores', 'action' => 'view', $storesTimetable->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= $storesTimetable->has('day') ? $this->Html->link($storesTimetable->day->title, ['controller' => 'Days', 'action' => 'view', $storesTimetable->day->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesTimetable->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open') ?></th>
            <td><?= h($storesTimetable->open) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closed') ?></th>
            <td><?= h($storesTimetable->closed) ?></td>
        </tr>
    </table>
</div>
