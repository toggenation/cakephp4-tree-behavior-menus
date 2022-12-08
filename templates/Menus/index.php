<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menu> $menus
 */
?>
<div class="menus index content">
    <?= $this->Html->link(
        __('New Menu'),
        ['action' => 'add'],
        ['class' => 'btn btn-primary float-end']
    ) ?>
    <h3><?= __('Menus') ?></h3>
    <div class="table-responsive">
        <table class="table-responsive table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('level') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('disabled') ?></th>
                    <th><?= $this->Paginator->sort('divider_before') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu) : ?>
                    <tr>
                        <td><?= $this->Number->format($menu->id) ?></td>
                        <td><?= $menu->has('parent_menu') ? $this->Html->link($menu->parent_menu->name, ['controller' => 'Menus', 'action' => 'view', $menu->parent_menu->id]) : '' ?></td>
                        <td><?= $this->Number->format($menu->level) ?></td>
                        <td><?= str_repeat('&nbsp;', 3 * $menu->level) . h($menu->name) ?></td>
                        <td><?= h($menu->url) ?></td>
                        <td><?= h($menu->active) ?></td>
                        <td><?= h($menu->disabled) ?></td>
                        <td><?= h($menu->divider_before) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?>
                            <?= $this->Form->postLink(__('Up'), ['action' => 'up', $menu->id], ['confirm' => __('Are you sure you want to move up # {0}?', $menu->id)]) ?>
                            <?= $this->Form->postLink(__('Dn'), ['action' => 'down', $menu->id], ['confirm' => __('Are you sure you want to move down # {0}?', $menu->id)]) ?>
                            <?= $this->Form->postLink(__('Rm'), ['action' => 'removeAndDelete', $menu->id], ['confirm' => __('Are you sure you want to remove and delete # {0}?', $menu->id)]) ?>
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