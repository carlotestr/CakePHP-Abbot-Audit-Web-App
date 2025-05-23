<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Found (<?php echo $usersCount; ?>) Results

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Users Search Results'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build('/users/search'); ?>" method="get">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="keyword" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

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
                  <th scope="col"><?= $this->Paginator->sort('emp_hiredate') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_firstname') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_lastname') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_fullname') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_email') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_position') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_team') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_manager') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_supervisor') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('emp_username') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('createdby_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= $this->Number->format($user->id) ?></td>
                  <td><?= h($user->emp_hiredate) ?></td>
                  <td><?= h($user->emp_firstname) ?></td>
                  <td><?= h($user->emp_lastname) ?></td>
                  <td><?= h($user->emp_fullname) ?></td>
                  <td><?= h($user->emp_email) ?></td>
                  <td><?= h($user->emp_position) ?></td>
                  <td><?= h($user->emp_team) ?></td>
                  <td><?= h($user->emp_manager) ?></td>
                  <td><?= h($user->emp_supervisor) ?></td>
                  <td><?= h($user->emp_username) ?></td>
                  <td><?= h($user->emp_password) ?></td>
                  <td><?= $this->Number->format($user->createdby_id) ?></td>
                  <td><?= h($user->created) ?></td>
                  <td><?= h($user->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class'=>'btn btn-danger btn-xs']) ?>
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