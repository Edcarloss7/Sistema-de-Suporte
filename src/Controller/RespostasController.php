<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Respostas Controller
 *
 * @property \App\Model\Table\RespostasTable $Respostas
 */
class RespostasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Respostas->find()
            ->contain(['Chamados']);
        $respostas = $this->paginate($query);

        $this->set(compact('respostas'));
    }

    /**
     * View method
     *
     * @param string|null $id Resposta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resposta = $this->Respostas->get($id, contain: ['Chamados']);
        $this->set(compact('resposta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resposta = $this->Respostas->newEmptyEntity();
        if ($this->request->is('post')) {
            $resposta = $this->Respostas->patchEntity($resposta, $this->request->getData());
            if ($this->Respostas->save($resposta)) {
                $this->Flash->success(__('The resposta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resposta could not be saved. Please, try again.'));
        }
        $chamados = $this->Respostas->Chamados->find('list', limit: 200)->all();
        $this->set(compact('resposta', 'chamados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resposta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resposta = $this->Respostas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resposta = $this->Respostas->patchEntity($resposta, $this->request->getData());
            if ($this->Respostas->save($resposta)) {
                $this->Flash->success(__('The resposta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resposta could not be saved. Please, try again.'));
        }
        $chamados = $this->Respostas->Chamados->find('list', limit: 200)->all();
        $this->set(compact('resposta', 'chamados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resposta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resposta = $this->Respostas->get($id);
        if ($this->Respostas->delete($resposta)) {
            $this->Flash->success(__('The resposta has been deleted.'));
        } else {
            $this->Flash->error(__('The resposta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
