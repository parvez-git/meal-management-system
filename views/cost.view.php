<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <strong>Add Cost</strong>
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
                <th width="20%">Amount (৳)</th>
                <th width="30%">Member</th>
                <th width="50%">Comment</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="number" name="meal_cost" class="form-control" placeholder="৳"></td>
                <td>
                  <select class="form-control" name="member_id">
                    <option>-- Select Member --</option>
                    <?php foreach($members as $member): ?>
                      <option value="<?php echo $member['id']; ?>"><?php echo $member['name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
                <td><input type="text" name="comments" class="form-control"></td>
              </tr>
            </tbody>
          </table>

          <div class="form-group row float-right">
            <div class="col-sm-12">
              <button type="submit" name="cost" class="btn btn-primary">Add Cost</button>
            </div>
          </div>

        </form>
      <?php endif; ?>

      </div>
    </div>
  </div>
</div>
