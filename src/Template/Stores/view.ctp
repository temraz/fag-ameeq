<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Timetable'), ['controller' => 'StoresTimetable', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Timetable'), ['controller' => 'StoresTimetable', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stores view large-9 medium-8 columns content">
    <h3><?= h($store->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($store->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($store->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= $this->Number->format($store->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= $this->Number->format($store->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $this->Number->format($store->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Long') ?></th>
            <td><?= $this->Number->format($store->long) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($store->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($store->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($store->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $store->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Stores Timetable') ?></h4>
        <?php if (!empty($store->stores_timetable)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('Open') ?></th>
                <th scope="col"><?= __('Closed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->stores_timetable as $storesTimetable): ?>
            <tr>
                <td><?= h($storesTimetable->id) ?></td>
                <td><?= h($storesTimetable->store_id) ?></td>
                <td><?= h($storesTimetable->day_id) ?></td>
                <td><?= h($storesTimetable->open) ?></td>
                <td><?= h($storesTimetable->closed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StoresTimetable', 'action' => 'view', $storesTimetable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StoresTimetable', 'action' => 'edit', $storesTimetable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StoresTimetable', 'action' => 'delete', $storesTimetable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesTimetable->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
