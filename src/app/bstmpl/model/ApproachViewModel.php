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
				'title' => 'Hofmänner New Media',
// 				'markerUrl' => (string) $this->getContextAssetsUrl(),
				'contentHtml' => '<h2>Hofmänner New Media</h2><p>Stadthausstrasse 65, 8400 Winterthur</p>'
		);
		
		return $markers;
	}
	
	private function getContextAssetsUrl($asset = null) {
		if (null === $asset) {
			$asset = 'gmap-marker.svg';
		}
		
		return HtmlUtils::contentsToHtml($this->view->getHttpContext()->getAssetsUrl('bstmpl', true)->ext(array('img', $asset)));
	}
}