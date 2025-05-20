
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bat Audits

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
                  <!-- <th>Auditor</th> -->
                  <th>Audit Reference</th>
                  <!-- <th>audit_collectiondate</th> -->
                  <!-- <th>audit_processdate</th> -->
                  <!-- <th>week</th> -->
                  <!-- <th>tenureship</th> -->
                  <th>Audit Date</th>
                  <th>Audit Time</th>
                  <th>Audit Count</th>
                  <!-- <th>fatal_score</th> -->
                  <!-- <th>nonfatal_score</th> -->
                  <th>Over-all Score</th>
                  <!-- <th>rft</th> -->
                  <!-- <th>fatal_clientinfo</th> -->
                  <!-- <th>fatal_donorssn</th> -->
                  <!-- <th>fatal_testinfo</th> -->
                  <!-- <th>fatal_routing</th> -->
                  <!-- <th>nonfatal_testnum</th> -->
                  <!-- <th>nonfatal_doc</th> -->
                  <!-- <th>nonfatal_donorinfo</th> -->
                  <!-- <th>call_summary</th> -->
                  <!-- <th>created</th> -->
                  <!-- <th>modified</th> -->
                  <th class="actions text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($batAudits as $batAudit): ?>
                <tr>
                   <!-- <td><?= $this->Number->format($batAudit->id) ?></td> -->
                  <td><?= $batAudit->has('user') ? $this->Html->link($batAudit->user->emp_fullname, ['controller' => 'Users', 'action' => 'view', $batAudit->user->id]) : '' ?></td>
              

                  <!-- <td><?= h($batAudit->auditor) ?></td> -->
                  <td><?= h($batAudit->audit_reference) ?></td>
                  <!-- <td><?= h($batAudit->audit_collectiondate) ?></td> -->
                  <!-- <td><?= h($batAudit->audit_processdate) ?></td> -->
                  <!-- <td><?= h($batAudit->week) ?></td> -->
                  <!-- <td><?= h($batAudit->tenureship) ?></td> -->
                  <td><?= h($batAudit->audit_date) ?></td>
                  <td><?= h($batAudit->audit_time) ?></td>
                  <td><?= h($batAudit->audit_count) ?></td>
                  <!-- <td><?= h($batAudit->fatal_score) ?></td> -->
                  <!-- <td><?= h($batAudit->nonfatal_score) ?></td> -->
                  <td><?= h($batAudit->overall_score) ?></td>
                  <!-- <td><?= h($batAudit->rft) ?></td> -->
                  <!-- <td><?= h($batAudit->fatal_clientinfo) ?></td> -->
                  <!-- <td><?= h($batAudit->fatal_donorssn) ?></td> -->
                  <!-- <td><?= h($batAudit->fatal_testinfo) ?></td> -->
                  <!-- <td><?= h($batAudit->fatal_routing) ?></td> -->
                  <!-- <td><?= h($batAudit->nonfatal_testnum) ?></td> -->
                  <!-- <td><?= h($batAudit->nonfatal_doc) ?></td> -->
                  <!-- <td><?= h($batAudit->nonfatal_donorinfo) ?></td> -->
                  <!-- <td><?= h($batAudit->call_summary) ?></td> -->
                  <!-- <td><?= h($batAudit->created) ?></td> -->
                  <!-- <td><?= h($batAudit->modified) ?></td> -->
                  <td>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $batAudit->id], ['class'=>'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $batAudit->id], ['class'=>'btn btn-warning btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batAudit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batAudit->id), 'class'=>'btn btn-danger btn-xs']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>id</th>
                  <th>emp_id</th>
                  <th>auditor</th>
                  <th>audit_reference</th>
                  <th>audit_collectiondate</th>
                  <th>audit_processdate</th>
                  <th>week</th>
                  <th>tenureship</th>
                  <th>audit_date</th>
                  <th>audit_time</th>
                  <th>audit_count</th>
                  <th>fatal_score</th>
                  <th>nonfatal_score</th>
                  <th>overall_score</th>
                  <th>rft</th>
                  <th>fatal_clientinfo</th>
                  <th>fatal_donorssn</th>
                  <th>fatal_testinfo</th>
                  <th>fatal_routing</th>
                  <th>nonfatal_testnum</th>
                  <th>nonfatal_doc</th>
                  <th>nonfatal_donorinfo</th>
                  <th>call_summary</th>
                  <th>created</th>
                  <th>modified</th>
                  <th> <?= __('Actions') ?></th>
                </tr>
                </tfoot> -->
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
      'autoWidth'   : true,
      'scrollX': true
    })
  })
</script>
<?php $this->end(); ?>