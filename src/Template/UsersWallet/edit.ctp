<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersWallet $usersWallet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersWallet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersWallet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Wallet'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersWallet form large-9 medium-8 columns content">
    <?= $this->Form->create($usersWallet) ?>
    <fieldset>
        <legend><?= __('Edit Users Wallet') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
