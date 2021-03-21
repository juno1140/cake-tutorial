<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bidrequest $bidrequest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bidrequests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bidrequests form content">
            <?= $this->Form->create($bidrequest) ?>
            <fieldset>
                <legend><?= __('Add Bidrequest') ?></legend>
                <?php
                    echo $this->Form->control('biditem_id', ['options' => $biditems]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
