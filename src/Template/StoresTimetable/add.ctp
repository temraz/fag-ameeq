<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTimetable $storesTimetable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Timetable'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesTimetable form large-9 medium-8 columns content">
    <?= $this->Form->create($storesTimetable) ?>
    <fieldset>
        <legend><?= __('Add Stores Timetable') ?></legend>
        <?php
            echo $this->Form->control('store_id', ['options' => $stores]);
            echo $this->Form->control('day_id', ['options' => $days]);
            echo $this->Form->control('open');
            echo $this->Form->control('closed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
