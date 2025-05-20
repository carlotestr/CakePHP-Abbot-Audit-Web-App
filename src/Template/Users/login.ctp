<?php $this->layout = 'AdminLTE.login'; ?>
<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <div class="form-group input text">
               <label class="control-label" for="employee_id">Employee Id</label>
                  <input type="text" name="employee_id" id="employee_id" class="form-control" maxlength="255"/>          
              </div>
        <?php //echo $this->Form->control('employee_id') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
