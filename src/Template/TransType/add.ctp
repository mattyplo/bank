<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransType $transType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trans Type'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="transType form large-9 medium-8 columns content">
    <?= $this->Form->create($transType) ?>
    <fieldset>
        <legend><?= __('Add Trans Type') ?></legend>
        <?php
            echo $this->Form->control('trans_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
