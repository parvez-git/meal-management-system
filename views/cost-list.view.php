
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <strong>Cost Details</strong>
    </div>
    <div class="card-block">
      <div class="container">

        <?php if ($costs) : ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Amount</th>
                <th>Member</th>
                <th>Date</th>
                <?php if(Session::get('userroleid') == 2): ?>
                <th>Actions</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($costs as $key => $cost): ?>
              <tr>
                <td><?php echo ++$key; ?>.</td>
                <td>৳ <?php echo $cost['meal_cost']; ?></td>
                <td>
                  <?php
                  if ($userobj) {
                    $username = $userobj->getUserById($cost['member_id']);
                    if ($username) {
                      echo $username['name'];
                    }
                  }
                  ?>
                </td>
                <td><?php echo $cost['cost_date']; ?></td>
                <?php if(Session::get('userroleid') == 2): ?>
                <td>
                  <a href="edit-cost.php?id=<?php echo $cost['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <?php endif; ?>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Total Cost:</th>
                <th>৳ <?php echo $totalcost ? $totalcost : 0; ?></th>
              </tr>
            </tfoot>
          </table>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
