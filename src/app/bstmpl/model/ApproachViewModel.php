<?php
namespace bstmpl\model;

use n2n\context\RequestScoped;
use n2n\impl\web\ui\view\html\HtmlUtils;
use n2n\impl\web\ui\view\html\HtmlView;

class ApproachViewModel implements RequestScoped {
	
	private $view;
	
	public function setup(HtmlView $view) {
		$this->view = $view;
	}
	
	public function getMarkers() {
		$markers = array();
		$markers[] = array(
				'lat' => '47.500189',
				'lng' => '8.729322',
				'address' => 'Hofmänner New Media, Stadthausstrasse 65, 8400 Winterthur',
				'title' => 'Hofmänner New Media',
// 				'icon' => array(
// 						'url' => $this->getContextAssetsUrl('hnm-marker.svg'),
// 						'sizeScaled' => array(
// 								'width' => 80,
// 								'height' => 97
// 						)
// 				),
				'info' => array(
						'title' => 'Besuchen Sie uns.',
						'description' => 'Hofmänner New Media, Stadthausstrasse 65, 8400 Winterthur'
				)
		);
		
		return $markers;
	}
	
	private function getContextAssetsUrl($asset) {
		return HtmlUtils::contentsToHtml($this->view->httpContext($this->view)->getAssetsUrl('bstmpl', true)->ext(array('img', $asset)));
	}
}