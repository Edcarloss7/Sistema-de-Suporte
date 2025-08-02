<?php
declare(strict_types=1);

namespace App\Controller;


class CategoriasController extends AppController
{
    
    public function index()
    {
        $query = $this->Categorias->find();
        $categorias = $this->paginate($query);

        $this->set(compact('categorias'));
    }

    
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, contain: ['Chamados' => ['Clientes', 'Tecnicos', 'Categorias']]);
        $this->set(compact('categoria'));
    }

    
    public function add()
    {
        $categoria = $this->Categorias->newEmptyEntity();
        if ($this->request->is('post')) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
        }
        $this->set(compact('categoria'));
    }

    
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
        }
        $this->set(compact('categoria'));
    }

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('The categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The categoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
