<div class="row">
    <div class="column-50 column-offset-25">
        <div class="users form content" style="margin-top: 50px;">
            <?= $this->Form->create() ?>
            <h2>Wellcome to Project Manager</h2>
            <fieldset>
                <legend><?= __('Please enter your username and password') ?></legend>
                <?= $this->Form->control('username') ?>
                <?= $this->Form->control('password') ?>
            </fieldset>
            <div style="text-align: center;">
                <?= $this->Form->button(__('Login')); ?>
            </div>
            <?= $this->Form->end() ?>
            
            <div style="text-align: center;">
                <?= $this->Html->link('Sign Up', ['action' => 'add']) ?>
            </div>
        </div>
    </div>
</div>