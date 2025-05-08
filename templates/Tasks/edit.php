<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $predecessorTasks
 */
?>
<div class="row">
    <div class="column">
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Edit Task') ?></legend>
                <div class="row">
                    <div class="column">
                        <?= $this->Form->control('title'); ?>
                    </div>
                    <div class="column">
                        <?= $this->Form->control('predecessor_task_id', ['options' => $predecessorTasks, 'empty' => true]); ?>
                    </div>
                    <div class="column">
                        <?= $this->Form->control('project_id', ['options' => $projects]); ?>
                    </div>
                </div>
                <div class="row">

                    <div class="column">
                        <?= $this->Form->control('start_date', ['empty' => true]); ?>
                    </div>
                    <div class="column">
                        <?= $this->Form->control('end_date', ['empty' => true]); ?>
                    </div>
                </div>
                <?php
                echo $this->Form->control('description');
                echo $this->Form->control('status', ['options' => ['Completed' => 'Completed', 'Not Completed' => 'Not Completed'], 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>