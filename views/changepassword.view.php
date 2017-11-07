<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      Change Password
    </div>
    <div class="card-block">
      <div class="container">
        
        <?php if(Session::check('depositupdatemsg')) echo Session::get('depositupdatemsg'); ?>

        <?php if($user): ?>
        <form method="POST">
          <div class="form-group row">
            <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
              <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Old Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="newpassword" placeholder="New Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="reset" class="btn">Reset</button>
              <button type="submit" name="updatepassword" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
