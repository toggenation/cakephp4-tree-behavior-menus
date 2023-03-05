<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tree $tree
 */
?>


<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Tree'), ['action' => 'edit', $tree->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Tree'), ['action' => 'delete', $tree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tree->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Tree'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Tree'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="row">
    <div class="col-2">
        <?php echo $this->fetch('tb_sidebar'); ?>
    </div>
    <div class="col-10 tree view large-9 medium-8 columns content">
        <h3><?= h($tree->name) ?></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($tree->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tree->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>