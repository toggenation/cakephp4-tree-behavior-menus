<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tree $tree
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tree'), ['action' => 'edit', $tree->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tree'), ['action' => 'delete', $tree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tree->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tree'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trees view content">
            <h3><?= h($tree->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tree->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tree->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
