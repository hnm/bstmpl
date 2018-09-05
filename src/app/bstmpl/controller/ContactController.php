<?php
namespace bstmpl\controller;

use bstmpl\model\ContactForm;
use n2n\web\http\controller\ControllerAdapter;

class ContactController extends ControllerAdapter {
	
	public function index() {
		$contactForm = new ContactForm();
		
		if ($this->dispatch($contactForm, 'send')) {
			$this->redirectToController('danke');
			return;
		}
		
		$this->forward('\bstmpl\view\contact\contactForm.html', array('contactForm' => $contactForm));
		
	}
	
	public function doDanke() {
		$this->assignHttpCacheControl(new \DateInterval('PT30M'));
		$this->assignResponseCacheControl(new \DateInterval('P30D'));
		
		$this->forward('\bstmpl\view\contact\contactThanks.html');
	}
	
}