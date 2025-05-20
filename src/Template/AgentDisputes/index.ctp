<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Agent Disputes

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
                  <!-- <th>id</th> -->
                  <th>Name</th>
                  <th>Audit Reference</th>
                  <th>Audit Collection Date</th>
                  <th>Audit Process Date</th>
                  <!-- <th>week</th> -->
                  <th>Audit Date</th>
                  <th>Overall Score</th>
                  <!-- <th>rebuttal_reason</th>
                  <th>new_score</th>
                  <th>dispute_summary</th> -->
                  <!-- <th>Created Date</th> -->
                  <!-- <th>modified</th> -->
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($agentDisputes as $agentDispute): ?>
                <tr>
                  <!-- <td><?= $this->Number->format($agentDispute->id) ?></td> -->
                  <td><?= h($agentDispute->user->emp_fullname)  ?></td>
                  <td><?= h($agentDispute->audit_reference) ?></td>
                  <td><?= h($agentDispute->audit_collectiondate) ?></td>
                  <td><?= h($agentDispute->audit_processdate) ?></td>
                  <!-- <td><?= h($agentDispute->week) ?></td> -->
                  <td><?= h($agentDispute->audit_date) ?></td>
                  <!-- <td><?= h($agentDispute->overall_score) ?></td> -->
                  <td><?= h($agentDispute->rebuttal_reason) ?></td>
                  <!-- <td><?= h($agentDispute->new_score) ?></td>
                  <td><?= h($agentDispute->dispute_summary) ?></td> -->
                  <!-- <td><?= h($agentDispute->created) ?></td> -->
                  <!-- <td><?= h($agentDispute->modified) ?></td> -->
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $agentDispute->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $agentDispute->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $agentDispute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agentDispute->id), 'class'=>'btn btn-danger btn-xs']) ?>
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