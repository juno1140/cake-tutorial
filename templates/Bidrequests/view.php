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
            <?= $this->Html->link(__('Edit Bidrequest'), ['action' => 'edit', $bidrequest->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bidrequest'), ['action' => 'delete', $bidrequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidrequest->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bidrequests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bidrequest'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bidrequests view content">
            <h3><?= h($bidrequest->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Biditem') ?></th>
                    <td><?= $bidrequest->has('biditem') ? $this->Html->link($bidrequest->biditem->name, ['controller' => 'Biditems', 'action' => 'view', $bidrequest->biditem->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $bidrequest->has('user') ? $this->Html->link($bidrequest->user->id, ['controller' => 'Users', 'action' => 'view', $bidrequest->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bidrequest->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($bidrequest->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bidrequest->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
