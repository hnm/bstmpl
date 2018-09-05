<?php
namespace bstmpl\bo;

use page\bo\PageController;
use n2n\persistence\orm\annotation\AnnoTable;
use n2n\reflection\annotation\AnnoInit;
use page\annotation\AnnoPage;
use page\annotation\AnnoPageCiPanels;

class DefaultPageController extends PageController {
	private static function _annos(AnnoInit $ai) {
		$ai->c(new AnnoTable('bstmpl_default_page_controller'));
		$ai->m('default', new AnnoPage(true), new AnnoPageCiPanels('main'));
	}
	
	public function default() {
		$this->assignHttpCacheControl(new \DateInterval('PT30M'));
		$this->assignResponseCacheControl(new \DateInterval('P30D'));
		
		$this->forward('..\view\page\defaultPage.html');
	}
}