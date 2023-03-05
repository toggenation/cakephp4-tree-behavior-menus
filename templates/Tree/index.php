<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tree[]|\Cake\Collection\CollectionInterface $tree
 */
?>


<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Tree'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>



<div class="row">
    <div class="col-2">
        <?php echo $this->fetch('tb_sidebar'); ?>
    </div>

    <div class="col-10">



        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tree as $tree) : ?>
                    <tr>
                        <td><?= $this->Number->format($tree->id) ?></td>
                        <td><?= str_repeat('&nbsp;', 3 * $tree->level) .
                                h($tree->name)
                            ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $tree->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tree->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                            <?= $this->Form->postLink(__('Delete'), [
                                'action' => 'delete',
                                $tree->id
                            ], [
                                'confirm' => __('Are you sure you want to delete # {0}?', $tree->id), 'title' => __('Delete'),
                                'class' => 'btn btn-danger'
                            ]) ?>
                            <?= $this->Form->postLink(__('Up'), ['action' => 'up', $tree->id], [
                                'class' => 'btn btn-danger',
                                'confirm' => __('Are you sure you want to move up # {0}?', $tree->id)
                            ]) ?>
                            <?= $this->Form->postLink(__('Dn'), ['action' => 'down', $tree->id], [
                                'class' => 'btn btn-danger',
                                'confirm' => __('Are you sure you want to move down # {0}?', $tree->id)
                            ]) ?>
                            <?= $this->Form->postLink(__('Rm'), ['action' => 'removeAndDelete', $tree->id], [
                                'class' => 'btn btn-danger',
                                'confirm' => __('Are you sure you want to remove and delete # {0}?', $tree->id)
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('«', ['label' => __('First')]) ?>
                <?= $this->Paginator->prev('‹', ['label' => __('Previous')]) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('›', ['label' => __('Next')]) ?>
                <?= $this->Paginator->last('»', ['label' => __('Last')]) ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>

    </div>
</div>