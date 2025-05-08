<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Task> $tasks
 */
?>
<div class="tasks index content">
    <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tasks') ?></h3>
    <form action="/tasks">
        <div style="display: flex; align-item: center; justify-content: center;">
            <?= $this->Form->control('project_id', ['label' => false, 'empty' => 'Projeto','options' => $projects]); ?>
            <?= $this->Form->control('status', ['label' => false, 'empty' => 'Status','options' => ['Completed' => 'Completed', 'Not Completed' => 'Not Completed']]); ?>
            <button>Filtrar</button>
        </div>
    </form>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th>Prazo</th>
                    <th><?= $this->Paginator->sort('predecessor_task_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task->hasValue('project') ? $this->Html->link($task->project->name, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                        <td><?= h($task->title) ?></td>
                        <td><?= h($task->start_date) ?> à <?= h($task->end_date) ?></td>
                        <td><?= $task->hasValue('predecessor_task') ? $this->Html->link($task->predecessor_task->title, ['controller' => 'Tasks', 'action' => 'view', $task->predecessor_task->id]) : '' ?></td>
                        <td><?= h($task->status) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $task->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $task->id),
                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>