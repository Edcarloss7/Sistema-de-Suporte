<?php
declare(strict_types=1);

namespace App\Controller;


class ClientesController extends AppController
{
   
    public function index()
    {
        $query = $this->Clientes->find();
        $clientes = $this->paginate($query);

        $this->set(compact('clientes'));
    }

  
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, contain: ['Chamados' => ['Clientes', 'Tecnicos', 'Categorias']]);
        $this->set(compact('cliente'));
    }

    
    public function add()
    {
        $cliente = $this->Clientes->newEmptyEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

   
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
