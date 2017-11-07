<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Update Cost</strong>
    </div>
    <div class="card-block">
      <div class="container">

      <?php if(Session::check('depositupdatemsg')) echo Session::get('depositupdatemsg');?>

      <?php if($cost) : ?>

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
                <td><input type="number" name="meal_cost" class="form-control" value="<?php echo $cost['meal_cost']; ?>"></td>
                <td>
                  <select class="form-control" name="member_id">
                    <?php
                    if($members):
                      foreach($members as $member):
                        if($member['id'] == $cost['member_id']){
                          $selected = 'selected';
                        }else{
                          $selected = '';
                        }
                    ?>
                      <option value="<?php echo $member['id']; ?>" <?php echo $selected; ?>><?php echo $member['name']; ?></option>
                    <?php endforeach; endif; ?>
                  </select>
                </td>
                <td><input type="text" name="comments" class="form-control" value="<?php echo $cost['comments']; ?>"></td>
              </tr>
            </tbody>
          </table>

          <div class="form-group row float-right">
            <div class="col-sm-12">
              <button type="submit" name="costupdate" class="btn btn-primary">Update Cost</button>
            </div>
          </div>

        </form>
      <?php endif; ?>

      </div>
    </div>
  </div>
</div>
