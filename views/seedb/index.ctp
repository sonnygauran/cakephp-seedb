<?php
$database_was_selected = $this->Session->check('Database.selected');
$database_selected = $this->Session->read('Database.selected');
?>
<?php
/**
 * Handles `SeeDB.commands` from the session
 */
?>
<div class="commands">
<?php
/**
 * If commands have been set in session:
 */
?>
<?php if ($this->Session->check('SeeDB.commands')):?>
        <?php $commands = $this->Session->read('SeeDB.commands'); ?>
        <div class="command">
                <?php foreach ($commands as $count => $command):
                $invalid = '';
                if ($command['valid'] == false)
                    $invalid = ' invalid';
                ?>
                        <span class="text<?php echo $invalid; ?>"><?php echo $command['command']; ?></span>
                        <a href="#command-<?php echo $count; ?>" class="go">Run</a>
                <?php endforeach; ?>
        </div>
        <div class="seedb form">
        <?php echo $this->Form->create('Seedb', array('url'=>'/seedb/execute'));?>
        <?php echo $this->Form->end(__('Execute', true));?>
        </div><?php /*.seedb.form */ ?>
        <div class="seedb form">
            <?php echo $this->Form->create('Seedb', array('url'=>'/seedb/clear'));?>
            <?php echo $this->Form->end(__('Clear', true));?>
        </div><?php /*.seedb.form */ ?>
<?php else: ?>
<?php
/**
 * If no commands available in the session.
 */
?>
        <div class="seedb form">
        <?php echo $this->Form->create('Seedb', array('url'=>'/seedb/interpret'));?>
                <fieldset>
                        <legend><?php printf(__('Execute commands in %s', true), __('Seedb', true)); ?></legend>
                        <?php if ($database_was_selected):?>
                        <span class="info">By selecting a database, the "USE" statement shall be included for convenience at the start of your every query.</span>
                        <span class="command ok">
                            <span class="database">USE <?php echo $database_selected['name']; ?>;</span>
                            <span class="database clear"><?php echo $this->Html->link(__('Clear', true), array('controller'=>'databases','action' => 'deselect', $database_selected['id'])); ?></span>
                        </span>
                                                
                        <?php else: ?>
                        <span class="info">In executing commands to MySQL, </span>
                        <span class="info">You have to select a database by clicking "Select" below,</span>
                        <span class="info">or manually include the <em>DATABASE</em> name in a "USE" statement:</span>
                        <span class="command warning">
                            <span class="database"># USE mysql;</span>
                        </span>
                        <?php endif; ?>
                <?php
                        echo $this->Form->input('commands', array('type'=>'textarea', 'label'=>''));
                ?>
                </fieldset>
        <?php echo $this->Form->end(__('Execute', true));?>
        </div><?php /*.seedb.form */ ?>
<?php endif; ?>
</div>
<?php echo $this->element('databases'.DS.'enum', compact('databases')); ?>
<?php if ($database_selected != null ): ?>
    <div class="tables">
        <?php foreach($databases as $database): ?>
            <?php if ($database['Database']['name'] == $database_selected['name']): ?>
                <?php if (count($database['Table']) > 0): ?>
                    <?php foreach($database['Table'] as $table): ?>
                        <div class="table" id="<?php echo $table['id']?>">
                            <span class="name"><?php echo $table['name']; ?></span>
                            <div class="rows">
                                <?php foreach($table['Row'] as $row): ?>
                                <div class="row" id="<?php echo $row['id']; ?>">
                                    <span class="name"><?php echo $row['name']; ?></span>
                                    <div class="info">
                                        <span class="type"><?php echo $row['type']; ?></span>
                                        <?php if (!empty($row['length'])): ?>
                                            <span class="length">(<?php echo $row['length']; ?>)</span>
                                        <?php endif; ?>
                                    </div><!--
                                    <pre>
<?php echo print_r($row, true); ?>
                                    </pre> -->
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="stats">
                                <span class="type">
                                    <span class="title">Records:</span>
                                    <span class="value"><?php echo $table['records']; ?></span>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?><?php /* List Tables; */ ?>
                <?php endif; ?><?php /* If there are tables available */ ?>
            <?php endif; ?><?php /* If the current database for the list matches the selected database */ ?>
        <?php endforeach; ?><?php /* List Databases */ ?>
    </div>
<?php else: ?>
    <div class="tables">
        
    </div>
<?php endif; ?><?php /**/ ?>