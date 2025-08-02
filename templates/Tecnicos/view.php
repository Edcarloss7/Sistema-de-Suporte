<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico $tecnico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Tecnico'), ['action' => 'edit', $tecnico->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Tecnico'), ['action' => 'delete', $tecnico->id], ['confirm' => __('Tem certeza de que deseja excluir este(s) técnico(s)?'), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Tecnicos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Tecnico'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tecnicos view content">
            <h3>Visualizar Técnicos</h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($tecnico->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($tecnico->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Especialidade') ?></th>
                    <td><?= h($tecnico->especialidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tecnico->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($tecnico->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($tecnico->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Chamados') ?></h4>
                <?php if (!empty($tecnico->chamados)) : ?>
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
                        <?php foreach ($tecnico->chamados as $chamado) : ?>
                        <tr>
                            <td><?= h($chamado->id) ?></td>
                            <td><?= h($chamado->cliente->nome ?? 'Cliente') ?></td>
                            <td><?= h($chamado->tecnico->nome ?? 'Tecnico') ?></td>
                            <td><?= h($chamado->categoria->nome ?? 'Categoria') ?></td>
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