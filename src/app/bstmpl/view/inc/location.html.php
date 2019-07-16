<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use bstmpl\model\ApproachViewModel;
	use n2n\util\StringUtils;
use bstmpl\model\BsTemplateModel;

	$view = HtmlView::view($view);
	$html = HtmlView::html($view);

	$viewModel = $view->lookup(ApproachViewModel::class);
	$view->assert($viewModel instanceof ApproachViewModel);
	$viewModel->setup($view);
	
	$meta = $html->meta();
		
	$gmapsData = array(
			'v' => '3',
			'key' => test('no Google Maps api-key defined')
	);
	
	
	$meta->bodyEnd()->addJsUrl('https://maps.googleapis.com/maps/api/js?' . http_build_query($gmapsData));
	$meta->bodyEnd()->addJs('js/gmaps.js?v=' . BsTemplateModel::ASSETS_VERSION);
?>

<div class="embed-responsive embed-responsive-21by9">
	<div class="tmpl-map embed-responsive-item" data-lat="47.3746714" data-lng="8.5437078" data-locations="<?php $html->out(StringUtils::jsonEncode($viewModel->getMarkers())) ?>">
	</div>
</div>