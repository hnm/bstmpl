<?php
	use bootstrap\ui\BsFormHtmlBuilder;
	use n2n\impl\web\ui\view\html\HtmlView;
	use bootstrap\ui\Bs;
	use bstmpl\model\ContactForm;
    use page\ui\PageHtmlBuilder;
    use ch\hnm\util\n2n\bot\ui\BotHtmlBuilder;

	$view = HtmlView::view($view);
// 	$formHtml = HtmlView::formHtml($view);
// 	$html = HtmlView::html($view);
	
	$contactForm = $view->getParam('contactForm');
	$view->assert($contactForm instanceof ContactForm);
	
	$pageHtml = new PageHtmlBuilder($view);
	$pageHtml->meta()->applyMeta();
	
// 	$ariaFormHtml = new AriaFormHtmlBuilder($view);
	$botHtml = new BotHtmlBuilder($view);
	
	$bsFormHtml = new BsFormHtmlBuilder($view, Bs::req()->row('col-sm-3', 'col-sm-9', 'offset-sm-3'));
	
	$view->useTemplate('\bstmpl\view\bsTemplate.html');
?>
<?php if (true): ?>
	<?php $view->import('\bstmpl\view\inc\location.html') ?>
<?php endif ?>

<div class="row">
	<div class="offset-md-2 col-md-8">
		<?php $bsFormHtml->open($contactForm) ?>
			<?php $bsFormHtml->inputGroup('name') ?>
			<?php $bsFormHtml->inputGroup('email') ?>
			<?php $bsFormHtml->inputGroup('subject') ?>
			<?php $bsFormHtml->textareaGroup('message', Bs::cAttr('rows', 6)) ?>
			<?php $bsFormHtml->buttonSubmitGroup('send', $view->getL10nText('contact_form_submit_label')) ?>
			<?php $botHtml->hiddenImage() ?>
		<?php $bsFormHtml->close() ?>
	</div>
</div>

