<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QaCoaching $qaCoaching
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Qa Coaching
      <small><?php echo __('Add'); ?></small>
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
          <?php echo $this->Form->create($qaCoaching, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('emp_id', ['options' => $users, 'empty' => true]);
                echo $this->Form->control('coaching_month');
                echo $this->Form->control('coaching_connect');
                echo $this->Form->control('coaching_engage');
                echo $this->Form->control('coaching_check');
                echo $this->Form->control('coaching_notes');
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
