<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 * @var \Cake\Collection\CollectionInterface|string[] $parentMenus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Menus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menus form content">
            <?= $this->Form->create($menu) ?>
            <fieldset>
                <legend><?= __('Add Menu') ?></legend>
                <?php $this->Form->setTemplates([
                    'button' => '<button{{attrs}}>{{text}}</button>',
                    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                    'checkboxFormGroup' => '{{label}}',
                    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
                    'error' => '<div class="error-message" id="{{id}}">{{content}}</div>',
                    'errorList' => '<ul>{{content}}</ul>',
                    'errorItem' => '<li>{{text}}</li>',
                    'file' => '<input type="file" name="{{name}}"{{attrs}}>',
                    'fieldset' => '<fieldset{{attrs}}>{{content}}</fieldset>',
                    'formStart' => '<form{{attrs}}>',
                    'formEnd' => '</form>',
                    'formGroup' => '{{label}}{{input}}',
                    'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
                    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
                    'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
                    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
                    'inputContainerError' => '<div class="input {{type}}{{required}} error">{{content}}{{error}}</div>',
                    'label' => '<label{{attrs}}>{{text}}</label>',
                    'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
                    'legend' => '<legend>{{text}}</legend>',
                    'multicheckboxTitle' => '<legend>{{text}}</legend>',
                    'multicheckboxWrapper' => '<fieldset{{attrs}}>{{content}}</fieldset>',
                    'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
                    'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
                    'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
                    'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
                    'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
                    'radioWrapper' => '{{label}}',
                    'textarea' => '<textarea name="{{name}}"{{attrs}}>{{value}}</textarea>',
                    'submitContainer' => '<div class="submit">{{content}}</div>',
                    'confirmJs' => '{{confirm}}',
                    'selectedClass' => 'selected',
                ]); ?>
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