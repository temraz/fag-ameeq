<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDocument $usersDocument
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersDocument->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersDocument->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Documents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Document Types'), ['controller' => 'DocumentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document Type'), ['controller' => 'DocumentTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersDocuments form large-9 medium-8 columns content">
    <?= $this->Form->create($usersDocument) ?>
    <fieldset>
        <legend><?= __('Edit Users Document') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('document_type_id', ['options' => $documentTypes]);
            echo $this->Form->control('expire_date', ['empty' => true]);
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
