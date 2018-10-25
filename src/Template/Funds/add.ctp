<!-- File: src/Template/Funds/add.ctp -->

<h1>Add Fund</h1>
<?php
    echo $this->Form->create($fund);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('fund index');
    echo $this->Form->control('fund name');
    echo $this->Form->control('fund_type_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('interest rate');
    echo $this->Form->control('current value');
    echo $this->Form->control('number of shares');
    echo $this->Form->button(__('Save Fund'));
    echo $this->Form->end();
?>