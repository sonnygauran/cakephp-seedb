<div class="tables form">
<?php echo $this->Form->create('Table');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Table', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('database_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Table.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Table.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Tables', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Databases', true)), array('controller' => 'databases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Database', true)), array('controller' => 'databases', 'action' => 'add')); ?> </li>
	</ul>
</div>