<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resposta $resposta
 * @var string[]|\Cake\Collection\CollectionInterface $chamados
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resposta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resposta->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Respostas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="respostas form content">
            <?= $this->Form->create($resposta) ?>
            <fieldset>
                <legend><?= __('Edit Resposta') ?></legend>
                <?php
                    echo $this->Form->control('chamado_id', ['options' => $chamados, 'empty' => true]);
                    echo $this->Form->control('mensagem');
                    echo $this->Form->control('criado_por');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
