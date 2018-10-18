<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transaction'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="transaction form large-9 medium-8 columns content">
    <?= $this->Form->create($transaction) ?>
    <fieldset>
        <legend><?= __('Add Transaction') ?></legend>
        <?php
            echo $this->Form->control('trans_date');
            echo $this->Form->control('trans_amt');
            echo $this->Form->control('trans_share_amt');
            echo $this->Form->control('fund_id');
            echo $this->Form->control('trans_type_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
