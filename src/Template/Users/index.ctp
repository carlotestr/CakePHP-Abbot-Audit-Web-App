<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Users

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="display: none;">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <!-- <th>ID</th> -->
                  <th>Employee ID</th>
                  <th>Hire Date</th>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Position</th>
                  <th>Team</th>
                  <!-- <th>Supervisor</th> -->
                  <!-- <th>Username</th> -->
                  <!-- <th>Created</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>  
                <tr>
                  <!-- <td><?= $this->Number->format($user->id) ?></td> -->
                  <td><?= h($user->employee_id) ?></td>
                  <td><?= h($user->emp_hiredate) ?></td>
                  <td><?= h($user->emp_firstname) ?></td>
                  <td><?= h($user->emp_lastname) ?></td>
                  <td><?= h($user->emp_email) ?></td>
                  <td><?= h($user->emp_position) ?></td>
                  <td><?= h($user->emp_team) ?></td>
                  <!-- <td><?= h($user->emp_supervisor) ?></td> -->
                  <!-- <td><?= h($user->emp_username) ?></td> -->
                  <!-- <td><?= h($user->created) ?></td> -->
                  <td><?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class'=>'btn btn-danger btn-xs']) ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- DataTables -->
<?php echo $this->Html->css('AdminLTE./bower_components/datatables.net-bs/css/dataTables.bootstrap.min', ['block' => 'css']); ?>

<!-- DataTables -->
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net/js/jquery.dataTables.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net-bs/js/dataTables.bootstrap.min', ['block' => 'script']); ?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<?php $this->end(); ?>