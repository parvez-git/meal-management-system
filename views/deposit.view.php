<div class="col-md-8 offset-md-2">
  <div class="card">
    <div class="card-header">
      <strong>Add Deposit</strong>
    </div>
    <div class="card-block">
      <div class="container">

      <?php if(isset($status['status'])) echo $status['status']; ?>

      <?php if($members) : ?>

        <form method="POST">
          <div class="form-group row">
            <label for="memberid" class="col-sm-2 col-form-label">Member</label>
            <div class="col-sm-10">
              <select class="form-control" name="member_id" id="memberid">
                <option>--Select Member--</option>
                <?php foreach($members as $member): ?>
                  <option value="<?php echo $member['id']; ?>"><?php echo $member['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Amount (৳)</label>
            <div class="col-sm-10">
              <input type="number" name="amount" class="form-control" id="amount" min="1" placeholder="Enter Amount">
            </div>
          </div>
          <div class="form-group row">
            <label for="comments" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea name="comments" class="form-control" id="comments" placeholder="Enter Your Comment"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="reset" class="btn">Reset</button>
              <button type="submit" name="deposit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </form>
      <?php endif; ?>

      </div>
    </div>
  </div>
</div>
