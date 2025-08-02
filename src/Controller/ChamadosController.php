<?php
declare(strict_types=1);

namespace App\Controller;


class ChamadosController extends AppController
{
    
    public function index()
    {
        // Filtro por status (vindo da URL, ex: ?status=aberto)
        $status = $this->request->getQuery('status');

        $query = $this->Chamados->find()
            ->contain(['Clientes', 'Tecnicos', 'Categorias']); // opcional: incluir mais dados relacionados

        if ($status) {
            $query->where(['Chamados.status' => $status]);
        }

        $chamados = $this->paginate($query);

        $this->set(compact('chamados', 'status'));
    }

    
    public function view($id = null)
    {
        $chamado = $this->Chamados->get($id, contain: ['Clientes', 'Tecnicos', 'Categorias', 'Arquivos', 'Respostas']);
        $this->set(compact('chamado'));
    }

   
    public function add()
{
    $chamado = $this->Chamados->newEmptyEntity();

    if ($this->request->is('post')) {
        $chamado = $this->Chamados->patchEntity($chamado, $this->request->getData());

        if ($this->Chamados->save($chamado)) {

            

            $this->Flash->success(__('Chamado criado com sucesso.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Erro ao criar chamado.'));
    }

    $clientes = $this->Chamados->Clientes->find('list', [
        'keyField' => 'id',
        'valueField' => 'nome'
    ])->toArray();

    $tecnicos = $this->Chamados->Tecnicos->find('list', [
        'keyField' => 'id',
        'valueField' => 'nome' // <-- ou outro campo que represente o nome do técnico
    ])->toArray();
    $categorias = $this->Chamados->Categorias->find('list', [
        'keyField' => 'id',
        'valueField' => 'nome'
    ])->toArray();
    $this->set(compact('chamado', 'clientes', 'tecnicos', 'categorias'));
}


    
    public function edit($id = null)
    {
        $chamado = $this->Chamados->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chamado = $this->Chamados->patchEntity($chamado, $this->request->getData());
            if ($this->Chamados->save($chamado)) {
                $this->Flash->success(__('Chamado editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao criar chamado.'));
        }
        $clientes = $this->Chamados->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();

        $tecnicos = $this->Chamados->Tecnicos->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();

        $categorias = $this->Chamados->Categorias->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();
        $this->set(compact('chamado', 'clientes', 'tecnicos', 'categorias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chamado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chamado = $this->Chamados->get($id);
        if ($this->Chamados->delete($chamado)) {
            $this->Flash->success(__('Chamado excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir chamado.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
