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
                  <th scope="col"><?= $this->Paginator->sort('fatal_hipaa') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_greeting') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_purpose') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_callproper') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_updateacc') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_doc') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_log') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('nonfatal_handling') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('call_summary') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($donorAudits as $donorAudit): ?>
                <tr>
                  <td><?= $this->Number->format($donorAudit->id) ?></td>
                  <td><?= $donorAudit->has('user') ? $this->Html->link($donorAudit->user->id, ['controller' => 'Users', 'action' => 'view', $donorAudit->user->id]) : '' ?></td>
                  <td><?= h($donorAudit->auditor) ?></td>
                  <td><?= h($donorAudit->audit_reference) ?></td>
                  <td><?= h($donorAudit->audit_collectiondate) ?></td>
                  <td><?= h($donorAudit->audit_processdate) ?></td>
                  <td><?= h($donorAudit->week) ?></td>
                  <td><?= h($donorAudit->tenureship) ?></td>
                  <td><?= h($donorAudit->audit_date) ?></td>
                  <td><?= h($donorAudit->audit_time) ?></td>
                  <td><?= h($donorAudit->audit_count) ?></td>
                  <td><?= h($donorAudit->fatal_score) ?></td>
                  <td><?= h($donorAudit->nonfatal_score) ?></td>
                  <td><?= h($donorAudit->overall_score) ?></td>
                  <td><?= h($donorAudit->rft) ?></td>
                  <td><?= h($donorAudit->fatal_hipaa) ?></td>
                  <td><?= h($donorAudit->nonfatal_greeting) ?></td>
                  <td><?= h($donorAudit->nonfatal_purpose) ?></td>
                  <td><?= h($donorAudit->nonfatal_callproper) ?></td>
                  <td><?= h($donorAudit->nonfatal_updateacc) ?></td>
                  <td><?= h($donorAudit->nonfatal_doc) ?></td>
                  <td><?= h($donorAudit->nonfatal_log) ?></td>
                  <td><?= h($donorAudit->nonfatal_handling) ?></td>
                  <td><?= h($donorAudit->call_summary) ?></td>
                  <td><?= h($donorAudit->created) ?></td>
                  <td><?= h($donorAudit->modified) ?></td>
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
  </div>
</section>