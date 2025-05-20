<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    QA Coachings

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
                  <th>Month</th>
                  <th>Connect</th>
                  <th>Engage</th>
                  <th>Check</th>
                  <th>Created Date</th>
                  <th>Modified Date</th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($qaCoachings as $qaCoaching): ?>
                <tr>
                  <!-- <td><?= $this->Number->format($qaCoaching->id) ?></td> -->
                  <td><?= $qaCoaching->has('user') ? $this->Html->link($qaCoaching->user->emp_fullname, ['controller' => 'Users', 'action' => 'view', $qaCoaching->user->id]) : '' ?></td>
                  <td><?= h($qaCoaching->coaching_month) ?></td>
                  <td><?= h($qaCoaching->coaching_connect) ?></td>
                  <td><?= h($qaCoaching->coaching_engage) ?></td>
                  <td><?= h($qaCoaching->coaching_check) ?></td>
                  <td><?= h($qaCoaching->created) ?></td>
                  <td><?= h($qaCoaching->modified) ?></td>
                  <td class="actions text-center">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $qaCoaching->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qaCoaching->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qaCoaching->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qaCoaching->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>id</th>
                  <th>emp_id</th>
                  <th>coaching_month</th>
                  <th>coaching_connect</th>
                  <th>coaching_engage</th>
                  <th>coaching_check</th>
                  <th>created</th>
                  <th>modified</th>
                  <th class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


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