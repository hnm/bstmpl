<?php
namespace bstmpl\controller;

use n2n\web\http\controller\ControllerAdapter;

class LayoutController extends ControllerAdapter {
	
	public function index() {
		$this->forward('~\view\layout\overview.html');
	}
	
	public function doGrid() {
		$this->forward('~\view\layout\grid.html');
	}
	
	public function doInline() {
		$this->forward('~\view\layout\inline.html');
	}
}