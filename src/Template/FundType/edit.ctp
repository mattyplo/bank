<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FundType $fundType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fundType->fund_type_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fundType->fund_type_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fund Type'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fundType form large-9 medium-8 columns content">
    <?= $this->Form->create($fundType) ?>
    <fieldset>
        <legend><?= __('Edit Fund Type') ?></legend>
        <?php
            echo $this->Form->control('fund_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
