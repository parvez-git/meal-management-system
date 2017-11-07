<?php if ($user) : ?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <strong>Member Profile</strong>
      <?php if(Session::get('userid') == $user['id']): ?>
      <a href="changepassword.php?id=<?php echo $user['id']; ?>" class="float-right btn btn-danger btn-sm text-white">Change Password</a>
      <?php endif; ?>
    </div>
    <div class="card-block">
      <div class="container">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Title</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <?php if($user['name']) : ?>
            <tr>
              <td>01.</td>
              <th scope="row">Name</th>
              <td><span class="btn btn-info"><?php echo $user['name']; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($deposit['amounts']) : ?>
            <tr>
              <td>02.</td>
              <th scope="row">Total Deposit</th>
              <td><span class="btn btn-outline-warning btn-sm">৳ <?php echo $deposit['amounts']; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($member_meal['member_meal']) : ?>
            <tr>
              <td>03.</td>
              <th scope="row">Meal of <?php echo $user['name']; ?></th>
              <td><span class="btn btn-outline-info btn-sm"><?php echo $member_meal['member_meal']; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($single_cost['single_cost']) : ?>
            <tr>
              <td>04.</td>
              <th scope="row">Bazar of <?php echo $user['name']; ?></th>
              <td><span class="btn btn-outline-warning btn-sm">৳ <?php echo $single_cost['single_cost']; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($total_cost['total_cost']) : ?>
            <tr>
              <td>05.</td>
              <th scope="row">Total Cost</th>
              <td><span class="btn btn-outline-warning btn-sm">৳ <?php echo $total_cost['total_cost']; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($total_meal['total_meal']) : ?>
            <tr>
              <td>06.</td>
              <th scope="row">Total Meal</th>
              <td><span class="btn btn-outline-info btn-sm"><?php echo $total_meal['total_meal']; ?><span></td>
            </tr>
            <?php endif; ?>
            <?php if($meal_rate) : ?>
            <tr>
              <td>07.</td>
              <th scope="row">Meal Rate</th>
              <td><span class="btn btn-outline-primary btn-sm">৳ <?php echo $meal_rate; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($member_cost) : ?>
            <tr>
              <td>08.</td>
              <th scope="row">Cost of <?php echo $user['name']; ?></th>
              <td><span class="btn btn-outline-primary btn-sm">৳ <?php echo $member_cost; ?></span></td>
            </tr>
            <?php endif; ?>
            <?php if($plusminus) : ?>
            <tr class="table-primary">
              <td>09.</td>
              <th scope="row">Plus/Minus</th>
              <td>
                <?php if ($plusminus > 0) : ?>
                  <span class="btn btn-success btn">৳ <?php echo $plusminus; ?></span>
                <?php else: ?>
                  <span class="btn btn-danger btn">৳ <?php echo $plusminus; ?></span>
                <?php endif; ?>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>
