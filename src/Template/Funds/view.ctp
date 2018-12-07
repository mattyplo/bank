<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund $fund
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fund'), ['action' => 'edit', $fund->fund_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fund'), ['action' => 'delete', $fund->fund_id], ['confirm' => __('Are you sure you want to delete # {0}?', $fund->fund_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fund'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fund Types'), ['controller' => 'FundTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fund Type'), ['controller' => 'FundTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funds view large-9 medium-8 columns content">
    <h3><?= h($fund->fund_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $fund->has('user') ? $this->Html->link($fund->user->user_id, ['controller' => 'Users', 'action' => 'view', $fund->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Index') ?></th>
            <td><?= h($fund->fund_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Name') ?></th>
            <td><?= h($fund->fund_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Type') ?></th>
            <td><?= $fund->has('fund_type') ? $this->Html->link($fund->fund_type->fund_type, ['controller' => 'FundTypes', 'action' => 'view', $fund->fund_type->fund_type_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Id') ?></th>
            <td><?= $this->Number->format($fund->fund_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interest Rate') ?></th>
            <td><?= $this->Number->format($fund->interest_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fund Crnt Value') ?></th>
            <td><?= $response["Global Quote"]["05. price"]; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Shares') ?></th>
            <td><?= $this->Number->format($fund->num_shares) ?></td>
        </tr>
    </table>
    <?= $price; ?>
    <?php foreach($response as $res) {
    $poop = json_encode($res); 
    echo $poop;
    echo "<br>";
}
    ?>
    <?php
    
    foreach ($response as $res) {
        foreach ($res as $r) {
            echo $r;
            echo "\n";
        } 
        
    }
    
    
    
    ?>
   
        <?= $response["Global Quote"]["01. symbol"]; ?>
        <?= $response["Global Quote"]["02. open"]; ?>
        <?= $response["Global Quote"]["03. high"]; ?>
        <?= $response["Global Quote"]["04. low"]; ?>
        <?= $response["Global Quote"]["05. price"]; ?>
        
    
    <?php $stuff = json_encode($response); ?>
    <?= $stuff; ?>
    
    <?php var_dump($stuff); ?>
    
    
</div>
