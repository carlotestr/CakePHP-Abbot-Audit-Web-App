<section class="content-header">
  <h1>
    Qa Goal
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= h($qaGoal->user->emp_fullname) ?></dd>
            <dt scope="row"><?= __('Goal Title') ?></dt>
            <dd><?= h($qaGoal->goal_title) ?></dd>
            <dt scope="row"><?= __('Goal Details') ?></dt>
            <dd><?= h($qaGoal->goal_details) ?></dd>
            <dt scope="row"><?= __('Goal Progress') ?></dt>
            <dd><?= h($qaGoal->goal_progress) ?></dd>
            <dt scope="row"><?= __('Goal Deadline') ?></dt>
            <dd><?= h($qaGoal->goal_deadline) ?></dd>
            <!-- <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($qaGoal->id) ?></dd> -->
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($qaGoal->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($qaGoal->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
