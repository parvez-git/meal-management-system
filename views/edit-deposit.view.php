<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Update Deposit</strong>
    </div>
    <div class="card-block">
      <div class="container">

      <?php if(Session::check('depositupdatemsg')) echo Session::get('depositupdatemsg'); ?>

      <?php if($deposit) : ?>

        <form method="POST">
          <div class="form-group row">
            <label for="memberid" class="col-sm-2 col-form-label">Member</label>
            <div class="col-sm-10">
              <select class="form-control" name="member_id" id="memberid">
                <?php
                if($members):
                  foreach($members as $member):
                    if($member['id'] == $deposit['member_id']){
                      $selected = 'selected';
                    }else{
                      $selected = '';
                    }
                ?>
                  <option value="<?php echo $member['id']; ?>" <?php echo $selected; ?>><?php echo $member['name']; ?></option>
                <?php endforeach; endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Amount (৳)</label>
            <div class="col-sm-10">
              <input type="number" name="amount" class="form-control" id="amount" min="1" value="<?php echo $deposit['amount']; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="comments" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea name="comments" class="form-control" id="comments"><?php echo $deposit['comments']; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="reset" class="btn">Reset</button>
              <button type="submit" name="depositupdate" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      <?php endif; ?>

      </div>
    </div>
  </div>
</div>
