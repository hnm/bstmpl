<?php
namespace bstmpl\bo;

use page\bo\PageController;
use n2n\persistence\orm\annotation\AnnoTable;
use n2n\reflection\annotation\AnnoInit;
use page\annotation\AnnoPage;
use page\annotation\AnnoPageCiPanels;
use bstmpl\controller\ContactController;

class ContactPageController extends PageController {
	private static function _annos(AnnoInit $ai) {
		$ai->c(new AnnoTable('bstmpl_contact_page_controller'));
		$ai->m('contact', new AnnoPage(true), new AnnoPageCiPanels('main'));
	}
	
	public function contact(ContactController $contactController, ?array $delegateParams = null) {
		$this->delegate($contactController);
	}
}