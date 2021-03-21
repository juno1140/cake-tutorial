<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bidmessage $bidmessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bidmessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bidmessages form content">
            <?= $this->Form->create($bidmessage) ?>
            <fieldset>
                <legend><?= __('Add Bidmessage') ?></legend>
                <?php
                    echo $this->Form->control('bidinfo_id');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('message');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
