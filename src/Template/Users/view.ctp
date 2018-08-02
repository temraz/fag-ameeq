<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Refresh Tokens'), ['controller' => 'RefreshTokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refresh Token'), ['controller' => 'RefreshTokens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Documents'), ['controller' => 'UsersDocuments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Document'), ['controller' => 'UsersDocuments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Wallet'), ['controller' => 'UsersWallet', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Wallet'), ['controller' => 'UsersWallet', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nationality Id') ?></th>
            <td><?= h($user->nationality_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->title, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($user->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Pic') ?></th>
            <td><?= h($user->profile_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle Number') ?></th>
            <td><?= h($user->vehicle_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Id') ?></th>
            <td><?= $this->Number->format($user->status_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($user->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Captin') ?></th>
            <td><?= $user->is_captin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allow Notification') ?></th>
            <td><?= $user->allow_notification ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $user->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Notifications') ?></h4>
        <?php if (!empty($user->notifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->notifications as $notifications): ?>
            <tr>
                <td><?= h($notifications->id) ?></td>
                <td><?= h($notifications->title) ?></td>
                <td><?= h($notifications->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $notifications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $notifications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'action' => 'delete', $notifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notifications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Refresh Tokens') ?></h4>
        <?php if (!empty($user->refresh_tokens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Refresh Token') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Expires') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->refresh_tokens as $refreshTokens): ?>
            <tr>
                <td><?= h($refreshTokens->refresh_token) ?></td>
                <td><?= h($refreshTokens->user_id) ?></td>
                <td><?= h($refreshTokens->expires) ?></td>
                <td><?= h($refreshTokens->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RefreshTokens', 'action' => 'view', $refreshTokens->refresh_token]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RefreshTokens', 'action' => 'edit', $refreshTokens->refresh_token]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RefreshTokens', 'action' => 'delete', $refreshTokens->refresh_token], ['confirm' => __('Are you sure you want to delete # {0}?', $refreshTokens->refresh_token)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users Documents') ?></h4>
        <?php if (!empty($user->users_documents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Document Type Id') ?></th>
                <th scope="col"><?= __('Expire Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->users_documents as $usersDocuments): ?>
            <tr>
                <td><?= h($usersDocuments->id) ?></td>
                <td><?= h($usersDocuments->user_id) ?></td>
                <td><?= h($usersDocuments->document_type_id) ?></td>
                <td><?= h($usersDocuments->expire_date) ?></td>
                <td><?= h($usersDocuments->created) ?></td>
                <td><?= h($usersDocuments->modified) ?></td>
                <td><?= h($usersDocuments->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UsersDocuments', 'action' => 'view', $usersDocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UsersDocuments', 'action' => 'edit', $usersDocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersDocuments', 'action' => 'delete', $usersDocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDocuments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users Wallet') ?></h4>
        <?php if (!empty($user->users_wallet)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->users_wallet as $usersWallet): ?>
            <tr>
                <td><?= h($usersWallet->id) ?></td>
                <td><?= h($usersWallet->user_id) ?></td>
                <td><?= h($usersWallet->amount) ?></td>
                <td><?= h($usersWallet->created) ?></td>
                <td><?= h($usersWallet->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UsersWallet', 'action' => 'view', $usersWallet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UsersWallet', 'action' => 'edit', $usersWallet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersWallet', 'action' => 'delete', $usersWallet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersWallet->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
