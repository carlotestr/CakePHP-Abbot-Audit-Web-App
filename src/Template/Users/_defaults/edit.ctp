<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User
      <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($user, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('emp_hiredate', ['empty' => true]);
                echo $this->Form->control('emp_firstname');
                echo $this->Form->control('emp_lastname');
                echo $this->Form->control('emp_fullname');
                echo $this->Form->control('emp_email');
                echo $this->Form->control('emp_position');
                echo $this->Form->control('emp_team');
                echo $this->Form->control('emp_manager');
                echo $this->Form->control('emp_supervisor');
                echo $this->Form->control('emp_username');
                echo $this->Form->control('emp_password');
                echo $this->Form->control('createdby_id');
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
