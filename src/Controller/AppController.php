<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeRender(EventInterface $event)
    {
        $menuTable = $this->fetchTable('Menus');

        $menuTree = $menuTable->find('threaded')
            ->where([
                'level <' => 2,
            ])
            ->order([
                'lft' => 'ASC'
            ]);


        $filterInactive = function ($menusThreaded) use (&$filterInactive) {
            $store = [];

            foreach ($menusThreaded as $menu) {
                if (!$menu->active) {
                    continue;
                }

                $countChildren = count($menu['children']);

                if ($menu->hasValue('children')) {
                    $menu['children'] = $filterInactive($menu['children']);
                }

                if ($countChildren > 0 && empty($menu['children'])) {
                    continue;
                }

                $store[] = $menu;
            }

            return $store;
        };

        $menuTree = $filterInactive($menuTree);

        $this->set(compact('menuTree'));
    }
}
