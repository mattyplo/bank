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
      
   
    <br>
    <br>
    
    <?= $name; ?>
    <?= getType($name); ?>
   
<?php
    
    echo $response["Global Quote"]["01. symbol"];
    if ($isPost) {
    foreach($response as $res) {
    $poop = json_encode($res); 
    echo $poop;
    echo "<br>";
    }
}
    ?>
   
    
    
    
    
    
    
</div>
