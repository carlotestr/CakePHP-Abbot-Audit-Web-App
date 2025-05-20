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

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Hire Date:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="emp_hiredate" value="<?php echo $user->emp_hiredate;  ?>" class="form-control pull-right" id="datepicker">
                  </div>               
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
              <div class="form-group input text">
               <label class="control-label" for="employee_id">Employee Id</label>
                  <input type="text" name="employee_id" id="employee_id" value="<?php echo $user->employee_id; ?>" class="form-control" maxlength="255"/>          
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <?php echo $this->Form->control('emp_firstname', array('label' => 'First Name', 'autocomplete' => 'off')); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <?php  echo $this->Form->control('emp_lastname', array('label' => 'Last Name', 'autocomplete' => 'off')); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <?php      echo $this->Form->control('emp_email', array('label' => 'E-mail', 'autocomplete' => 'off')); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
              <?php 
                   echo $this->Form->control('emp_position' , ['class'=>'form-control ', 'options' => $employeePositionOptions, 'value' => $user->emp_position, 'label' => 'Position']);
                    ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
              <?php     echo $this->Form->control('emp_team', ['options' => [
                    'Breathe Alcohol' => 'Breathe Alcohol', 
                    'Donor Contact' => 'Donor Contact'
                  ] ,'label' => 'Team'
                ]);
                  ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
              <?php                  echo $this->Form->control('emp_manager', ['class'=>'form-control ', 'options' => $managersOptions, 'empty' => true, 'label' => 'Manager']); ?>
              </div>
            </div>
             
            <div class="row">
              <div class="col-md-4">
                 <?php  echo $this->Form->control('emp_supervisor', ['class'=>'form-control ','options' => $supervisorOptions, 'empty' => true,  'label' => 'Supervisor']); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <?php      echo $this->Form->control('emp_username', array('label' => 'Username', 'autocomplete' => 'off')); ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
              <div class="box box-warning">
              <div class="box-header">
                <h3 class="box-title">Password Reset</h3>
              </div>
              <div class="box-body">
                <?php echo $this->Html->link(__('Send Temporary User Password'), ['controller' => 'Users', 'action' => 'sendTemporaryPassword',$user->emp_email],['class'=>'btn-sm btn-warning pull-left']) ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              Temporary password will send to user associated email.
              </div>
            </div>
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
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>
<?php $this->end(); ?>
