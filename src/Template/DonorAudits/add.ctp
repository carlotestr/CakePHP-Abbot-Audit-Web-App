<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DonorAudit $donorAudit
 */
?>

<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>
<!-- Bootstrap time Picker -->
<?php echo $this->Html->css('AdminLTE./plugins/timepicker/bootstrap-timepicker.min', ['block' => 'css']); ?>

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
            <div class="row">
              <div class="col-md-3">
                  <?php   echo $this->Form->control('emp_id', ['class'=>'form-control ', 'options' => $users, 'label'=>'Agent Name','empty' => true]); ?>
              </div>
              <div class="col-md-3">
              <?php    echo $this->Form->control('auditor', ['class'=>'form-control','placeholder' => $login["emp_fullname"],'disabled' => 'true']); ?>
              </div>
              <div class="col-md-3">
              <?php      echo $this->Form->control('audit_reference'); ?>
              </div>
            </div>

            
            <div class="row">
              <div class="col-md-3">
              <label>Audit Collection Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_collectiondate" class="form-control pull-right datepicker">
                </div> 
              </div>

              <div class="col-md-3">
              <label>Audit Process Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_processdate" class="form-control pull-right datepicker">
                </div>         
              </div>

              <div class="col-md-3">
              <label>Audit Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_date" class="form-control pull-right datepicker">
                </div>    
              </div>

              <div class="col-md-3">
                 <!-- time Picker -->
            
                <div class="form-group">
                  <label>Audit Time:</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" name="audit_time" class="form-control timepicker">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-3">
                 <?php          echo $this->Form->control('week', ['class'=>'form-control ', 'options' => $weekOptions, 'empty' => true]); ?>
              </div>

              <div class="col-md-3">
                 <?php      echo $this->Form->control('tenureship', ['class'=>'form-control ', 'options' => $tenureshipOptions, 'empty' => true]); ?>
              </div>
              <div class="col-md-3">
                 <?php                 echo $this->Form->control('fatal_score', ['class'=>'form-control ', 'options' => $fatal_score_Options, 'empty' => true,'label'=>'Fatal Score']); ?>
              </div>

              <div class="col-md-3">
                 <?php                 echo $this->Form->control('rft', ['class'=>'form-control ', 'options' => $booleanOptions, 'empty' => true,'label'=>'Right First Time']); ?>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-3">
                 <?php           echo $this->Form->control('nonfatal_score'); ?>
              </div>
              <div class="col-md-3">
                 <?php     echo $this->Form->control('fatal_hipaa', ['class'=>'form-control ', 'options' => $booleanOptions, 'empty' => true]); ?>
              </div>

              <div class="col-md-3">
                 <?php       echo $this->Form->control('nonfatal_greeting', ['class'=>'form-control ', 'options' => $nonfatal_greeting_Options, 'empty' => true]); ?>
              </div>

              <div class="col-md-3">
                 <?php       echo $this->Form->control('nonfatal_purpose', ['class'=>'form-control ', 'options' => $nonfatal_purpose_Options, 'empty' => true]);?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                 <?php      echo $this->Form->control('nonfatal_callproper', ['class'=>'form-control select2', 'options' => $nonfatal_callproper, 'empty' => true]); ?>
              </div>
              <div class="col-md-3">
                 <?php          echo $this->Form->control('nonfatal_updateacc', ['class'=>'form-control select2', 'options' => $nonfatal_updateacc, 'empty' => true]); ?>
              </div>

              <div class="col-md-3">
                 <?php                
                echo $this->Form->control('nonfatal_doc', ['class'=>'form-control select2', 'options' => $nonfatal_doc, 'empty' => true]); ?>
              </div>

              <div class="col-md-3">
                 <?php        echo $this->Form->control('nonfatal_log', ['class'=>'form-control select2', 'options' => $nonfatal_log, 'empty' => true]);?>
              </div>
            </div>

            

            <div class="row">
            <div class="col-md-3">
                 <?php                
               echo $this->Form->control('nonfatal_handling', ['class'=>'form-control select2', 'options' => $nonfatal_handling, 'empty' => true]); ?>
              </div>
              <div class="col-md-9">
                 <?php  echo $this->Form->control('call_summary'); ?>
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
<!-- bootstrap time picker -->
<?php echo $this->Html->script('AdminLTE./plugins/timepicker/bootstrap-timepicker.min', ['block' => 'script']); ?>


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

     //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

  })
</script>
<?php $this->end(); ?>