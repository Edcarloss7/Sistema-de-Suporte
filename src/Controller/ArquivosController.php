<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Arquivos Controller
 *
 * @property \App\Model\Table\ArquivosTable $Arquivos
 */
class ArquivosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Arquivos->find()
            ->contain(['Chamados']);
        $arquivos = $this->paginate($query);

        $this->set(compact('arquivos'));
    }

    /**
     * View method
     *
     * @param string|null $id Arquivo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $arquivo = $this->Arquivos->get($id, contain: ['Chamados']);
        $this->set(compact('arquivo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $arquivo = $this->Arquivos->newEmptyEntity();
        if ($this->request->is('post')) {
            $arquivo = $this->Arquivos->patchEntity($arquivo, $this->request->getData());
            if ($this->Arquivos->save($arquivo)) {
                $this->Flash->success(__('The arquivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arquivo could not be saved. Please, try again.'));
        }
        $chamados = $this->Arquivos->Chamados->find('list', limit: 200)->all();
        $this->set(compact('arquivo', 'chamados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Arquivo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $arquivo = $this->Arquivos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $arquivo = $this->Arquivos->patchEntity($arquivo, $this->request->getData());
            if ($this->Arquivos->save($arquivo)) {
                $this->Flash->success(__('The arquivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arquivo could not be saved. Please, try again.'));
        }
        $chamados = $this->Arquivos->Chamados->find('list', limit: 200)->all();
        $this->set(compact('arquivo', 'chamados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Arquivo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $arquivo = $this->Arquivos->get($id);
        if ($this->Arquivos->delete($arquivo)) {
            $this->Flash->success(__('The arquivo has been deleted.'));
        } else {
            $this->Flash->error(__('The arquivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
