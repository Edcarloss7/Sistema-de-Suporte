<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Chamado> $chamados
 */
?>
<div class="chamados index content">
    <?= $this->Html->link(__('Novo Chamado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chamados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cliente') ?></th>
                    <th><?= $this->Paginator->sort('tecnico_id') ?></th>
                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('criado') ?></th>
                    <th><?= $this->Paginator->sort('modificado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chamados as $chamado): ?>
                <tr>
                    <td><?= $this->Number->format($chamado->id) ?></td>
                    <td>
                        <?= $chamado->hasValue('cliente') ? 
                            $this->Html->link($chamado->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $chamado->cliente->id]) 
                            : '' 
                        ?>
                    </td>
                    <td>
                        <?= $chamado->hasValue('tecnico') ? 
                            $this->Html->link($chamado->tecnico->nome, ['controller' => 'Tecnicos', 'action' => 'view', $chamado->tecnico->id]) 
                            : '' 
                        ?>
                    </td>

                    <td>
                        <?= $chamado->hasValue('categoria') ? 
                        $this->Html->link($chamado->categoria->nome, ['controller' => 'Categorias', 'action' => 'view', $chamado->categoria->id])
                        : ''
                        ?>
                    </td>
                    <td><?= h($chamado->titulo) ?></td>
                    <td><?= h($chamado->status) ?></td>
                    <td><?= h($chamado->created) ?></td>
                    <td><?= h($chamado->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chamado->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chamado->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $chamado->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Tem certeza de que deseja excluir o chamado?'),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>