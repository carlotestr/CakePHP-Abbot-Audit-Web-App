<section class="content-header">
  <h1>
    Agent Dispute
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
            <dd><?= $agentDispute->has('user') ? $this->Html->link($agentDispute->user->id, ['controller' => 'Users', 'action' => 'view', $agentDispute->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Audit Reference') ?></dt>
            <dd><?= h($agentDispute->audit_reference) ?></dd>
            <dt scope="row"><?= __('Week') ?></dt>
            <dd><?= h($agentDispute->week) ?></dd>
            <dt scope="row"><?= __('Overall Score') ?></dt>
            <dd><?= h($agentDispute->overall_score) ?></dd>
            <dt scope="row"><?= __('Rebuttal Reason') ?></dt>
            <dd><?= h($agentDispute->rebuttal_reason) ?></dd>
            <dt scope="row"><?= __('New Score') ?></dt>
            <dd><?= h($agentDispute->new_score) ?></dd>
            <dt scope="row"><?= __('Dispute Summary') ?></dt>
            <dd><?= h($agentDispute->dispute_summary) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($agentDispute->id) ?></dd>
            <dt scope="row"><?= __('Audit Collectiondate') ?></dt>
            <dd><?= h($agentDispute->audit_collectiondate) ?></dd>
            <dt scope="row"><?= __('Audit Processdate') ?></dt>
            <dd><?= h($agentDispute->audit_processdate) ?></dd>
            <dt scope="row"><?= __('Audit Date') ?></dt>
            <dd><?= h($agentDispute->audit_date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($agentDispute->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($agentDispute->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
