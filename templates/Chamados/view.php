<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamado $chamado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Chamado'), ['action' => 'edit', $chamado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Chamado'), ['action' => 'delete', $chamado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chamado->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Chamados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Chamado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chamados view content">
            <h3>Visualizar Chamados</h3>
            <table>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $chamado->hasValue('cliente') ? $this->Html->link($chamado->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $chamado->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tecnico') ?></th>
                    <td><?= $chamado->hasValue('tecnico') ? $this->Html->link($chamado->tecnico->nome, ['controller' => 'Tecnicos', 'action' => 'view', $chamado->tecnico->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= $chamado->hasValue('categoria') ? $this->Html->link($chamado->categoria->nome, ['controller' => 'Categorias', 'action' => 'view', $chamado->categoria->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($chamado->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($chamado->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chamado->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($chamado->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($chamado->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($chamado->descricao)); ?>
                </blockquote>
            </div>
            
        </div>
    </div>
</div>