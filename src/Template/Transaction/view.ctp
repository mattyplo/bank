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
        <li><?= $this->Html->link(__('List Transaction'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transaction view large-9 medium-8 columns content">
    <h3><?= h($transaction->trans_id) ?></h3>
    <table class="vertical-table">
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
            <th scope="row"><?= __('Fund Id') ?></th>
            <td><?= $this->Number->format($transaction->fund_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Type Id') ?></th>
            <td><?= $this->Number->format($transaction->trans_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Date') ?></th>
            <td><?= h($transaction->trans_date) ?></td>
        </tr>
    </table>
</div>
