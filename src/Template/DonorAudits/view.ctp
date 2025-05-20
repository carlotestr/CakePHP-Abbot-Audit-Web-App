<section class="content-header">
  <h1>
    Donor Audit
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
            <dd><?= $donorAudit->has('user') ? $this->Html->link($donorAudit->user->id, ['controller' => 'Users', 'action' => 'view', $donorAudit->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Auditor') ?></dt>
            <dd><?= h($donorAudit->auditor) ?></dd>
            <dt scope="row"><?= __('Audit Reference') ?></dt>
            <dd><?= h($donorAudit->audit_reference) ?></dd>
            <dt scope="row"><?= __('Audit Collectiondate') ?></dt>
            <dd><?= h($donorAudit->audit_collectiondate) ?></dd>
            <dt scope="row"><?= __('Audit Processdate') ?></dt>
            <dd><?= h($donorAudit->audit_processdate) ?></dd>
            <dt scope="row"><?= __('Week') ?></dt>
            <dd><?= h($donorAudit->week) ?></dd>
            <dt scope="row"><?= __('Tenureship') ?></dt>
            <dd><?= h($donorAudit->tenureship) ?></dd>
            <dt scope="row"><?= __('Audit Time') ?></dt>
            <dd><?= h($donorAudit->audit_time) ?></dd>
            <dt scope="row"><?= __('Audit Count') ?></dt>
            <dd><?= h($donorAudit->audit_count) ?></dd>
            <dt scope="row"><?= __('Fatal Score') ?></dt>
            <dd><?= h($donorAudit->fatal_score) ?></dd>
            <dt scope="row"><?= __('Nonfatal Score') ?></dt>
            <dd><?= h($donorAudit->nonfatal_score) ?></dd>
            <dt scope="row"><?= __('Overall Score') ?></dt>
            <dd><?= h($donorAudit->overall_score) ?></dd>
            <dt scope="row"><?= __('Rft') ?></dt>
            <dd><?= h($donorAudit->rft) ?></dd>
            <dt scope="row"><?= __('Fatal Hipaa') ?></dt>
            <dd><?= h($donorAudit->fatal_hipaa) ?></dd>
            <dt scope="row"><?= __('Nonfatal Greeting') ?></dt>
            <dd><?= h($donorAudit->nonfatal_greeting) ?></dd>
            <dt scope="row"><?= __('Nonfatal Purpose') ?></dt>
            <dd><?= h($donorAudit->nonfatal_purpose) ?></dd>
            <dt scope="row"><?= __('Nonfatal Callproper') ?></dt>
            <dd><?= h($donorAudit->nonfatal_callproper) ?></dd>
            <dt scope="row"><?= __('Nonfatal Updateacc') ?></dt>
            <dd><?= h($donorAudit->nonfatal_updateacc) ?></dd>
            <dt scope="row"><?= __('Nonfatal Doc') ?></dt>
            <dd><?= h($donorAudit->nonfatal_doc) ?></dd>
            <dt scope="row"><?= __('Nonfatal Log') ?></dt>
            <dd><?= h($donorAudit->nonfatal_log) ?></dd>
            <dt scope="row"><?= __('Nonfatal Handling') ?></dt>
            <dd><?= h($donorAudit->nonfatal_handling) ?></dd>
            <dt scope="row"><?= __('Call Summary') ?></dt>
            <dd><?= h($donorAudit->call_summary) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($donorAudit->id) ?></dd>
            <dt scope="row"><?= __('Audit Date') ?></dt>
            <dd><?= h($donorAudit->audit_date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($donorAudit->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($donorAudit->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
