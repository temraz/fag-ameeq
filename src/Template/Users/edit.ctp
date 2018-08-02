<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Refresh Tokens'), ['controller' => 'RefreshTokens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Refresh Token'), ['controller' => 'RefreshTokens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users Documents'), ['controller' => 'UsersDocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Users Document'), ['controller' => 'UsersDocuments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users Wallet'), ['controller' => 'UsersWallet', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Users Wallet'), ['controller' => 'UsersWallet', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('nationality_id');
            echo $this->Form->control('name');
            echo $this->Form->control('is_captin');
            echo $this->Form->control('status_id');
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('mobile');
            echo $this->Form->control('password');
            echo $this->Form->control('profile_pic');
            echo $this->Form->control('rating');
            echo $this->Form->control('allow_notification');
            echo $this->Form->control('vehicle_number');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
