<section class="content-header">
  <h1>
    Qa Coaching
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
            <dd><?= $qaCoaching->has('user') ? $this->Html->link($qaCoaching->user->id, ['controller' => 'Users', 'action' => 'view', $qaCoaching->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Coaching Month') ?></dt>
            <dd><?= h($qaCoaching->coaching_month) ?></dd>
            <dt scope="row"><?= __('Coaching Connect') ?></dt>
            <dd><?= h($qaCoaching->coaching_connect) ?></dd>
            <dt scope="row"><?= __('Coaching Engage') ?></dt>
            <dd><?= h($qaCoaching->coaching_engage) ?></dd>
            <dt scope="row"><?= __('Coaching Check') ?></dt>
            <dd><?= h($qaCoaching->coaching_check) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($qaCoaching->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($qaCoaching->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($qaCoaching->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?= __('Coaching Notes') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Text->autoParagraph($qaCoaching->coaching_notes); ?>
        </div>
      </div>
    </div>
  </div>
</section>
