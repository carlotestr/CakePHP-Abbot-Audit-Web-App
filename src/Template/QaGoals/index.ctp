<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    QA Goals

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-10">          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="display: none;">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <!-- <th>id</th> -->
                  <th>Name</th>
                  <th>Title</th>
                  <th>Details</th>
                  <th>Progress</th>
                  <th>Deadline</th>
                  <!-- <th>created</th>
                  <th>modified</th> -->
                  <th class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($qaGoals as $qaGoal): ?>
                <tr>
                  <!-- <td><?= $this->Number->format($qaGoal->id) ?></td> -->
                  <td><?= $qaGoal->has('user') ? $this->Html->link($qaGoal->user->emp_fullname, ['controller' => 'Users', 'action' => 'view', $qaGoal->user->id]) : '' ?></td>
                  <td><?= h($qaGoal->goal_title) ?></td>
                  <td><?= h($qaGoal->goal_details) ?></td>
                  <td><?= h($qaGoal->goal_progress) ?></td>
                  <td><?= h($qaGoal->goal_deadline) ?></td>
                  <!-- <td><?= h($qaGoal->created) ?></td>
                  <td><?= h($qaGoal->modified) ?></td> -->
                  <td class="actions text-center">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $qaGoal->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qaGoal->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qaGoal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qaGoal->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
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


        <div class="col-xs-2">          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leader Board</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <ol type="1">
                <?php foreach ($merged_audit_results as $merged_audit_result): ?>
                  <li><?php echo $merged_audit_result->user->emp_fullname.' - '.$merged_audit_result->overall_score; ?></li>
                <?php endforeach; ?>
              </ol>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
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
      'autoWidth'   : false,
      'scrollX': true
    })
  })
</script>
<?php $this->end(); ?>