<?php
declare(strict_types=1);

namespace App\Controller;


class TecnicosController extends AppController
{
    
    public function index()
    {
        $query = $this->Tecnicos->find();
        $tecnicos = $this->paginate($query);

        $this->set(compact('tecnicos'));
    }

    
    public function view($id = null)
    {
        $tecnico = $this->Tecnicos->get($id, contain: ['Chamados' => ['Clientes', 'Tecnicos', 'Categorias']]);
        $this->set(compact('tecnico'));
    }

    
    public function add()
    {
        $tecnico = $this->Tecnicos->newEmptyEntity();
        if ($this->request->is('post')) {
            $tecnico = $this->Tecnicos->patchEntity($tecnico, $this->request->getData());
            if ($this->Tecnicos->save($tecnico)) {
                $this->Flash->success(__('Técnico adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O técnico não pôde ser salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('tecnico'));
    }

    
    public function edit($id = null)
    {
        $tecnico = $this->Tecnicos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tecnico = $this->Tecnicos->patchEntity($tecnico, $this->request->getData());
            if ($this->Tecnicos->save($tecnico)) {
                $this->Flash->success(__('Técnico editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O técnico não pôde ser salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('tecnico'));
    }

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tecnico = $this->Tecnicos->get($id);
        if ($this->Tecnicos->delete($tecnico)) {
            $this->Flash->success(__('Técnico excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir técnico. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
