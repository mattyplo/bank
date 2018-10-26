<!-- File: src/Template/Funds/view.ctp -->

<h1><?= h($fund->title) ?></h1>
<p><?= h($fund->body) ?></p>
<p><small>Created: <?= $fund->fund_id ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $fund->slug]) ?></p>