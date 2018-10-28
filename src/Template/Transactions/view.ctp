<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->trans_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->trans_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->trans_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funds'), ['controller' => 'Funds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fund'), ['controller' => 'Funds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trans Types'), ['controller' => 'TransTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trans Type'), ['controller' => 'TransTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->trans_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fund') ?></th>
            <td><?= $transaction->has('fund') ? $this->Html->link($transaction->fund->fund_id, ['controller' => 'Funds', 'action' => 'view', $transaction->fund->fund_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Type') ?></th>
            <td><?= $transaction->has('trans_type') ? $this->Html->link($transaction->trans_type->trans_type_id, ['controller' => 'TransTypes', 'action' => 'view', $transaction->trans_type->trans_type_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Id') ?></th>
            <td><?= $this->Number->format($transaction->trans_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Amt') ?></th>
            <td><?= $this->Number->format($transaction->trans_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Share Amt') ?></th>
            <td><?= $this->Number->format($transaction->trans_share_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Date') ?></th>
            <td><?= h($transaction->trans_date) ?></td>
        </tr>
    </table>
</div>
