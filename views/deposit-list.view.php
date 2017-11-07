
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <strong>Deposit Details</strong>
    </div>
    <div class="card-block">
      <div class="container">

        <?php if ($deposits) : ?>
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
              <?php foreach ($deposits as $key => $deposit): ?>
              <tr>
                <td><?php echo ++$key; ?>.</td>
                <td>৳ <?php echo $deposit['amount']; ?></td>
                <td>
                  <?php
                  if ($userobj) {
                    $username = $userobj->getUserById($deposit['member_id']);
                    if ($username) {
                      echo $username['name'];
                    }
                  }
                  ?>
                </td>
                <td>
                  <?php
                    $timestamp = strtotime($deposit['date']);
                    echo date('Y', $timestamp).'-'.date('m', $timestamp).'-'.date('d', $timestamp);
                    ?>
                </td>
                <?php if(Session::get('userroleid') == 2): ?>
                <td>
                  <a href="edit-deposit.php?id=<?php echo $deposit['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <?php endif; ?>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Total Cost:</th>
                <th>৳ <?php echo $totaldeposit ? $totaldeposit : 0; ?></th>
              </tr>
            </tfoot>
          </table>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
