<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund $fund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fund->fund_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fund->fund_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Funds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fund Types'), ['controller' => 'FundTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fund Type'), ['controller' => 'FundTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funds form large-9 medium-8 columns content">
    <?= $this->Form->create($fund) ?>
    <fieldset>
        <legend><?= __('Edit Fund') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('fund_index');
            echo $this->Form->control('fund_name');
            echo $this->Form->control('fund_type_id', ['options' => $fundTypes]);
            echo $this->Form->control('interest_rate');
            echo $this->Form->control('fund_crnt_value');
            echo $this->Form->control('num_shares');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
