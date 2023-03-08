<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Trees Controller
 *
 * @property \App\Model\Table\TreesTable $Trees
 * @method \App\Model\Entity\Tree[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TreesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'order' => [
                'lft' => 'ASC'
            ]
        ];

        $trees = $this->paginate($this->Trees);

        $trees = collection($trees)->map(function ($item) {
            $item->level = $this->Trees->getLevel($item);

            return $item;
        });

        $this->set(compact('trees'));
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
        $tree = $this->Trees->get($id, [
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
        $tree = $this->Trees->newEmptyEntity();
        if ($this->request->is('post')) {
            $tree = $this->Trees->patchEntity($tree, $this->request->getData());
            if ($this->Trees->save($tree)) {
                $this->Flash->success(__('The tree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tree could not be saved. Please, try again.'));
        }

        $parents = $this->Trees->find('list');
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
        $tree = $this->Trees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tree = $this->Trees->patchEntity($tree, $this->request->getData());
            if ($this->Trees->save($tree)) {
                $this->Flash->success(__('The tree has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tree could not be saved. Please, try again.'));
        }

        $parents = $this->Trees->find('list', [
            'conditions' => [
                'NOT' => [
                    'id' => $id
                ]
            ]
        ]);

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
        $tree = $this->Trees->get($id);
        if ($this->Trees->delete($tree)) {
            $this->Flash->success(__('The tree has been deleted.'));
        } else {
            $this->Flash->error(__('The tree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function up($id = null, $spaces = 1)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tree = $this->Trees->get($id);
        if ($this->Trees->moveUp($tree, $spaces)) {
            $this->Flash->success(__('The menu has been moved up.'));
        } else {
            $this->Flash->error(__('The menu could not be moved up. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function down($id = null, $spaces = 1)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tree = $this->Trees->get($id);
        if ($this->Trees->moveDown($tree, $spaces)) {
            $this->Flash->success(__('The menu has been moved down.'));
        } else {
            $this->Flash->error(__('The menu could not be moved up. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function removeAndDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $tree = $this->Trees->get($id);

        $this->Trees->removeFromTree($tree);

        if ($this->Trees->delete($tree)) {
            $this->Flash->success(__('The menu has been removed and deleted.'));
        } else {
            $this->Flash->error(__('The menu could not be removed and deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
