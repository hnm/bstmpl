<?php
	use n2n\core\N2N;
	use n2n\impl\web\ui\view\html\HtmlView;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$view->useTemplate('view\bsTemplate.html');
?>

<div class="jumbotron">
    <h1>Styleguide für <?php $html->esc(N2N::getAppConfig()->general()->getPageName()) ?></h1>
    <p>In diesem File werden die wichtigsten Styles zusammengefasst.</p>
</div>

<?php $view->import('view\styleguide\include\colors.html') ?>
<?php $view->import('view\styleguide\include\types.html') ?>