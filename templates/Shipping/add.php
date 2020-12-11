<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipping $shipping
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Shipping'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipping form content">
            <?= $this->Form->create($shipping) ?>
            <fieldset>
                <legend><?= __('Add Shipping') ?></legend>
                <?php
                    echo $this->Form->control('postcode');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('long_product');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
