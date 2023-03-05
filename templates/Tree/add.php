<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tree $tree
 */
?>


<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Tree'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>



<div class="row">
    <div class="col-2">
        <?php echo $this->fetch('tb_sidebar'); ?>
    </div>

    <div class="col-10">

        <?= $this->Form->create($tree) ?>
        <fieldset>
            <legend><?= __('Add Tree') ?></legend>
            <?php
            echo $this->Form->control('parent_id', [
                'empty' => true
            ]);
            ?>
            <?php
            echo $this->Form->control('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>