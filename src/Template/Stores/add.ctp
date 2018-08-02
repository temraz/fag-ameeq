<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Timetable'), ['controller' => 'StoresTimetable', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Timetable'), ['controller' => 'StoresTimetable', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stores form large-9 medium-8 columns content">
    <?= $this->Form->create($store) ?>
    <fieldset>
        <legend><?= __('Add Store') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('address');
            echo $this->Form->control('logo');
            echo $this->Form->control('long');
            echo $this->Form->control('lat');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
