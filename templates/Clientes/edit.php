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
            <?= $this->Form->postLink(
                __('Deletar Cliente'),
                ['action' => 'delete', $cliente->id],
                ['confirm' => __('Tem certeza que deseja excluir esse cliente?'), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientes form content">
            <?= $this->Form->create($cliente) ?>
            <fieldset>
                <legend><?= __('Editar Cliente') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('email');
                    echo $this->Form->control('telefone');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
