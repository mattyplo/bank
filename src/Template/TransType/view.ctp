<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransType $transType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trans Type'), ['action' => 'edit', $transType->trans_type_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trans Type'), ['action' => 'delete', $transType->trans_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transType->trans_type_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trans Type'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trans Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transType view large-9 medium-8 columns content">
    <h3><?= h($transType->trans_type_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Trans Name') ?></th>
            <td><?= h($transType->trans_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trans Type Id') ?></th>
            <td><?= $this->Number->format($transType->trans_type_id) ?></td>
        </tr>
    </table>
</div>
