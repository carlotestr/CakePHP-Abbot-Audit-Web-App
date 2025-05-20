
<section class="content">

  <div class="row">
  <div class="col-md-11" style="margin: 0 auto !important; padding: 0 !important; float: none !important;">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <?= $this->Form->create($user, ['type' => 'file']) ?>
              <div class="box-body">
                  <div class="col-md-6">
                  <?php
                    // echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true]);
                  echo $this->Form->input('image', ['type' => 'file', 'label' => 'Profile Photo', 'id' => 'exampleInputFile']);
                  echo $this->Form->control('emp_firstname');
                  echo $this->Form->input('emp_hiredate', ['label' => 'Employee Hire Date', 'id' => 'datepicker','type' => 'text', 'class' => 'form-control', 'data-date-format' => 'mm/dd/yyyy', 'data-provide'=>'datepicker-inline' ]);
                    // echo $this->Form->control('password');
                    //echo $this->Form->control('gender', ['options' => $user["gender"], 'empty' => true]);
                  ?>
                     <div class="form-group">
                      <label>Employee Manager</label>
                      <select name="emp_manager" class="form-control">
                      <?php

                        if ($user["emp_manager"] != "") {
                            echo '<option selected value="'.$user->emp_manager.'">'.$user->emp_manager.'</option>';
                            foreach ($supervisorOptions as $key => $supervisor) {
                                echo '<option value="'.$supervisor->id.'">'.$supervisor->id.'</option>';
                              }
                        } else {
                              echo '<option selected value=""></option>';
                              foreach ($managersOptions as $key => $manager) {
                                echo '<option value="'.$manager->id.'">'.$manager->emp_fullname.'</option>';
                              }
                        }

                      ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label>Employee Supervisor</label>
                      <select name="emp_supervisor" class="form-control">
                      <?php

                        if ($user["emp_supervisor"] != "") {
                            echo '<option selected value="'.$user->emp_supervisor.'">'.$user->emp_supervisor.'</option>';
                        } else {
                              echo '<option selected value=""></option>';
                              foreach ($supervisorOptions as $key => $supervisor) {
                                echo '<option value="'.$supervisor->id.'">'.$supervisor->id.'</option>';
                              }
                        }

                      ?>

                      </select>
                    </div>

                    

                </div>

                <div class="col-md-6">
                <?php
                    echo $this->Form->control('emp_username');
                    echo $this->Form->control('emp_lastname');
                    echo $this->Form->control('emp_email');
                ?>
                <div class="form-group">
                  <?php
                    //echo $this->Form->input('image', ['type' => 'file', 'label' => 'Profile Photo', 'id' => 'exampleInputFile']);
                   ?>
                </div>

                <div class="form-group">
                      <label>Employee Team</label>
                      <select name="emp_team" class="form-control">
                      <?php

                        if ($user["emp_team"] != "") {
                            echo '<option selected value="'.$user["emp_team"].'">'.$user["emp_team"].'</option>';
                        } else {
                            echo '<option selected value="">Select Team Options</option>';
                            echo '<option value="Breath Alcohol">Breath Alcohol</option>';
                            echo '<option value="Donor Contact">Donor Contact</option>';
                        }

                      ?>

                      </select>
                    </div>
              
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div align="center"><?= $this->Form->button(__('Submit',['class' =>'btn btn-primary'])) ?>
                </div>
              </div>
            <!-- </form> -->
            <?= $this->Form->end() ?>


          </div>

          <!-- /.box -->
        </div>

  </div>
  </section>


  <?php
  $this->Html->css([
      'AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker',
      'AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3',
      'AdminLTE./plugins/iCheck/all',
      'AdminLTE./bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min',
      'AdminLTE./bower_components/select2/dist/css/select2.min',
    ],
    ['block' => 'css']);

  $this->Html->script([
    'AdminLTE./bower_components/select2/dist/js/select2.full.min',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
    'AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker',
    'AdminLTE./bower_components/bootstrap-datepicker/js/bootstrap-datepicker',
    'AdminLTE./bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min',
    'AdminLTE./bower_components/bootstrap-timepicker/js/bootstrap-timepicker',
  ],
  ['block' => 'script']);
  ?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>
