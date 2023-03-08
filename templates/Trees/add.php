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
            <?= $this->Html->link(__('List Trees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trees form content">
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
</div>