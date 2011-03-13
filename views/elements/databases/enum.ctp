<div class="databases list">
    <div class="text">
        <span>Databases available:</span>
    </div>
    <?php foreach($databases as $database):
        $database_selected_class = '';
        if ($database['Database']['id'] == $this->Session->read('Database.selected.id')){
            $database_selected_class = ' selected';
        }
    ?>
    <div class="database<?php echo $database_selected_class; ?>" id="database-<?php echo $database['Database']['id']; ?>">
        <span class="name"><?php echo $database['Database']['name']; ?></span>
        <?php echo $this->Html->link(__('Select', true), array('controller'=>'databases','action' => 'select', $database['Database']['id']), array('class'=>'select')); ?>
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