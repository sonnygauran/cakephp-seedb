<?php echo $this->Html->docType('xhtml-strict')."\n"; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>

        <title>
            <?php __('SeeDB Database Visualizer:'); ?> <?php echo $title_for_layout; ?>
            
        </title>
        <?php echo $this->Html->meta('icon'); ?>
        <?php echo $this->Html->css('seedb'); ?>
        <?php echo $this->Javascript->link(array('jquery-1.4.1.min','jquery.SeeDB')); ?>
        <?php echo $scripts_for_layout; ?>
        
    </head>
    <body>
        <div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('SeeDB: Database Visualizer', true), '/'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>

    </body>
</html>