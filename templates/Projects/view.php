<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <div class="column">
        <div class="projects view content">
            <h3><?= h($project->name) ?></h3>
            <table style="font-size: 12px;">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($project->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($project->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Budget') ?></th>
                    <td><?= $project->budget === null ? '' : $this->Number->format($project->budget) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($project->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($project->modified) ?></td>
                </tr>
            </table>
            <div class="text" style="font-size: 12px;">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="content">
            <h4>Tasks</h4>
            <table style="font-size: 12px;">
                <tr>
                    <th>Title</th>
                    <th>Period</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php foreach ($project->tasks as $task) : ?>
                    <tr>
                        <td><?= $task->title ?></td>
                        <td><?= $task->start_date . ' à ' . $task->end_date  ?></td>
                        <td><?= $task->status ?></td>
                        <td>
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
            </table>
        </div>
    </div>
</div>