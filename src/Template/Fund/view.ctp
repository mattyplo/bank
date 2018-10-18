<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund $fund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fund'), ['action' => 'edit', $fund->fund_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fund'), ['action' => 'delete', $fund->fund_id], ['confirm' => __('Are you sure you want to delete # {0}?', $fund->fund_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fund'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fund'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fund Type'), ['controller' => 'FundType', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fund Type'), ['controller' => 'FundType', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fund view large-9 medium-8 columns content">
    <h3><?= h($fund->fund_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $fund->has('user') ? $this->Html->link($fund->user->user_id, ['controller' => 'User', 'action' => 'view', $fund->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Index') ?></th>
            <td><?= h($fund->fund_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Name') ?></th>
            <td><?= h($fund->fund_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Type') ?></th>
            <td><?= $fund->has('fund_type') ? $this->Html->link($fund->fund_type->fund_type_id, ['controller' => 'FundType', 'action' => 'view', $fund->fund_type->fund_type_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Id') ?></th>
            <td><?= $this->Number->format($fund->fund_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interest Rate') ?></th>
            <td><?= $this->Number->format($fund->interest_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Crnt Value') ?></th>
            <td><?= $this->Number->format($fund->fund_crnt_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Shares') ?></th>
            <td><?= $this->Number->format($fund->num_shares) ?></td>
        </tr>
    </table>
</div>
