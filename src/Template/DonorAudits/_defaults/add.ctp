<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DonorAudit $donorAudit
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Donor Audit
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
          <?php echo $this->Form->create($donorAudit, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('emp_id', ['options' => $users, 'empty' => true]);
                echo $this->Form->control('auditor');
                echo $this->Form->control('audit_reference');
                echo $this->Form->control('audit_collectiondate');
                echo $this->Form->control('audit_processdate');
                echo $this->Form->control('week');
                echo $this->Form->control('tenureship');
                echo $this->Form->control('audit_date', ['empty' => true]);
                echo $this->Form->control('audit_time');
                echo $this->Form->control('audit_count');
                echo $this->Form->control('fatal_score');
                echo $this->Form->control('nonfatal_score');
                echo $this->Form->control('overall_score');
                echo $this->Form->control('rft');
                echo $this->Form->control('fatal_hipaa');
                echo $this->Form->control('nonfatal_greeting');
                echo $this->Form->control('nonfatal_purpose');
                echo $this->Form->control('nonfatal_callproper');
                echo $this->Form->control('nonfatal_updateacc');
                echo $this->Form->control('nonfatal_doc');
                echo $this->Form->control('nonfatal_log');
                echo $this->Form->control('nonfatal_handling');
                echo $this->Form->control('call_summary');
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
