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
                  <th scope="col"><?= $this->Paginator->sort('call_summary') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('why_one') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('why_two') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('why_three') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('why_four') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('why_five') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('coaching_summary') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('action_plan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($errorCoachings as $errorCoaching): ?>
                <tr>
                  <td><?= $this->Number->format($errorCoaching->id) ?></td>
                  <td><?= $errorCoaching->has('user') ? $this->Html->link($errorCoaching->user->id, ['controller' => 'Users', 'action' => 'view', $errorCoaching->user->id]) : '' ?></td>
                  <td><?= h($errorCoaching->audit_reference) ?></td>
                  <td><?= h($errorCoaching->audit_collectiondate) ?></td>
                  <td><?= h($errorCoaching->audit_processdate) ?></td>
                  <td><?= h($errorCoaching->week) ?></td>
                  <td><?= h($errorCoaching->audit_date) ?></td>
                  <td><?= h($errorCoaching->overall_score) ?></td>
                  <td><?= h($errorCoaching->call_summary) ?></td>
                  <td><?= h($errorCoaching->why_one) ?></td>
                  <td><?= h($errorCoaching->why_two) ?></td>
                  <td><?= h($errorCoaching->why_three) ?></td>
                  <td><?= h($errorCoaching->why_four) ?></td>
                  <td><?= h($errorCoaching->why_five) ?></td>
                  <td><?= h($errorCoaching->coaching_summary) ?></td>
                  <td><?= h($errorCoaching->action_plan) ?></td>
                  <td><?= h($errorCoaching->created) ?></td>
                  <td><?= h($errorCoaching->modified) ?></td>
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
  </div>
</section>