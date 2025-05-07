<div class="users form content"  style="margin-top: 50px;">
    <?= $this->Form->create() ?>
    <h2>Wellcome to CRUD de Projetos</h2>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>