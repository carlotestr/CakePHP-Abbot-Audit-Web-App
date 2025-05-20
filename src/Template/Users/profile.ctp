<section class="content">

  <div class="row">
    <div class="col-md-3" style="margin: 0 auto !important; padding: 0 !important; float: none !important;">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>

            <?php

              if (($user->image == '') && ($user->image_dir == '')) {
                $src = "data:image/jpeg;base64,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";
              } else {
                $src = '../../files/users/image/'.$user->image_dir.'/'.$user->image;
              }

            ?>

            <img class="profile-user-img img-responsive img-circle" src="<?php echo $src; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= h($user->emp_firstname).' '.h($user->emp_lastname) ?></h3>

              <p class="text-muted text-center"><?= h($user->username) ?></p>

            <!-- /.box-header -->
            <div class="box-body">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>ID</b> <a class="pull-right"><?= h($user->id) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Employee Id</b> <a class="pull-right"><?= h($user->employee_id) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Position</b> <a class="pull-right"><?= h($user->emp_position) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?= h($user->emp_email) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Hire Date</b> <a class="pull-right"><?= h($user->emp_hiredate) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Employee Team</b> <a class="pull-right"><?= h($user->emp_team) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Employee Manager</b> <a class="pull-right"><?= h($user->emp_manager) ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Employee Supervisor</b> <a class="pull-right"><?= h($user->emp_supervisor) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Created</b> <a class="pull-right"><?= h($user->created) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Modified</b> <a class="pull-right"><?= h($user->modified) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Account created by</b> <a class="pull-right"><?= h($user->createdby_id) ?></a>
                </li>

                <li class="list-group-item">
                  <b>Change Password</b> <!-- <a class="pull-right" href=""><button class="btn-info"> Reset Password</button></a> -->
                   <?php echo $this->Html->link(__('Reset Password'), ['controller' => 'Users', 'action' => 'passwordresetrequest'],['class'=>'btn-sm btn-info pull-right']) ?>
                </li>
              </ul>

              <div align="center" class="col-md-12">

              <?php echo $this->Html->link(__('Update Profile'), ['controller' => 'Users', 'action' => 'updateprofile'],['class'=>'btn btn-warning btn-block']) ?>

              </div>

            </div>
            <!-- /.box-body -->
        </div>
     </div>
   </div>
  </section>
