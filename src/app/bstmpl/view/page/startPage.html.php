<?php
    use page\ui\PageHtmlBuilder;
	use n2n\impl\web\ui\view\html\HtmlView;
	use bstmpl\model\BsTemplateModel;
 
    $view = HtmlView::view($this);
    $html = HtmlView::html($this);
    
    $pageHtml = new PageHtmlBuilder($view);
    $pageHtml->meta()->applyMeta();
     
    $view->useTemplate('..\bsTemplate.html', array('bodyClass' => 'ec-start-page'));
?>
 
<?php $view->panelStart(BsTemplateModel::PANEL_NAME_TOP) ?>
	<?php $pageHtml->contentItems('top') ?>
<?php $view->panelEnd() ?>
<?php $pageHtml->contentItems('main') ?>