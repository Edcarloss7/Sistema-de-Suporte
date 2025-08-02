<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resposta> $respostas
 */
?>
<div class="respostas index content">
    <?= $this->Html->link(__('New Resposta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Respostas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('chamado_id') ?></th>
                    <th><?= $this->Paginator->sort('criado_por') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($respostas as $resposta): ?>
                <tr>
                    <td><?= $this->Number->format($resposta->id) ?></td>
                    <td><?= $resposta->hasValue('chamado') ? $this->Html->link($resposta->chamado->id, ['controller' => 'Chamados', 'action' => 'view', $resposta->chamado->id]) : '' ?></td>
                    <td><?= h($resposta->criado_por) ?></td>
                    <td><?= h($resposta->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $resposta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resposta->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $resposta->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $resposta->id),
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