<div class="guests form">
<?php echo $this->Form->create('Guest');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Guest', true)); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('time_arrived');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Guests', true)), array('action' => 'index'));?></li>
	</ul>
</div>