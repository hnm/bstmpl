<?php
namespace bstmpl\controller;

use n2n\web\http\controller\ControllerAdapter;
use n2n\util\ex\IllegalStateException;
use n2n\core\err\ThrowableModel;

class ExceptionController extends ControllerAdapter {
	
	public function index() {
		$this->forward('..\view\errorpages\status.html', 
				array('throwableModel' => new ThrowableModel(new IllegalStateException())));
	}
}