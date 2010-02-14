<div class="commands">
<?php if ($this->Session->check('SeeDB.commands')):?>
        <?php $commands = $this->Session->read('SeeDB.commands'); ?>
        <div class="command">
                <?php foreach ($commands as $command): ?>
                        <span class="text"><?php echo $command['command']; ?></span>
                <?php endforeach; ?>
        </div>
        <div class="seedb form">
        <?php echo $this->Form->create('Seedb', array('url'=>'/seedb/clear'));?>
        <?php echo $this->Form->end(__('Submit', true));?>
        </div><?php /*.seedb.form */ ?>
<?php else: ?>
        <div class="seedb form">
        <?php echo $this->Form->create('Seedb', array('url'=>'/seedb/interpret'));?>
                <fieldset>
                        <legend><?php printf(__('Execute commands in %s', true), __('Seedb', true)); ?></legend>
                <?php
                        echo $this->Form->input('commands', array('type'=>'textarea'));
                ?>
                </fieldset>
        <?php echo $this->Form->end(__('Submit', true));?>
        </div><?php /*.seedb.form */ ?>
<?php endif; ?>
</div>

<div class="databases list">
    <div class="text">
        <span>Databases available:</span>
    </div>
    <?php foreach($databases as $database): ?>
    <div class="database" id="database-<?php echo $database['Database']['id']; ?>">
        <span class="name"><?php echo $database['Database']['name']; ?></span>
        <!--
        <div class="tables">
            <?php if (array_key_exists('Table', $database)): ?>
            <?php foreach($database['Table'] as $table): ?>
            <div class="table" id="<?php echo $table['id']; ?>">
                <span class="name"><?php echo $table['name']; ?></span>
            </div><?php /*.table */ ?>
            <?php endforeach; ?>
            <?php else: ?>
            <span class="warning">No tables found</span>
            <?php endif; ?>
        </div><?php /*.tables */ ?>
        -->
    </div><?php /*.database */ ?>
    <?php endforeach; ?>
</div><?php /*.databases */ ?>