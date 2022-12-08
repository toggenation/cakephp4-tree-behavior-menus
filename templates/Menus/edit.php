<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 * @var string[]|\Cake\Collection\CollectionInterface $parentMenus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menu->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Menus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menus form content">
            <?= $this->Form->create($menu) ?>
            <fieldset>
                <legend><?= __('Edit Menu') ?></legend>
                <?php
                echo $this->Form->control(
                    'parent_id',
                    [
                        'escape' => false,
                        'options' => $parentMenus, 'empty' => true
                    ]
                );
                echo $this->Form->control('level');
                echo $this->Form->control('name');
                echo $this->Form->control('url');
                echo $this->Form->control('active');
                echo $this->Form->control('disabled');
                echo $this->Form->control('divider_before');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>