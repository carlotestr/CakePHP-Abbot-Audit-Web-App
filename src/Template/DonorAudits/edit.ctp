<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DonorAudit $donorAudit
 */
?>

<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Donor Audit
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
          <?php echo $this->Form->create($donorAudit, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('emp_id', ['class'=>'form-control select2', 'options' => $users, 'empty' => true]);
                echo $this->Form->control('auditor', ['class'=>'form-control select2', 'options' => $users, 'empty' => true]);
                echo $this->Form->control('audit_reference');
              ?>

              <div class="form-group">
                <label>Audit Collection Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_collectiondate" value="<?php echo $donorAudit->audit_collectiondate; ?>" class="form-control pull-right datepicker">
                </div>               
              </div>

              <div class="form-group">
                <label>Audit Process Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_processdate" value="<?php echo $donorAudit->audit_processdate; ?>" class="form-control pull-right datepicker">
                </div>               
              </div>

              <?php
                echo $this->Form->control('week');
                echo $this->Form->control('tenureship');
              ?>

              <div class="form-group">
                <label>Audit Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="audit_date" value="<?php echo $donorAudit->audit_date; ?>" class="form-control pull-right datepicker">
                </div>               
              </div>

              <?php
                echo $this->Form->control('audit_time');
                echo $this->Form->control('audit_count',['value'=>$donorAudit->audit_count,'disabled'=>'true']);
                echo $this->Form->control('fatal_score');
                echo $this->Form->control('nonfatal_score');
                echo $this->Form->control('overall_score',['value' =>$donorAudit->overall_score,'disabled'=>'true']);
                echo $this->Form->control('rft', ['class'=>'form-control select2', 'options' => $booleanOptions, 'label'=>'Right First Time', 'value' => $donorAudit->rft]);
                echo $this->Form->control('fatal_hipaa', ['class'=>'form-control select2', 'options' => $booleanOptions, 'value' => $donorAudit->fatal_hipaa]);
                echo $this->Form->control('nonfatal_greeting', ['class'=>'form-control select2', 'options' => $nonfatal_greeting_Options, 'value' => $donorAudit->nonfatal_greeting]);
                echo $this->Form->control('nonfatal_purpose', ['class'=>'form-control select2', 'options' => $nonfatal_purpose_Options, 'value' => $donorAudit->nonfatal_purpose]);
                echo $this->Form->control('nonfatal_callproper', ['class'=>'form-control select2', 'options' => $nonfatal_callproper, 'value' => $donorAudit->nonfatal_callproper]);
                echo $this->Form->control('nonfatal_updateacc', ['class'=>'form-control select2', 'options' => $nonfatal_updateacc, 'value' => $donorAudit->nonfatal_updateacc]);
                echo $this->Form->control('nonfatal_doc', ['class'=>'form-control select2', 'options' => $nonfatal_doc, 'value' => $donorAudit->nonfatal_doc]);
                echo $this->Form->control('nonfatal_log', ['class'=>'form-control select2', 'options' => $nonfatal_log, 'value' => $donorAudit->nonfatal_log]);
                echo $this->Form->control('nonfatal_handling', ['class'=>'form-control select2', 'options' => $nonfatal_handling, 'value' => $donorAudit->nonfatal_handling]);
                echo $this->Form->control('call_summary',['value'=>$donorAudit->call_summary]);
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