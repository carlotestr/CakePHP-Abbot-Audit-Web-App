<section class="content-header">
  <h1>
    Bat Audit
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
            <dt scope="row">Name</dt>
            <dd><?=  h($user->emp_fullname) ?></dd>
            <dt scope="row"><?= __('Auditor') ?></dt>
            <dd><?= h($auditor->emp_fullname) ?></dd>
            <dt scope="row"><?= __('Audit Reference') ?></dt>
            <dd><?= h($batAudit->audit_reference) ?></dd>
            <dt scope="row"><?= __('Week') ?></dt>
            <dd><?= h($batAudit->week) ?></dd>
            <dt scope="row"><?= __('Tenureship') ?></dt>
            <dd><?= h($batAudit->tenureship) ?></dd>
            <dt scope="row"><?= __('Audit Time') ?></dt>
            <dd><?= h($batAudit->audit_time) ?></dd>
            <dt scope="row"><?= __('Audit Count') ?></dt>
            <dd><?= h($batAudit->audit_count) ?></dd>
            <dt scope="row"><?= __('Fatal Score') ?></dt>
            <dd><?= h($batAudit->fatal_score) ?></dd>
            <dt scope="row"><?= __('Nonfatal Score') ?></dt>
            <dd><?= h($batAudit->nonfatal_score) ?></dd>
            <dt scope="row"><?= __('Overall Score') ?></dt>
            <dd><?= h($batAudit->overall_score) ?></dd>
            <dt scope="row"><?= __('Rft') ?></dt>
            <dd><?= h($batAudit->rft) ?></dd>
            <dt scope="row"><?= __('Fatal Clientinfo') ?></dt>
            <dd><?= h($batAudit->fatal_clientinfo) ?></dd>
            <dt scope="row"><?= __('Fatal Donorssn') ?></dt>
            <dd><?= h($batAudit->fatal_donorssn) ?></dd>
            <dt scope="row"><?= __('Fatal Testinfo') ?></dt>
            <dd><?= h($batAudit->fatal_testinfo) ?></dd>
            <dt scope="row"><?= __('Fatal Routing') ?></dt>
            <dd><?= h($batAudit->fatal_routing) ?></dd>
            <dt scope="row"><?= __('Nonfatal Testnum') ?></dt>
            <dd><?= h($batAudit->nonfatal_testnum) ?></dd>
            <dt scope="row"><?= __('Nonfatal Doc') ?></dt>
            <dd><?= h($batAudit->nonfatal_doc) ?></dd>
            <dt scope="row"><?= __('Nonfatal Donorinfo') ?></dt>
            <dd><?= h($batAudit->nonfatal_donorinfo) ?></dd>
            <dt scope="row"><?= __('Call Summary') ?></dt>
            <dd><?= h($batAudit->call_summary) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($batAudit->id) ?></dd>
            <dt scope="row"><?= __('Audit Collectiondate') ?></dt>
            <dd><?= h($batAudit->audit_collectiondate) ?></dd>
            <dt scope="row"><?= __('Audit Processdate') ?></dt>
            <dd><?= h($batAudit->audit_processdate) ?></dd>
            <dt scope="row"><?= __('Audit Date') ?></dt>
            <dd><?= h($batAudit->audit_date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($batAudit->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($batAudit->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
