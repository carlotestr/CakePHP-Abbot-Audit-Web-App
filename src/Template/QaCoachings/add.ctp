<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QaCoaching $qaCoaching
 */
?>

<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>

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
            <div class="row">
              <div class="col-md-4">
                <?php    echo $this->Form->control('emp_id', ['class'=>'form-control ', 'options' => $users, 'empty' => true,'label' => 'Employee']); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <?php echo $this->Form->control('coaching_month',['class'=>'form-control ', 'options' => $monthOptions, 'empty' => true]); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <?php     echo $this->Form->control('coaching_connect'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <?php   echo $this->Form->control('coaching_engage'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <?php                echo $this->Form->control('coaching_check');?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <?php  
                echo $this->Form->control('coaching_notes'); ?>
              </div>
            </div>
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


<!-- daterange picker -->
<?php //echo $this->Html->css('AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker', ['block' => 'css']); ?>
<!-- bootstrap datepicker -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min', ['block' => 'script']); ?>
<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>


<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
   
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('.datepicker').datepicker({
      'setDate': new Date(),
      autoclose: true
    })

  })
</script>
<?php $this->end(); ?>