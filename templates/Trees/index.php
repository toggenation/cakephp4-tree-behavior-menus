<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tree> $trees
 */
?>
<div class="trees index content">
    <?= $this->Html->link(__('New Tree'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trees') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trees as $tree) : ?>
                    <tr>
                        <td><?= $this->Number->format($tree->id) ?></td>
                        <td><?= str_repeat('&nbsp;', 3 * $tree->level) . h($tree->name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $tree->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tree->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tree->id)]) ?>
                            <?= $this->Form->postLink(__('Up'), ['action' => 'up', $tree->id], ['confirm' => __('Are you sure you want to move up # {0}?', $tree->id)]) ?>
                            <?= $this->Form->postLink(__('Dn'), ['action' => 'down', $tree->id], ['confirm' => __('Are you sure you want to move down # {0}?', $tree->id)]) ?>
                            <?= $this->Form->postLink(__('Rm'), ['action' => 'removeAndDelete', $tree->id], ['confirm' => __('Are you sure you want to remove and delete # {0}?', $tree->id)]) ?>
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