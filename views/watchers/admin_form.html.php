<?php

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->id,
		'empty' => false,
		'object' => $t('watcher')
	]
]);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">
	<?=$this->form->create($item) ?>
		<?= $this->form->field('id', [
			'type' => 'hidden'
		]) ?>

		<div class="grid-row grid-row-last">
			<div class="grid-column-left">
				<?= $this->form->field('code', [
					'type' => 'text',
					'label' => $t('Code')
				]) ?>
				<?= $this->form->field('type', [
					'type' => 'select',
					'label' => $t('Type'),
					'list' => $types
				]) ?>
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('created', [
					'label' => $t('Created'),
					'disabled' => true,
					'value' => $item->exists() ? $this->date->format($item->created, 'datetime') : null
				]) ?>
				<?= $this->form->field('uses_left', [
					'type' => 'number',
					'label' => $t('Uses left')
				]) ?>
			</div>
		</div>

		<div class="bottom-actions">
			<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'button large save']) ?>
		</div>
	<?=$this->form->end() ?>
</article>