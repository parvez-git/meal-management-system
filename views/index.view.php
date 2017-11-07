<div id="accordion" role="tablist" class="container">
  <div class="card mb-2">
    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
            All Members
        </h5>
      </div>
    </a>

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <div class="container">

          <?php if ($users) : ?>
            <table class="table table-bordered mt-3">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $key => $user): ?>
                <tr>
                  <th scope="row"><?php echo ++$key; ?>.</th>
                  <td><?php echo $user['name']; ?></td>
                  <td><?php echo $user['email']; ?></td>
                  <td><?php echo $user['username']; ?></td>
                  <td>
                    <a href="profile.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm">View</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
  <div class="card mb-2">
    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
            Debit - Credit
        </h5>
      </div>
    </a>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <div class="container">

          <table class="table table-bordered mt-3">
            <thead>
                <th class="text-center">Total Cost: <?php echo $totalcost; ?></th>
                <th class="text-center">Total Meal: <?php echo $totalmeal; ?></th>
                <th class="text-center">Meal Rate: <?php echo number_format($meal_rate, 3); ?></th>
                <th class="text-center">Cash on hand: <?php echo $cash_on_hand; ?></th>
            </thead>
          </table>

          <?php if($users): ?>
          <table class="table table-bordered mt-3">
            <thead>
              <tr>
                <th>Member:</th>
                <?php foreach ($users as $user): ?>
                  <th><?php echo $user['name']; ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>

              <tr>
                <th scope="row">Deposit:</th>
                <?php
                foreach ($users as $user):
                  if ($depositobj):
                    $deposit = $depositobj->getDepositAmountsById($user['id']);
                    if ($deposit) :

                    echo '<td>৳ ' . ($deposit['amounts']) . '</td>';

                    endif;
                  endif;
                endforeach;
                ?>
              </tr>

              <tr>
                <th scope="row">Meal:</th>
                <?php
                foreach ($users as $user):
                  if ($mealobj):
                    $meal = $mealobj->getMealByMember($user['id']);
                    if ($meal) :

                    echo '<td>' . ($meal['member_meal']) . '</td>';

                    endif;
                  endif;
                endforeach;
                ?>
              </tr>

              <tr>
                <th scope="row">Cost:</th>
                <?php
                foreach ($users as $user):
                  if ($mealobj):
                    $meal = $mealobj->getMealByMember($user['id']);
                    if ($meal) :
                      $member_cost  = ( $meal['member_meal'] * $meal_rate );

                      echo '<td>৳ ' . number_format($member_cost, 3) . '</td>';

                    endif;
                  endif;
                endforeach;
                ?>
              </tr>

              <tr>
                <th scope="row">Plus/Minus:</th>
                <?php
                foreach ($users as $user):
                  if ($mealobj):
                    $meal = $mealobj->getMealByMember($user['id']);
                    if ($meal) :
                      $member_cost  = ( $meal['member_meal'] * $meal_rate );
                      if ($depositobj):
                        $deposit = $depositobj->getDepositAmountsById($user['id']);
                        if ($deposit) :
                          $plusminus = ($deposit['amounts'] - $member_cost);
                          if ($plusminus > 0) :
                            echo '<td><span class="btn btn-success btn-sm">৳ ' . number_format($plusminus, 3) . '</span></td>';
                          else:
                            echo '<td><span class="btn btn-danger btn-sm">৳ ' . number_format($plusminus, 3) . '</span></td>';
                          endif;
                        endif;
                      endif;
                    endif;
                  endif;
                endforeach;
                ?>
              </tr>

            </tbody>
          </table>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
  <div class="card mb-2">
    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
            Meal Details
        </h5>
      </div>
    </a>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <div class="container">

          <?php if($users): ?>
          <table class="table table-bordered table-striped mt-3">
            <thead>
              <th>Date</th>
              <th>Member</th>
              <th>Meal</th>
            </thead>
            <tbody>

            <?php
              if ($meal_date):
                foreach ($meal_date as $key => $mealdate):
                  echo '<tr>';
                      $user_num = count($users);
                      if($key%$user_num == 0):
                        echo '<th rowspan="'.$user_num.'">' . ($mealdate['meal_date']) . '</th>';
                      endif;
                      if($member_name = $mealobj->getMemberNameByMeal($mealdate['member_id'])):
                        echo '<td>'.$member_name['name'].'</td>';
                      endif;
                      echo '<th>'.$mealdate['meal_num'].'</th>';
                  echo '</tr>';
                endforeach;
              endif;
            ?>

            </tbody>
          </table>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
