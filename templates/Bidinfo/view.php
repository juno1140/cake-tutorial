<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bidinfo $bidinfo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bidinfo'), ['action' => 'edit', $bidinfo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bidinfo'), ['action' => 'delete', $bidinfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidinfo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bidinfo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bidinfo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bidinfo view content">
            <h3><?= h($bidinfo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Biditem') ?></th>
                    <td><?= $bidinfo->has('biditem') ? $this->Html->link($bidinfo->biditem->name, ['controller' => 'Biditems', 'action' => 'view', $bidinfo->biditem->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $bidinfo->has('user') ? $this->Html->link($bidinfo->user->id, ['controller' => 'Users', 'action' => 'view', $bidinfo->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bidinfo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($bidinfo->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bidinfo->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bidmessages') ?></h4>
                <?php if (!empty($bidinfo->bidmessages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Bidinfo Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($bidinfo->bidmessages as $bidmessages) : ?>
                        <tr>
                            <td><?= h($bidmessages->id) ?></td>
                            <td><?= h($bidmessages->bidinfo_id) ?></td>
                            <td><?= h($bidmessages->user_id) ?></td>
                            <td><?= h($bidmessages->message) ?></td>
                            <td><?= h($bidmessages->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bidmessages', 'action' => 'view', $bidmessages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bidmessages', 'action' => 'edit', $bidmessages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bidmessages', 'action' => 'delete', $bidmessages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidmessages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
