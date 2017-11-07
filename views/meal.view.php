<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Add Meal</strong>
      <span class="float-right">Date: <?php echo date("d-m-Y"); ?></span>
    </div>
    <div class="card-block">
      <div class="container">

      <?php if(isset($status['status'])) echo $status['status']; ?>

      <?php if($members) : ?>

        <form method="POST">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="10%">SL.</th>
                <th width="70%">Name</th>
                <th width="20%">Meal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($members as $serial => $member): ?>
              <tr>
                <td><?php echo ++$serial; ?>.</td>
                <td><label for="member_<?php echo $member['id']; ?>" class="col-form-label"><?php echo $member['name']; ?></label></td>
                <td>
                  <input type="number" name="meal[<?php echo $member['id']; ?>]" class="form-control" id="member_<?php echo $member['id']; ?>" value="1" min="0">
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <div class="form-group row float-right">
            <div class="col-sm-12">
              <button type="submit" name="deposit" class="btn btn-primary">Add Meal</button>
            </div>
          </div>

        </form>
      <?php endif; ?>

      </div>
    </div>
  </div>
</div>
