<?php

$this->set([
	'page' => [
		'type' => 'multiple',
		'object' => $t('watchers')
	]
]);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?> use-list">

	<div class="top-actions">
		<?= $this->html->link($t('new watcher'), ['action' => 'add', 'library' => 'ecommerce_rent'], ['class' => 'button add']) ?>
	</div>

	<?php if ($data->count()): ?>
		<table>
			<thead>
				<tr>
					<td data-sort="code" class="code emphasize list-sort"><?= $t('Code') ?>
					<td data-sort="type" class="type list-sort"><?= $t('Type') ?>
					<td data-sort="uses-left" class="uses-left list-sort"><?= $t('Uses Left') ?>
					<td data-sort="created" class="date created list-sort desc"><?= $t('Created') ?>
					<td class="actions">
						<?= $this->form->field('search', [
							'type' => 'search',
							'label' => false,
							'placeholder' => $t('Filter'),
							'class' => 'list-search'
						]) ?>
			</thead>
			<tbody class="list">
				<?php foreach ($data as $item): ?>
					<?php $type = $item->type() ?>
				<tr data-id="<?= $item->id ?>">
					<td class="code emphasize"><?= $item->code ?>
					<td class="type"><?= $type->title() ?>
					<td class="uses-left"><?= $item->uses_left ?: '–' ?>
					<td class="date created">
						<time datetime="<?= $this->date->format($item->created, 'w3c') ?>">
							<?= $this->date->format($item->created, 'date') ?>
						</time>
					<td class="actions">
						<?= $this->html->link($t('open'), ['id' => $item->id, 'action' => 'edit', 'library' => 'ecommerce_rent'], ['class' => 'button']) ?>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="none-available"><?= $t('No items available, yet.') ?></div>
	<?php endif ?>
</article>