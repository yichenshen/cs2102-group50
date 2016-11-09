<h4>Funding List</h4>
<div class="divider"></div>
<table class="striped">
  <thead>
  <tr>
    <th>Funder</th>
    <th>Amount</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($fundings as $funding): ?>
    <tr>
      <td><?php echo $funding->funder ?></td>
      <td>$<?php echo $funding->amount ?></td>
    </tr>
  <?php endforeach ?>
  </tbody>
  <tfoot>
    <th>Total:</th>
    <th>$<?php echo $project->amount_raised ?></th>
  </tfoot>
</table>
<br />
<br />
