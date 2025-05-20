<section class="content-header">
  <h1>
    Error Coaching
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
            <dd><?= $errorCoaching->has('user') ? $this->Html->link($errorCoaching->user->id, ['controller' => 'Users', 'action' => 'view', $errorCoaching->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Audit Reference') ?></dt>
            <dd><?= h($errorCoaching->audit_reference) ?></dd>
            <dt scope="row"><?= __('Week') ?></dt>
            <dd><?= h($errorCoaching->week) ?></dd>
            <dt scope="row"><?= __('Overall Score') ?></dt>
            <dd><?= h($errorCoaching->overall_score) ?></dd>
            <dt scope="row"><?= __('Call Summary') ?></dt>
            <dd><?= h($errorCoaching->call_summary) ?></dd>
            <dt scope="row"><?= __('Why One') ?></dt>
            <dd><?= h($errorCoaching->why_one) ?></dd>
            <dt scope="row"><?= __('Why Two') ?></dt>
            <dd><?= h($errorCoaching->why_two) ?></dd>
            <dt scope="row"><?= __('Why Three') ?></dt>
            <dd><?= h($errorCoaching->why_three) ?></dd>
            <dt scope="row"><?= __('Why Four') ?></dt>
            <dd><?= h($errorCoaching->why_four) ?></dd>
            <dt scope="row"><?= __('Why Five') ?></dt>
            <dd><?= h($errorCoaching->why_five) ?></dd>
            <dt scope="row"><?= __('Coaching Summary') ?></dt>
            <dd><?= h($errorCoaching->coaching_summary) ?></dd>
            <dt scope="row"><?= __('Action Plan') ?></dt>
            <dd><?= h($errorCoaching->action_plan) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($errorCoaching->id) ?></dd>
            <dt scope="row"><?= __('Audit Collectiondate') ?></dt>
            <dd><?= h($errorCoaching->audit_collectiondate) ?></dd>
            <dt scope="row"><?= __('Audit Processdate') ?></dt>
            <dd><?= h($errorCoaching->audit_processdate) ?></dd>
            <dt scope="row"><?= __('Audit Date') ?></dt>
            <dd><?= h($errorCoaching->audit_date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($errorCoaching->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($errorCoaching->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
