<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersWallet $usersWallet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Wallet'), ['action' => 'edit', $usersWallet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Wallet'), ['action' => 'delete', $usersWallet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersWallet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Wallet'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Wallet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersWallet view large-9 medium-8 columns content">
    <h3><?= h($usersWallet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersWallet->has('user') ? $this->Html->link($usersWallet->user->name, ['controller' => 'Users', 'action' => 'view', $usersWallet->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersWallet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($usersWallet->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usersWallet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usersWallet->modified) ?></td>
        </tr>
    </table>
</div>
