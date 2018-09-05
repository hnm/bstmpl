<?php
namespace bstmpl\bo;

use page\bo\PageController;
use n2n\persistence\orm\annotation\AnnoTable;
use n2n\reflection\annotation\AnnoInit;
use page\annotation\AnnoPage;
use page\annotation\AnnoPageCiPanels;

class StartPageController extends PageController {
	private static function _annos(AnnoInit $ai) {
		$ai->c(new AnnoTable('bstmpl_start_page_controller'));
		$ai->m('start', new AnnoPage(true), new AnnoPageCiPanels('top', 'main'));
	}
	
	public function start() {
		$this->assignHttpCacheControl(new \DateInterval('PT30M'));
		$this->assignResponseCacheControl(new \DateInterval('P30D'));
		
		$this->forward('..\view\page\startPage.html');
	}
}