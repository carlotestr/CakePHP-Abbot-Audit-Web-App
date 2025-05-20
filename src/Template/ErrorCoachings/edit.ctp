<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ErrorCoaching $errorCoaching
 */
?>

<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Error Coaching
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
          <?php echo $this->Form->create($errorCoaching, ['role' => 'form']); ?>
            <div class="box-body">
            <div class="row">
              <div class="col-md-2">
                  <?php     echo $this->Form->control('emp_id', ['class'=>'form-control ', 'options' => $users, 'empty' => true, 'label' => 'Agent Name']); ?>
              </div>
              <div class="col-md-2">
                    <?php              echo $this->Form->control('audit_reference'); ?>
              </div>
              <div class="col-md-2">
              <label>Audit Collection Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_collectiondate" value="<?php echo $errorCoaching->audit_collectiondate;  ?>" class="form-control pull-right datepicker">
                </div> 
              </div>
              <div class="col-md-2">
              <label>Audit Process Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_processdate" value="<?php echo $errorCoaching->audit_processdate; ?>" class="form-control pull-right datepicker">
                </div> 
              </div>
              <div class="col-md-2">
                <label>Audit Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_date" value="<?php echo $errorCoaching->audit_date; ?>" class="form-control pull-right datepicker">
                </div>
              </div>
              <div class="col-md-2">
              <?php 
                echo $this->Form->control('week', ['class'=>'form-control ', 'options' => $weekOptions, 'empty' => true]);
              ?>  
              </div>
              

            </div>
<!-- TODO -->
     
              <?php
                echo $this->Form->control('overall_score',['value' => $errorCoaching->overall_score, 'disabled' => true]);
                echo $this->Form->control('call_summary');
                echo $this->Form->control('why_one');
                echo $this->Form->control('why_two');
                echo $this->Form->control('why_three');
                echo $this->Form->control('why_four');
                echo $this->Form->control('why_five');
                echo $this->Form->control('coaching_summary');
                echo $this->Form->control('action_plan');
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
