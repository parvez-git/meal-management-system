<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <strong>Deposit Details</strong>
    </div>
    <div class="card-block">
      <div class="container">

        <?php if($users): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <th class="text-center">Date</th>
              <th class="text-center">Member</th>
              <th class="text-center">Meal</th>
              <?php if(Session::get('userroleid') == 2): ?>
              <th class="text-center">Action</th>
              <?php endif; ?>
            </thead>
            <tbody>

            <?php
              if ($meal_date):
                foreach ($meal_date as $key => $mealdate):
                  echo '<tr class="text-center">';
                      $user_num = count($users);
                      if($key%$user_num == 0):
                        echo '<th rowspan="'.$user_num.'" class="text-center">' . ($mealdate['meal_date']);
                        // echo '<a href="edit-meal.php?date='.$mealdate['meal_date'].'" class="btn btn-secondary btn-sm float-right">Edit</a>';
                        echo '</th>';
                      endif;
                      if($member_name = $mealobj->getMemberNameByMeal($mealdate['member_id'])):
                        echo '<td>'.$member_name['name'].'</td>';
                      endif;
                      echo '<th class="text-center">'.$mealdate['meal_num'].'</th>';
                      if(Session::get('userroleid') == 2):
                      echo '<td>';
                      echo '<a href="edit-meal.php?id='.$mealdate['id'].'" class="btn btn-primary btn-sm">Edit</a>';
                      echo '</td>';
                      endif;
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
