<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Update Meal</strong>
    </div>
    <div class="card-block">
      <div class="container">

      <?php if(Session::check('depositupdatemsg')) echo Session::get('depositupdatemsg');?>

      <?php if($meal) : ?>

        <form method="POST">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="75%">Name</th>
                <th width="25%">Meal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <label for="mealid" class="col-form-label">
                    <?php
                    if($members){ 
                      foreach($members as $member){
                        if($member['id']==$meal['member_id']){
                          echo $member['name'];
                        }
                      }
                    }
                    ?>
                  </label>
                </td>
                <td>
                  <input type="number" name="meal_num" class="form-control" id="mealid" value="<?php echo $meal['meal_num']; ?>" min="0">
                </td>
              </tr>
            </tbody>
          </table>

          <div class="form-group row float-right">
            <div class="col-sm-12">
              <button type="submit" name="mealupdate" class="btn btn-primary">Update Meal</button>
            </div>
          </div>

        </form>
      <?php endif; ?>

      </div>
    </div>
  </div>
</div>
