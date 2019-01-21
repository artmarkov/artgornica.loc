<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('yee/event', 'Private');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-private">
    <h1><?= Html::encode($this->title) ?></h1>

  <?php echo '<pre>' . print_r($model, true) . '</pre>'; ?>
<h2>Table</h2>
				<table class="table table-striped">
					<!-- table head -->
					<thead>
						<tr>
							<th>#</th>
							<th>Item Name</th>
							<th class="hidden-sm">Description</th>
							<th>Qty</th>
							<th>Unit price</th>
							<th>Total</th>
						</tr>
					</thead>
					
					<!-- table items -->
					<tbody>
						<tr><!-- item -->
							<td>1</td>
							<td>PC Case</td>
							<td class="hidden-sm">Unique side and front panel design with</td>
							<td>2</td>
							<td>$20</td>
							<td>$40</td>
						</tr>
						<tr><!-- item -->
							<td>2</td>
							<td>LCD Display</td>
							<td class="hidden-sm">Side panel with TAC 2.0 ventilation holes</td>
							<td>1</td>
							<td>$102</td>
							<td>$102</td>
						</tr>
						<tr><!-- item -->
							<td>3</td>
							<td>Mobile Phone</td>
							<td class="hidden-sm">Mesh front panel design to improve the airflow</td>
							<td>3</td>
							<td>$544</td>
							<td>$1632</td>
						</tr>
						<tr><!-- item -->
							<td>4</td>
							<td>HDD Disk</td>
							<td class="hidden-sm">Stylish mesh front panel strips to maximize air</td>
							<td>4</td>
							<td>$97</td>
							<td>$388</td>
						</tr>
					</tbody>
				</table>

    <code><?= __FILE__ ?></code>
</div>
