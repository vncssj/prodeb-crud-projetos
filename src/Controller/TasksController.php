<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Tasks->find()
            ->contain(['Projects', 'PredecessorTasks']);
            if (!is_null($this->request->getQuery('project_id')) && !empty($this->request->getQuery('project_id'))) {
                $query->where(['Tasks.project_id' => $this->request->getQuery('project_id')]);
            }
            if (!is_null($this->request->getQuery('status')) && !empty($this->request->getQuery('status'))) {
                $query->where(['Tasks.status' => $this->request->getQuery('status')]);
            }
        $tasks = $this->paginate($query);
        $projects = $this->fetchTable('Projects')->find('list');

        $this->set(compact('tasks', 'projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, contain: ['Projects', 'PredecessorTasks']);
        $this->set(compact('task'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($task->isDirty('status') && $this->Authentication->getIdentity()->get('role') !== 'admin') {
                $this->Flash->error(__('You don\'t have permission to set status.'));
                return $this->redirect($this->referer());
            }

            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $projects = $this->Tasks->Projects->find('list', limit: 200)->all();
        $predecessorTasks = $this->Tasks->PredecessorTasks->find('list', limit: 200)->all();
        $this->set(compact('task', 'projects', 'predecessorTasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());

            if ($task->isDirty('status') && $this->Authentication->getIdentity()->get('role') !== 'admin') {
                $this->Flash->error(__('You hasn\'t permission to set status.'));
                return $this->redirect($this->referer());
            }

            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $projects = $this->Tasks->Projects->find('list', limit: 200)->all();
        $predecessorTasks = $this->Tasks->PredecessorTasks->find('list', limit: 200)->all();
        $this->set(compact('task', 'projects', 'predecessorTasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);

        if (!$this->Tasks->canDelete($id)) {
            $this->Flash->error(__('The task could not be deleted. It\'s the predecessor of another task.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
