<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico $tecnico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Listar Tecnicos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tecnicos form content">
            <?= $this->Form->create($tecnico) ?>
            <fieldset>
                <legend><?= __('Adicionar Tecnico') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('email');
                    echo $this->Form->control('especialidade');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
