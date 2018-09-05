<?php

namespace bstmpl\controller;

use n2n\web\http\controller\ControllerAdapter;

class FaviconController extends ControllerAdapter {
	
	public function index() {
		$this->redirectToContext(array('assets', 'bstmpl', 'img', 'favicon.png'));
	}
}

