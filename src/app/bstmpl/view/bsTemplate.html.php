<?php 
	use page\ui\PageHtmlBuilder;
	use n2n\impl\web\ui\view\html\HtmlView;
	use bstmpl\model\BsTemplateModel;

	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$title = $view->getParam('title', false);
	$showTitle = $view->getParam('showTitle', false);
	$fluid = $view->getParam('fluid', false, false);

	$pageHtml = new PageHtmlBuilder($view);
	
	$view->useTemplate('boilerplate.html', array('fluid' => $fluid));
	
	$classNameMainContent = null;
	
	if ($view->hasPanel(BsTemplateModel::PANEL_NAME_LEFT)) {
		if ($view->hasPanel(BsTemplateModel::PANEL_NAME_RIGHT)) {
			$classNameMainContent = 'col-md-6';
		} else {
			$classNameMainContent = 'col-md-9';
		}
	} else if ($view->hasPanel(BsTemplateModel::PANEL_NAME_RIGHT)) {
		$classNameMainContent = 'col-md-9';
	}
?> 
<div class="container<?php $html->out($fluid ? '-fluid' : '') ?> main-container" role="main">
	<?php if (null === $classNameMainContent): ?>
		<?php if (false !== $title): ?>
			<h1 <?php $view->out($showTitle === false ? ' class="sr-only"'  : '') ?>><?php $pageHtml->title($title) ?></h1>
		<?php endif ?>
		<?php $view->importContentView() ?>
	<?php else: ?>
		<div class="row">
			<?php if ($view->hasPanel(BsTemplateModel::PANEL_NAME_LEFT)): ?>
				<div class="col-md-3">
					<?php $view->importPanel(BsTemplateModel::PANEL_NAME_LEFT) ?>
				</div>
			<?php endif ?>
			<div class="<?php $html->out($classNameMainContent)?>">
				<?php if (false !== $title): ?>
					<h1 <?php $view->out($showTitle === false ? ' class="sr-only"'  : '') ?>><?php $pageHtml->title($title) ?></h1>
				<?php endif ?>
				<?php $view->importContentView() ?>
			</div>
			<?php if ($view->hasPanel(BsTemplateModel::PANEL_NAME_RIGHT)): ?>
				<div class="col-md-3">
					<?php $view->importPanel(BsTemplateModel::PANEL_NAME_RIGHT)?>
				</div>
			<?php endif ?>
		</div>
	<?php endif ?>
</div>