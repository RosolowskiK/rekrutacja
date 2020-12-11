<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zone $zone
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Zone'), ['action' => 'edit', $zone->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Zone'), ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Zones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Zone'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="zones view content">
            <h3><?= h($zone->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($zone->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zone') ?></th>
                    <td><?= $this->Number->format($zone->zone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($zone->price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
