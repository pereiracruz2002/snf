<?php if (!$this->input->is_ajax_request()) include_once(dirname(__FILE__) . '/../header.php'); ?>

<div class="page-header">
<h1><?= ucfirst($titulo) ?></h1>
</div>

<?php
if (method_exists($c, '_filter_pre_visualizar'))
	$c->_filter_pre_visualizar($item, $fields);
?>


	<?php foreach ($models as $model => $titulo_model): ?>

		<?php if ($titulo_model['titulo']): $i = 0; ?>

			<?php if (isset($titulo_model['has_many'])): ?>
				<h4><?php echo count($item); ?> <?php echo $titulo_model['titulo'] ?></h4>

			<?php foreach ($item as $it): ?>
					<dl class="dl-horizontal">
					<?php foreach ($this->{$model}->fields as $k => $v): ?>
							<dt><?php echo $i + 1 ?>) <?php echo $v['label'] ?></dt>
							<?php if (strstr($v['class'], 'imagem')): ?>
								<?php if ($item[$i]->{$k}): ?>
									<img src="<?php echo image_url($item[$i]->{$k}) ?>" width="180" />
								<?php endif; ?>


					<?php elseif (strstr($v['class'], 'valor')): ?>
								<dd>R$ <?php echo formata_valor($item[$i]->{$k}) ?></dd>
							<?php elseif (strstr($v['class'], 'time')): ?>
								<dd><?php echo formata_time($item[$i]->{$k}) ?></dd>
							<?php elseif (strstr($v['class'], 'data')): ?>
								<dd><?php echo formata_data($item[$i]->{$k}) ?></dd>
							<?php elseif (isset($v['from'])): ?>
								<dd><?php echo get_from($v['from'], $item[$i]->{$k}) ?></dd>
							<?php elseif (isset($v['serialized'])): ?>
								<dd>
								<?php $arrSerial = unserialize($item[$i]->{$k}) ?>
									<?php foreach ($arrSerial as $sK => $sV): ?>
										<p><?php echo $sK ?>: <?php echo $sV ?></p>
									<?php endforeach; ?>
								</dd>
								<?php else: ?>
								<dd><?php echo $item[$i]->{$k} ?></dd>
							<?php endif; ?>
						<?php endforeach; ?>

						</dl>
				<?php $i++;
			endforeach; ?>

				<?php else: ?>
						<dl class="dl-horizontal">
							<?php foreach ($this->{$model}->fields as $k => $v): ?>

									<dt><?php echo $v['label'] ?></dt>
									<dd>
										<?php if (strstr($v['class'], 'imagem')): ?>
											<img src="<?php echo base_url() ?>uploads/<?php echo $item[$i]->{$k} ?>" />
										<?php elseif (strstr($v['class'], 'valor')): ?>
											R$ <?php echo formata_valor($item[$i]->{$k}) ?>
										<?php elseif (strstr($v['class'], 'time')): ?>
											<?php echo formata_time($item[$i]->{$k}) ?>
										<?php elseif (strstr($v['class'], 'data')): ?>
											<?php echo formata_data($item[$i]->{$k}) ?>
										<?php elseif (isset($v['from'])): ?>
											<?php echo get_from($v['from'], $item[$i]->{$k}) ?>
										<?php else: ?>
											<?php echo $item[$i]->{$k} ?>

										<?php endif; ?>
									</dd>

							<?php endforeach; ?>

						</table>
				<?php endif; ?>

			<?php endif; ?>
		<?php endforeach; ?>
<?php
if (method_exists($c, '_pos_visualizar'))
	$c->_pos_visualizar($item);
?>

<?php
if (!$this->input->is_ajax_request())
	include_once(dirname(__FILE__) . '/../footer.php'); ?>
