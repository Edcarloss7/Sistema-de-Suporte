<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tecnico> $tecnicos
 */
?>
<div class="tecnicos index content">
    <?= $this->Html->link(__('Novo Tecnico'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tecnicos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('especialidade') ?></th>
                    <th><?= $this->Paginator->sort('criado') ?></th>
                    <th><?= $this->Paginator->sort('modificado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tecnicos as $tecnico): ?>
                <tr>
                    <td><?= $this->Number->format($tecnico->id) ?></td>
                    <td><?= h($tecnico->nome) ?></td>
                    <td><?= h($tecnico->email) ?></td>
                    <td><?= h($tecnico->especialidade) ?></td>
                    <td><?= h($tecnico->created) ?></td>
                    <td><?= h($tecnico->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tecnico->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tecnico->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $tecnico->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Tem certeza de que deseja excluir este(s) técnico(s)?'),
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