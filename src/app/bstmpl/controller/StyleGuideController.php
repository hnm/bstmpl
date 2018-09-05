<?php
namespace bstmpl\controller; 

use n2n\web\http\controller\ControllerAdapter;

class StyleGuideController extends ControllerAdapter {
	public function index() {
		$this->forward('view\styleguide\styleguide.html');
	}	
}