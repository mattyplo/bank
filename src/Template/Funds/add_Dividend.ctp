<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund $fund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Funds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="funds form large-9 medium-8 columns content">
    <?= $this->Form->create($transaction) ?>
    <fieldset>
        <legend><?= __('Add Dividend') ?></legend>
        <?php
            
            echo $this->Form->control('fund_index', ['options' => $funds->extract('fund_index')]);
            echo $this->Form->control('price per share');
            echo $this->Form->control('num_shares');
            echo $this->Form->year('year', [
                'empty' => 'year',
                'minYear' => 1950,
                'maxYear' => date('Y')
            ]);
            echo $this->Form->month('month', ['empty' => 'month']);
            echo $this->Form->day('day', ['empty' => 'day']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
</div>
