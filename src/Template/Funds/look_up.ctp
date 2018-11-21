<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fund $fund
 */
?>

<div class="funds view large-9 medium-8 columns content">
    
   <?= $this->Form->create($symbol) ?>
    <fieldset>
        <legend><?= __('Lookup Fund') ?></legend>
        <?php
            echo $this->Form->control('fund_index');
            //echo $this->Form->control('data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
    <?= json_encode($test); ?>
    
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
