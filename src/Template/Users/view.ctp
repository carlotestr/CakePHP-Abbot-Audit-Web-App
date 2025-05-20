<section class="content-header">
  <h1>
    User
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <!-- <dt scope="row"><?= __('Emp Firstname') ?></dt>
            <dd><?= h($user->emp_firstname) ?></dd> -->
            <dt scope="row">Employee ID</dt>
            <dd><?= h($user->employee_id) ?></dd>
            <dt scope="row">Name</dt>
            <dd><?= h($user->emp_fullname) ?></dd>
            <dt scope="row">E-mail</dt>
            <dd><?= h($user->emp_email) ?></dd>
            <dt scope="row">Position</dt>
            <dd><?= h($user->emp_position) ?></dd>
            <dt scope="row">Team</dt>
            <dd><?= h($user->emp_team) ?></dd>
            <dt scope="row">Manager</dt>
            <dd><?= h($manager->emp_fullname) ?></dd>
            <dt scope="row">Supervisor</dt>
            <dd><?= h($supervisor->emp_fullname) ?></dd>
            <dt scope="row">Hire Date</dt>
            <dd><?= h($user->emp_hiredate) ?></dd>
            <!-- <dt scope="row"><?= __('Emp Username') ?></dt>
            <dd><?= h($user->emp_username) ?></dd>
            <dt scope="row"><?= __('Password') ?></dt> -->
            <!-- <dd><?= h($user->password) ?></dd> -->
            <!-- <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($user->id) ?></dd> -->
            <!-- <dt scope="row"><?= __('Createdby Id') ?></dt>
            <dd><?= $this->Number->format($user->createdby_id) ?></dd> -->
     
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($user->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($user->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
