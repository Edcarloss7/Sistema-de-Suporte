<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Categoria> $categorias
 */
?>
<div class="categorias index content">
    <?= $this->Html->link(__('Nova Categoria'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Categorias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('criado') ?></th>
                    <th><?= $this->Paginator->sort('modificado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $this->Number->format($categoria->id) ?></td>
                    <td><?= h($categoria->nome) ?></td>
                    <td><?= h($categoria->created) ?></td>
                    <td><?= h($categoria->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $categoria->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoria->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $categoria->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Tem certeza de que deseja excluir essa categoria?'),
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