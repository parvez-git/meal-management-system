<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Registration</strong>
    </div>
    <div class="card-block">
      <div class="container">

        <?php if(isset($status)) echo $status; ?>

        <form method="POST">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter Your Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="reset" class="btn">Reset</button>
              <button type="submit" name="registration" class="btn btn-primary">Register Now</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
