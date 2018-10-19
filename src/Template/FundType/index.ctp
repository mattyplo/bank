<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FundType[]|\Cake\Collection\CollectionInterface $fundType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fund Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Fund'), ['controller' => 'fund', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fund Type'), ['controller' => 'FundType', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fundType index large-9 medium-8 columns content">
    <h3><?= __('Fund Type') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fund_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fund_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fundType as $fundType): ?>
            <tr>
                <td><?= $this->Number->format($fundType->fund_type_id) ?></td>
                <td><?= h($fundType->fund_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fundType->fund_type_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fundType->fund_type_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fundType->fund_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $fundType->fund_type_id)]) ?>
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
