<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use page\ui\PageHtmlBuilder;

	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$pageHtml = new PageHtmlBuilder($view);
	$pageHtml->meta()->applyMeta();

	$view->useTemplate('\bstmpl\view\bsTemplate.html');
?>
<p>
	<?php $html->text('contact_form_thanks_description') ?>
</p>