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
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('auditor') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_reference') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_collectiondate') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_processdate') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('week') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tenureship') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_time') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_count') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('fatal_score') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_score') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('overall_score') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('rft') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('fatal_clientinfo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('fatal_donorssn') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('fatal_testinfo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('fatal_routing') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_testnum') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_doc') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_donorinfo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('call_summary') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($batAudits as $batAudit): ?>
                <tr>
                  <td><?= $this->Number->format($batAudit->id) ?></td>
                  <td><?= $batAudit->has('user') ? $this->Html->link($batAudit->user->id, ['controller' => 'Users', 'action' => 'view', $batAudit->user->id]) : '' ?></td>
                  <td><?= h($batAudit->auditor) ?></td>
                  <td><?= h($batAudit->audit_reference) ?></td>
                  <td><?= h($batAudit->audit_collectiondate) ?></td>
                  <td><?= h($batAudit->audit_processdate) ?></td>
                  <td><?= h($batAudit->week) ?></td>
                  <td><?= h($batAudit->tenureship) ?></td>
                  <td><?= h($batAudit->audit_date) ?></td>
                  <td><?= h($batAudit->audit_time) ?></td>
                  <td><?= h($batAudit->audit_count) ?></td>
                  <td><?= h($batAudit->fatal_score) ?></td>
                  <td><?= h($batAudit->nonfatal_score) ?></td>
                  <td><?= h($batAudit->overall_score) ?></td>
                  <td><?= h($batAudit->rft) ?></td>
                  <td><?= h($batAudit->fatal_clientinfo) ?></td>
                  <td><?= h($batAudit->fatal_donorssn) ?></td>
                  <td><?= h($batAudit->fatal_testinfo) ?></td>
                  <td><?= h($batAudit->fatal_routing) ?></td>
                  <td><?= h($batAudit->nonfatal_testnum) ?></td>
                  <td><?= h($batAudit->nonfatal_doc) ?></td>
                  <td><?= h($batAudit->nonfatal_donorinfo) ?></td>
                  <td><?= h($batAudit->call_summary) ?></td>
                  <td><?= h($batAudit->created) ?></td>
                  <td><?= h($batAudit->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $batAudit->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $batAudit->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batAudit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batAudit->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
  </div>
</section>