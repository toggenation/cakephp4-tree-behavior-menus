<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Tree Controller
 *
 * @property \App\Model\Table\TreeTable $Tree
 * @method \App\Model\Entity\Tree[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TreeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->Tree->recover();

        $this->paginate = [
            'order' => [
                'lft' => 'ASC'
            ]
        ];

        $tree = $this->paginate($this->Tree);

        $this->set(compact('tree'));
    }

    /**
     * View method
     *
     * @param string|null $id Tree id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tree = $this->Tree->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tree'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tree = $this->Tree->newEmptyEntity();
        if ($this->request->is('post')) {
            $tree = $this->Tree->patchEntity($tree, $this->request->getData());
            if ($this->Tree->save($tree)) {
                $this->Flash->success(__('The tree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tree could not be saved. Please, try again.'));
        }

        $parents = $this->Tree->find('list');
        $this->set(compact('tree', 'parents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tree id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tree = $this->Tree->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tree = $this->Tree->patchEntity($tree, $this->request->getData());
            if ($this->Tree->save($tree)) {
                $this->Flash->success(__('The tree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tree could not be saved. Please, try again.'));
        }

        $parents = $this->Tree->find('list');
        $this->set(compact('tree', 'parents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tree id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tree = $this->Tree->get($id);
        if ($this->Tree->delete($tree)) {
            $this->Flash->success(__('The tree has been deleted.'));
        } else {
            $this->Flash->error(__('The tree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function up($id = null, $spaces = 1)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Tree->get($id);
        if ($this->Tree->moveUp($menu, $spaces)) {
            $this->Flash->success(__('The menu has been moved up.'));
        } else {
            $this->Flash->error(__('The menu could not be moved up. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function down($id = null, $spaces = 1)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Tree->get($id);
        if ($this->Tree->moveDown($menu, $spaces)) {
            $this->Flash->success(__('The menu has been moved down.'));
        } else {
            $this->Flash->error(__('The menu could not be moved up. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function removeAndDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Tree->get($id);

        $descendants = $this->Tree->find('children', ['for' => $menu->id])
            ->all();

        $this->Tree->removeFromTree($menu);

        if ($this->Tree->delete($menu)) {
            // $this->Tree->recover();

            foreach ($descendants as $child) {
                $childEntity = $this->Tree->get($child->id);
                $childEntity->level = $child->level - 1;
                $this->Tree->save($childEntity);
            }

            $this->Flash->success(__('The menu has been removed and deleted.'));
        } else {
            $this->Flash->error(__('The menu could not be removed and deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
