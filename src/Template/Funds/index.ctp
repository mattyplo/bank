<!-- File: src/Template/Funds/index.ctp -->

<h1>Funds</h1>
<?= $this->Html->link('Add Fund', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($funds as $fund): ?>
    <tr>
        <td>
            <?= $this->Html->link($fund->title, ['action' => 'view', $fund->slug]) ?>
        </td>
        <td>
            <?= $fund->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table> 