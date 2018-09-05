<?php 
	use n2n\web\http\Response;
	use n2n\core\N2N;
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\core\err\ThrowableModel;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	
	$throwableModel = $view->getParam('throwableModel'); 
	$view->assert($throwableModel instanceof ThrowableModel) ;
	
	$httpStatus = N2N::getCurrentResponse()->getStatus();
	$title = $httpStatus . ' ' . Response::textOfStatusCode(N2N::getCurrentResponse()->getStatus());
	
	$view->useTemplate('..\bsTemplate.html', array('title' => $html->getText('error_404_title')));
	
	$html->meta()->setTitle($title);
?>
<p><?php $html->text('error_404_message') ?></p>

<?php if (N2N::isDevelopmentModeOn()): ?>
	<section>
		<?php $html->out($throwableModel->getTitle()) ?>
		<div class="alert alert-danger"><?php $html->out($throwableModel->getException()->getMessage()) ?></div>
		
		
		<?php $view->import('\n2n\core\view\errorpages\inc\statusDevContent.html', array('throwableModel' => $throwableModel)) ?>
	</section>
<?php endif ?>

<p>
	<a href="javascript:history.back()"><?php $html->text('back_to_last_page') ?></a> | 
	<?php $html->linkToContext('', $html->getText('back_to_start_page')) ?>
</p>

