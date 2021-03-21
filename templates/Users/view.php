<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bidinfo') ?></h4>
                <?php if (!empty($user->bidinfo)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Biditem Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->bidinfo as $bidinfo) : ?>
                        <tr>
                            <td><?= h($bidinfo->id) ?></td>
                            <td><?= h($bidinfo->biditem_id) ?></td>
                            <td><?= h($bidinfo->user_id) ?></td>
                            <td><?= h($bidinfo->price) ?></td>
                            <td><?= h($bidinfo->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bidinfo', 'action' => 'view', $bidinfo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bidinfo', 'action' => 'edit', $bidinfo->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bidinfo', 'action' => 'delete', $bidinfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidinfo->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Biditems') ?></h4>
                <?php if (!empty($user->biditems)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Finished') ?></th>
                            <th><?= __('Endtime') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->biditems as $biditems) : ?>
                        <tr>
                            <td><?= h($biditems->id) ?></td>
                            <td><?= h($biditems->user_id) ?></td>
                            <td><?= h($biditems->name) ?></td>
                            <td><?= h($biditems->finished) ?></td>
                            <td><?= h($biditems->endtime) ?></td>
                            <td><?= h($biditems->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Biditems', 'action' => 'view', $biditems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Biditems', 'action' => 'edit', $biditems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Biditems', 'action' => 'delete', $biditems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $biditems->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Bidmessages') ?></h4>
                <?php if (!empty($user->bidmessages)) : ?>
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
                        <?php foreach ($user->bidmessages as $bidmessages) : ?>
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
            <div class="related">
                <h4><?= __('Related Bidrequests') ?></h4>
                <?php if (!empty($user->bidrequests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Biditem Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->bidrequests as $bidrequests) : ?>
                        <tr>
                            <td><?= h($bidrequests->id) ?></td>
                            <td><?= h($bidrequests->biditem_id) ?></td>
                            <td><?= h($bidrequests->user_id) ?></td>
                            <td><?= h($bidrequests->price) ?></td>
                            <td><?= h($bidrequests->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bidrequests', 'action' => 'view', $bidrequests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bidrequests', 'action' => 'edit', $bidrequests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bidrequests', 'action' => 'delete', $bidrequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidrequests->id)]) ?>
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
