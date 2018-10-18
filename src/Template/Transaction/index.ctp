<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction[]|\Cake\Collection\CollectionInterface $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transaction index large-9 medium-8 columns content">
    <h3><?= __('Transaction') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('trans_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trans_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trans_amt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trans_share_amt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fund_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trans_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaction as $transaction): ?>
            <tr>
                <td><?= $this->Number->format($transaction->trans_id) ?></td>
                <td><?= h($transaction->trans_date) ?></td>
                <td><?= $this->Number->format($transaction->trans_amt) ?></td>
                <td><?= $this->Number->format($transaction->trans_share_amt) ?></td>
                <td><?= $this->Number->format($transaction->fund_id) ?></td>
                <td><?= $this->Number->format($transaction->trans_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->trans_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->trans_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->trans_id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->trans_id)]) ?>
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
