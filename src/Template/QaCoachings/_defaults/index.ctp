<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Qa Coachings

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
                  <th scope="col"><?= $this->Paginator->sort('coaching_month') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('coaching_connect') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('coaching_engage') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('coaching_check') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($qaCoachings as $qaCoaching): ?>
                <tr>
                  <td><?= $this->Number->format($qaCoaching->id) ?></td>
                  <td><?= $qaCoaching->has('user') ? $this->Html->link($qaCoaching->user->id, ['controller' => 'Users', 'action' => 'view', $qaCoaching->user->id]) : '' ?></td>
                  <td><?= h($qaCoaching->coaching_month) ?></td>
                  <td><?= h($qaCoaching->coaching_connect) ?></td>
                  <td><?= h($qaCoaching->coaching_engage) ?></td>
                  <td><?= h($qaCoaching->coaching_check) ?></td>
                  <td><?= h($qaCoaching->created) ?></td>
                  <td><?= h($qaCoaching->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $qaCoaching->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qaCoaching->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qaCoaching->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qaCoaching->id), 'class'=>'btn btn-danger btn-xs']) ?>
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