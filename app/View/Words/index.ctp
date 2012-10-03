<div class="words index">
	<h2><?php echo __('Words'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($words as $word): ?>
	<tr>
		<td><?php echo h($word['Word']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($word['User']['username'], array('controller' => 'users', 'action' => 'view', $word['User']['id'])); ?>
		</td>
		<td><?php echo h($word['Word']['body']); ?>&nbsp;</td>
		<td><?php echo h($word['Word']['created']); ?>&nbsp;</td>
		<td><?php echo h($word['Word']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $word['Word']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $word['Word']['id']), null, __('Are you sure you want to delete # %s?', $word['Word']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
