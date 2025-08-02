<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chamado $chamado
 * @var \Cake\Collection\CollectionInterface|string[] $clientes
 * @var \Cake\Collection\CollectionInterface|string[] $tecnicos
 * @var \Cake\Collection\CollectionInterface|string[] $categorias
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Chamados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="chamados form content">
            <?= $this->Form->create($chamado) ?>
            <fieldset>
                <legend><?= __('Novo Chamado') ?></legend>
                <?php
                    echo $this->Form->control('cliente_id', ['options' => $clientes, 'empty' => true]);
                    echo $this->Form->control('tecnico_id', ['options' => $tecnicos, 'empty' => true]);
                    echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => true]);
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('status', [
                        'type' => 'select',
                        'options' => ['Aberto' => 'Aberto', 'Em Andamento' => 'Em Andamento', 'Fechado' => 'Fechado'],
                        'empty' => true
                    ]);
                    

                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
