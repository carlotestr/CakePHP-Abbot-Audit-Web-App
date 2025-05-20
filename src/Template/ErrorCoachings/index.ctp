<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Error Coachings

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
                  <th>Employee ID</th>
                  <th>Name</th>
                  <!-- <th>audit_reference</th>
                  <th>audit_collectiondate</th>
                  <th>audit_processdate</th>
                  <th>week</th> -->
                  <th>Audit Date</th>
                  <th>Over All Score</th>
                  <!-- <th>call_summary</th>
                  <th>why_one</th>
                  <th>why_two</th>
                  <th>why_three</th>
                  <th>why_four</th>
                  <th>why_five</th>
                  <th>coaching_summary</th>
                  <th>action_plan</th> -->
                  <th>Created Date</th>
                  <!-- <th>modified</th> -->
                  <th class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($errorCoachings as $errorCoaching): ?>
                <tr>
                  <td><?= h($errorCoaching->user->employee_id)?></td>
                  <td><?= h($errorCoaching->user->emp_fullname)?></td>
                  <!-- <td><?= h($errorCoaching->audit_reference) ?></td>
                  <td><?= h($errorCoaching->audit_collectiondate) ?></td>
                  <td><?= h($errorCoaching->audit_processdate) ?></td>
                  <td><?= h($errorCoaching->week) ?></td> -->
                  <td><?= h($errorCoaching->audit_date) ?></td>
                  <td><?= h($errorCoaching->overall_score) ?></td>
                  <!-- <td><?= h($errorCoaching->call_summary) ?></td>
                  <td><?= h($errorCoaching->why_one) ?></td>
                  <td><?= h($errorCoaching->why_two) ?></td>
                  <td><?= h($errorCoaching->why_three) ?></td>
                  <td><?= h($errorCoaching->why_four) ?></td>
                  <td><?= h($errorCoaching->why_five) ?></td>
                  <td><?= h($errorCoaching->coaching_summary) ?></td>
                  <td><?= h($errorCoaching->action_plan) ?></td> -->
                  <td><?= h($errorCoaching->created) ?></td>
                  <!-- <td><?= h($errorCoaching->modified) ?></td> -->
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $errorCoaching->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $errorCoaching->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $errorCoaching->id], ['confirm' => __('Are you sure you want to delete # {0}?', $errorCoaching->id), 'class'=>'btn btn-danger btn-xs']) ?>
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