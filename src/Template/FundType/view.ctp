<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FundType $fundType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fund Type'), ['action' => 'edit', $fundType->fund_type_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fund Type'), ['action' => 'delete', $fundType->fund_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $fundType->fund_type_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fund Type'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fund Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fundType view large-9 medium-8 columns content">
    <h3><?= h($fundType->fund_type_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fund Type') ?></th>
            <td><?= h($fundType->fund_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Type Id') ?></th>
            <td><?= $this->Number->format($fundType->fund_type_id) ?></td>
        </tr>
    </table>
</div>
