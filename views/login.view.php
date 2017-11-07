<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Login</strong>
    </div>
    <div class="card-block">
      <div class="container">

        <?php if (isset($status)) echo $status; ?>

        <form method="POST">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter Your Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="reset" class="btn">Reset</button>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
