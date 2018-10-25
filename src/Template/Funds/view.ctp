<!-- File: src/Template/Funds/view.ctp -->

<h1><?= h($fund->title) ?></h1>
<p><?= h($fund->body) ?></p>
<p><small>Created: <?= $fund->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $fund->slug]) ?></p>