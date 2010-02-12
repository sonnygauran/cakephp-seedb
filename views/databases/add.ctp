<div class="databases form">
<?php echo $this->Form->create('Database');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Database', true)); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Databases', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Tables', true)), array('controller' => 'tables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Table', true)), array('controller' => 'tables', 'action' => 'add')); ?> </li>
	</ul>
</div>