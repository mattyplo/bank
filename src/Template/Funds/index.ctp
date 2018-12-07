<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund[]|\Cake\Collection\CollectionInterface $funds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fund'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Add Dividend'), ['action' => 'addDividend']) ?></li>
        
    </ul>
</nav>
<div class="funds index large-9 medium-8 columns content">
    <h3><?= __('Funds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fund_index') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fund_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fund_crnt_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_shares') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funds as $fund): ?>
            <tr> 
                <td><?= h($fund->fund_index) ?></td>
                <td><?= h($fund->fund_name) ?></td>
                <td><?= $this->Number->format($fund->fund_crnt_value) ?></td>
                <td><?= $this->Number->format($fund->num_shares) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fund->fund_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fund->fund_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fund->fund_id], ['confirm' => __('Are you sure you want to delete # {0}?', $fund->fund_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        
    </div>
</div>
