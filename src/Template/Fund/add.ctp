<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund $fund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fund'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fund form large-9 medium-8 columns content">
    <?= $this->Form->create($fund) ?>
    <fieldset>
        <legend><?= __('Add Fund') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $user]);
            echo $this->Form->control('fund_index');
            echo $this->Form->control('fund_name');
            echo $this->Form->control('fund_type_id');
            echo $this->Form->control('interest_rate');
            echo $this->Form->control('fund_crnt_value');
            echo $this->Form->control('num_shares');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
