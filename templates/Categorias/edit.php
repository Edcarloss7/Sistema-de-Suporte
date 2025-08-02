<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar Categoria'),
                ['action' => 'delete', $categoria->id],
                ['confirm' => __('Tem certeza que deseja excluir essa categoria?'), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categorias form content">
            <?= $this->Form->create($categoria) ?>
            <fieldset>
                <legend><?= __('Editar Categoria') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
