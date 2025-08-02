<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resposta $resposta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Resposta'), ['action' => 'edit', $resposta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Resposta'), ['action' => 'delete', $resposta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resposta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Respostas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Resposta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="respostas view content">
            <h3><?= h($resposta->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chamado') ?></th>
                    <td><?= $resposta->hasValue('chamado') ? $this->Html->link($resposta->chamado->id, ['controller' => 'Chamados', 'action' => 'view', $resposta->chamado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado Por') ?></th>
                    <td><?= h($resposta->criado_por) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($resposta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($resposta->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Mensagem') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($resposta->mensagem)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>