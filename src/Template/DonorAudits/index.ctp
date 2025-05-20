<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Donor Audits

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
                  <!-- <th>auditor</th> -->
                  <!-- <th>audit_reference</th>
                  <th>audit_collectiondate</th>
                  <th>audit_processdate</th>
                  <th>week</th>
                  <th>tenureship</th> -->
                  <th>Audit Date</th>
                  <th>Audit Time</th>
                  <!-- <th>audit_count</th>
                  <th>fatal_score</th>
                  <th>nonfatal_score</th> -->
                  <th>Overall Score</th>
                  <!-- <th>rft</th>
                  <th>fatal_hipaa</th>
                  <th>nonfatal_greeting</th>
                  <th>nonfatal_purpose</th>
                  <th>nonfatal_callproper</th>
                  <th>nonfatal_updateacc</th>
                  <th>nonfatal_doc</th>
                  <th>nonfatal_log</th>
                  <th>nonfatal_handling</th>
                  <th>call_summary</th> -->
                  <th>Created Date</th>
                  <!-- <th>modified</th> -->
                  <th class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($donorAudits as $donorAudit): ?>
                <tr>
                  <!-- <td><?= $this->Number->format($donorAudit->id) ?></td> -->
                  <td><?= $donorAudit->has('user') ? $this->Html->link($donorAudit->user->emp_fullname, ['controller' => 'Users', 'action' => 'view', $donorAudit->user->id]) : '' ?></td>
                  <!-- <td><?= h($donorAudit->auditor) ?></td> -->
                  <!-- <td><?= h($donorAudit->audit_reference) ?></td>
                  <td><?= h($donorAudit->audit_collectiondate) ?></td>
                  <td><?= h($donorAudit->audit_processdate) ?></td>
                  <td><?= h($donorAudit->week) ?></td>
                  <td><?= h($donorAudit->tenureship) ?></td> -->
                  <td><?= h($donorAudit->audit_date) ?></td>
                  <td><?= h($donorAudit->audit_time) ?></td>
                  <!-- <td><?= h($donorAudit->audit_count) ?></td>
                  <td><?= h($donorAudit->fatal_score) ?></td>
                  <td><?= h($donorAudit->nonfatal_score) ?></td> -->
                  <td><?= h($donorAudit->overall_score) ?></td>
                  <!-- <td><?= h($donorAudit->rft) ?></td>
                  <td><?= h($donorAudit->fatal_hipaa) ?></td>
                  <td><?= h($donorAudit->nonfatal_greeting) ?></td>
                  <td><?= h($donorAudit->nonfatal_purpose) ?></td>
                  <td><?= h($donorAudit->nonfatal_callproper) ?></td>
                  <td><?= h($donorAudit->nonfatal_updateacc) ?></td>
                  <td><?= h($donorAudit->nonfatal_doc) ?></td>
                  <td><?= h($donorAudit->nonfatal_log) ?></td>
                  <td><?= h($donorAudit->nonfatal_handling) ?></td>
                  <td><?= h($donorAudit->call_summary) ?></td> -->
                  <td><?= h($donorAudit->created) ?></td>
                  <!-- <td><?= h($donorAudit->modified) ?></td> -->
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $donorAudit->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $donorAudit->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $donorAudit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $donorAudit->id), 'class'=>'btn btn-danger btn-xs']) ?>
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