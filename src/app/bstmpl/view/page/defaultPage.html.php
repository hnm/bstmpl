<?php
    use page\ui\PageHtmlBuilder;
	use n2n\impl\web\ui\view\html\HtmlView;
 
    $view = HtmlView::view($this);
    $html = HtmlView::html($this);
    
    $pageHtml = new PageHtmlBuilder($view);
    $pageHtml->meta()->applyMeta();
     
    $view->useTemplate('..\bsTemplate.html');
?>
 
<?php $pageHtml->contentItems('main') ?>