<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use BootstrapUI\View\UIView;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends UIView
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->setLayout('default');

        // $this->loadHelper('Paginator', [
        //     'templates' => [
        //         'nextActive' => '<li class="next"><a rel="next" href="{{url}}">{{text}}</a></li>',
        //         'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
        //         'prevActive' => '<li class="prev"><a rel="prev" href="{{url}}">{{text}}</a></li>',
        //         'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
        //         'counterRange' => '{{start}} - {{end}} of {{count}}',
        //         'counterPages' => '{{page}} of {{pages}}',
        //         'first' => '<li class="first"><a href="{{url}}">{{text}}</a></li>',
        //         'last' => '<li class="last"><a href="{{url}}">{{text}}</a></li>',
        //         'number' => '<li><a href="{{url}}">{{text}}</a></li>',
        //         'current' => '<li class="page-item active"><a class="page-link"  href="">{{text}}</a></li>',
        //         'ellipsis' => '<li class="ellipsis">&hellip;</li>',
        //         'sort' => '<a href="{{url}}">{{text}}</a>',
        //         'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
        //         'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
        //         'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
        //         'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
        //     ]
        // ]);
    }
}
