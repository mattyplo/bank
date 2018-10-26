<!-- File: src/Template/Funds/index.ctp -->

<h1>Funds</h1>
<?= $this->Html->link('Add Fund', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Index</th>
        <th></th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($funds as $fund): ?>
    <tr>
        <td>
            <?= $this->Html->link($fund->fund_index, ['action' => 'view', $fund->fund_id]) ?>
        </td>
        <td>
            <?= $fund->fund_index ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table> 