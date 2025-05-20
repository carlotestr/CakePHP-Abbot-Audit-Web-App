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
                  <th scope="col"><?= $this->Paginator->sort('audit_reference') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_collectiondate') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_processdate') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('week') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('audit_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('overall_score') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('rebuttal_reason') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('new_score') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('dispute_summary') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($agentDisputes as $agentDispute): ?>
                <tr>
                  <td><?= $this->Number->format($agentDispute->id) ?></td>
                  <td><?= $agentDispute->has('user') ? $this->Html->link($agentDispute->user->id, ['controller' => 'Users', 'action' => 'view', $agentDispute->user->id]) : '' ?></td>
                  <td><?= h($agentDispute->audit_reference) ?></td>
                  <td><?= h($agentDispute->audit_collectiondate) ?></td>
                  <td><?= h($agentDispute->audit_processdate) ?></td>
                  <td><?= h($agentDispute->week) ?></td>
                  <td><?= h($agentDispute->audit_date) ?></td>
                  <td><?= h($agentDispute->overall_score) ?></td>
                  <td><?= h($agentDispute->rebuttal_reason) ?></td>
                  <td><?= h($agentDispute->new_score) ?></td>
                  <td><?= h($agentDispute->dispute_summary) ?></td>
                  <td><?= h($agentDispute->created) ?></td>
                  <td><?= h($agentDispute->modified) ?></td>
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
  </div>
</section>