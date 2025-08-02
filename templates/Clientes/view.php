<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientes view content">
            <h3>Visualizar Cliente</h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cliente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($cliente->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($cliente->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($cliente->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($cliente->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Chamados') ?></h4>
                <?php if (!empty($cliente->chamados)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cliente') ?></th>
                            <th><?= __('Tecnico') ?></th>
                            <th><?= __('Categoria') ?></th>
                            <th><?= __('Titulo') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Criado') ?></th>
                            <th><?= __('Modificado') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cliente->chamados as $chamado) : ?>
                        <tr>
                            <td><?= h($chamado->id) ?></td>
                            <td><?= h($chamado->cliente->nome ?? 'cliente') ?></td>
                            <td><?= h($chamado->tecnico->nome ?? 'tecnico') ?></td>
                            <td><?= h($chamado->categoria->nome ?? 'categoria') ?></td>
                            <td><?= h($chamado->titulo) ?></td>
                            <td><?= h($chamado->descricao) ?></td>
                            <td><?= h($chamado->status) ?></td>
                            <td><?= h($chamado->created) ?></td>
                            <td><?= h($chamado->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Chamados', 'action' => 'view', $chamado->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Chamados', 'action' => 'edit', $chamado->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Chamados', 'action' => 'delete', $chamado->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Tem certeza de que deseja excluir esse chamado?'),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>