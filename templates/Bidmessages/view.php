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
            <?= $this->Html->link(__('Edit Bidmessage'), ['action' => 'edit', $bidmessage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bidmessage'), ['action' => 'delete', $bidmessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidmessage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bidmessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bidmessage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bidmessages view content">
            <h3><?= h($bidmessage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $bidmessage->has('user') ? $this->Html->link($bidmessage->user->id, ['controller' => 'Users', 'action' => 'view', $bidmessage->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bidmessage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bidinfo Id') ?></th>
                    <td><?= $this->Number->format($bidmessage->bidinfo_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bidmessage->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bidmessage->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
