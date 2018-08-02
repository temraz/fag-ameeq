<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages Recipients'), ['controller' => 'MessagesRecipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Messages Recipient'), ['controller' => 'MessagesRecipients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="messages view large-9 medium-8 columns content">
    <h3><?= h($message->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Request') ?></th>
            <td><?= $message->has('request') ? $this->Html->link($message->request->id, ['controller' => 'Requests', 'action' => 'view', $message->request->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Message') ?></th>
            <td><?= $message->has('parent_message') ? $this->Html->link($message->parent_message->id, ['controller' => 'Messages', 'action' => 'view', $message->parent_message->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attachment') ?></th>
            <td><?= $message->has('attachment') ? $this->Html->link($message->attachment->name, ['controller' => 'Attachments', 'action' => 'view', $message->attachment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Id') ?></th>
            <td><?= $this->Number->format($message->sender_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($message->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($message->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($message->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($message->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Messages') ?></h4>
        <?php if (!empty($message->child_messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Request Id') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Sender Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Attachment Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->child_messages as $childMessages): ?>
            <tr>
                <td><?= h($childMessages->id) ?></td>
                <td><?= h($childMessages->request_id) ?></td>
                <td><?= h($childMessages->body) ?></td>
                <td><?= h($childMessages->sender_id) ?></td>
                <td><?= h($childMessages->parent_id) ?></td>
                <td><?= h($childMessages->attachment_id) ?></td>
                <td><?= h($childMessages->created) ?></td>
                <td><?= h($childMessages->modified) ?></td>
                <td><?= h($childMessages->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $childMessages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $childMessages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $childMessages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childMessages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Messages Recipients') ?></h4>
        <?php if (!empty($message->messages_recipients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Read') ?></th>
                <th scope="col"><?= __('Message Id') ?></th>
                <th scope="col"><?= __('Recipient Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->messages_recipients as $messagesRecipients): ?>
            <tr>
                <td><?= h($messagesRecipients->id) ?></td>
                <td><?= h($messagesRecipients->read) ?></td>
                <td><?= h($messagesRecipients->message_id) ?></td>
                <td><?= h($messagesRecipients->recipient_id) ?></td>
                <td><?= h($messagesRecipients->created) ?></td>
                <td><?= h($messagesRecipients->modified) ?></td>
                <td><?= h($messagesRecipients->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MessagesRecipients', 'action' => 'view', $messagesRecipients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MessagesRecipients', 'action' => 'edit', $messagesRecipients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MessagesRecipients', 'action' => 'delete', $messagesRecipients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messagesRecipients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
