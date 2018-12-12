<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);

	$view->useTemplate('~\view\bsTemplate.html', ['title' => 'Layout Tests']);
?>

<ul>
	<li><?php $html->linkToPath('grid', 'Grid Test') ?></li>
	<li><?php $html->linkToController('inline', 'Inline Test') ?></li>
</ul>
