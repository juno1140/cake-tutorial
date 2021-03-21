<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Biditem $biditem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $biditem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $biditem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Biditems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="biditems form content">
            <?= $this->Form->create($biditem) ?>
            <fieldset>
                <legend><?= __('Edit Biditem') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('finished');
                    echo $this->Form->control('endtime');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
