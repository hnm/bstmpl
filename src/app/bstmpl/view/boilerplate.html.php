<?php
	use n2n\core\N2N;
	use page\ui\PageHtmlBuilder;
	use n2n\impl\web\ui\view\html\HtmlView;
	use bstmpl\model\BsTemplateModel;
	use page\ui\nav\Nav;
	use bootstrap\ui\BootstrapLibrary;
	use page\model\nav\murl\MurlPage;
	use n2nutil\jquery\JQueryLibrary;
	use n2n\l10n\N2nLocale;
	use bstmpl\bo\ContactPageController;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	$request = HtmlView::request($view);
	
	$fluid = $view->getParam('fluid', false, false);
	$containerClass = $fluid ? 'container-fluid' : 'container';
	
	$pageHtml = new PageHtmlBuilder($view);
	$pageMeta = $pageHtml->meta();
	$pageMeta->applySeMeta();
	
	$murlPageHome = $view->buildUrl(MurlPage::home(), false);
	if (null === $murlPageHome) {
	    $murlPageHome = $view->buildUrl(MurlPage::home()->locale(N2nLocale::getDefault()), false);
	}
	
	if (null === $murlPageHome) {
	    $murlPageHome = $view->buildUrl(MurlPage::home()->locale(N2nLocale::getFallback()), false);
	}
		
	$meta = $html->meta();
	
	$meta->addMeta(['name' => 'author', 'content' => $meta->getPageName()]);
	$meta->addMeta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']);
	$meta->addMeta(['http-equiv' =>  'x-ua-compatible', 'content' => 'ie=edge']);
	
//	$meta->addMeta(['name' => 'msapplication-TileImage', 'content' => $meta->getAssetUrl(['img', 'tile-558x558.png'], 'bstmpl')]);
//	$meta->addMeta(['name' => 'msapplication-TileImage', 'content' => $meta->getAssetUrl(['img', 'tile-wide-558x270.png'], 'bstmpl')]);
//	$meta->addMeta(['name' => 'msapplication-TileColor', 'content' => '#b0b0b0']);
	if (N2N::isDevelopmentModeOn()) {
		//$meta->addCssUrl('//diagnosticss.github.io/css/diagnosticss.css');
	} else {
		$meta->bodyEnd()->addJsCode("window.ga=function(){ga.q.push(arguments)},ga.q=[],ga.l=+new Date,ga('create','UA-XXXXX-Y','auto'),ga('set','transport','beacon'),ga('send','pageview');");
		$meta->bodyEnd()->addJsUrl('https://www.google-analytics.com/analytics.js', false, false, ['async' => true]);
	}
	//$meta->addJs('js/modernizr.js');
	$meta->addLibrary(new JQueryLibrary(3));
	$meta->addLibrary(new BootstrapLibrary(false, false));
	$meta->addCss('css/style.css?v=' . BsTemplateModel::ASSETS_VERSION);
//	$meta->bodyEnd()->addJs('js/jquery.stickyPanel.js');
//	$meta->bodyEnd()->addJs('js/responsive-initializer.js');
// 	$meta->bodyEnd()->addJs('js/flying-focus.js');
	$meta->bodyEnd()->addJs('js/functions.js?v=' . BsTemplateModel::ASSETS_VERSION);
	
// 	$meta->addLink(['rel' => 'manifest', 'href' => $meta->getAssetUrl(['json', 'site.webmanifest'])]);
// 	$meta->addLink(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => $meta->getAssetUrl(['img', 'favicon.png'], 'bstmpl')]);
// 	$meta->addLink(['rel' => 'apple-touch-icon', 'href' => $meta->getAssetUrl(['img', 'icon-192x192.png'], 'bstmpl')]);

	
	// 			var isTouch = function() {
	// 				if (("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch) {
	// 					return true;
	// 				}
	// 				return false;
	// 			};
	//
	// 			if(isTouch()) {
	// 				var htmlElement = document.querySelectorAll("html")[0];
	// 				htmlElement.className = htmlElement.className + " touch";
	// 			};
// 	$meta->bodyEnd()->addJsCode('var isTouch=function(){return"ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch?!0:!1};if(isTouch()){var htmlElement=document.querySelectorAll("html")[0];htmlElement.className=htmlElement.className+" touch"}');
	
	// 	$meta->addJsCode('(function() {
	// 		var htmlElement = document.querySelectorAll("html")[0];
	// 		htmlElement.className = htmlElement.className.replace("no-js", "js");
	// 	})()');
	$meta->addJSCode('!function(){var a=document.querySelectorAll("html")[0];a.className=a.className.replace("no-js","js")}();');
	?>
<!doctype html>
<html class="no-js" lang="<?php $html->out($view->getN2nLocale()->getLanguageId()) ?>">
	<?php $html->headStart() ?>
		<!-- internet page created by hnm.ch -->
		<meta charset="<?php $html->out(N2n::CHARSET) ?>" />
	<?php $html->headEnd() ?>
	<?php $html->bodyStart() ?>
		<!--[if lte IE 9]>
			<p class="m-0 p-3 pb-3 text-center browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->
		<ul class="skiplinks">
			<?php if ($view->buildUrl($murlPageHome, false)): ?>
				<li>
					<?php $html->link($murlPageHome, $html->getText('access_start'), array('accesskey' => 0)) ?>
				</li>
			<?php endif ?>
			<li><a href="#globalnavi" accesskey="1"><?php $html->text('access_nav') ?></a></li>
			<li><a href="#main-container" accesskey="2"><?php $html->text('access_main') ?></a></li>
			<?php if (false): ?>
				<li><?php $html->link(MurlPage::tag(ContactPageController::class), null, 
						['accesskey' => 3])?></li>
				<li><a href="#search" accesskey="5"><?php $html->text('access_search') ?></a></li>
			<?php endif ?>
		</ul>
		<header class="page-header">
			<div class="<?php $html->out($containerClass) ?> d-flex align-items-center">
				<div class="branding">
					<?php $html->link($murlPageHome, $html->getImageAsset(['img', 'logo.png'], $meta->getPageName()), null, 'div') ?>
				</div>
				<a id="mobile-navi-toggle" role="button" class="ml-auto">
					<span class="mobile-navi-bar"></span>
					<span class="mobile-navi-bar"></span>
					<span class="mobile-navi-bar"></span>
				</a>
			</div>
		</header>
		<div class="navigation">
			<div class="<?php $html->out($containerClass) ?>">
				<?php if (null !== $view->buildUrl(MurlPage::home(), false)): ?>
					<nav id="globalnavi" class="navbar-nav navbar-expand-md expand-nav" data-toggler-ref="#mobile-navi-toggle"  data-child-toggler-class="expand-nav-child-toggler d-lg-none" data-expand-limit="level-rel-1">
						<?php $pageHtml->navigation(Nav::home(), ['class' => 'navbar-nav'], null, ['class' => 'nav-item'], ['class' => 'nav-link']) ?>
					</nav>
				<?php endif ?>
				<nav id="sidenavi" class="nav-inline">
				</nav>
				<?php if (count($pageMeta->getN2nLocaleSwitchUrls()) > 1): ?>
					<nav id="languagenavi" class="nav nav-inline">
						<?php $pageHtml->localeSwitch(['class' => 'nav nav-inline']) ?>
					</nav>
				<?php endif ?>
			</div>
		</div>
		
		<?php if ($view->hasPanel(BsTemplateModel::PANEL_NAME_TOP)): ?>
			<?php $view->importPanel(BsTemplateModel::PANEL_NAME_TOP) ?>
		<?php endif ?>
		
		<?php $view->importContentView() ?>
		
		<?php if ($view->hasPanel(BsTemplateModel::PANEL_NAME_BOTTOM)): ?>
			<?php $view->importPanel(BsTemplateModel::PANEL_NAME_BOTTOM) ?>
		<?php endif ?>
	
		<footer class="page-footer">
			<div class="<?php $html->out($containerClass) ?>">
				<div class="row">
					<div class="col-sm-6">
						<p>
							Hofmänner New Media<br />
							Stadthausstrasse 65<br />
							8400 Winterthur
						</p>
						<p>
							052 233 79 77<br />
						</p>
					</div>
					<div class="col-md-6">
						<?php $html->link('https://n2n.rocks', 'CMS n2n Rocket', ['target' => '_blank']) ?>
						&copy; 2019 <?php $html->link('https://www.hnm.ch', 
								'Webentwicklung und Webdesign HNM Winterthur', ['target' => '_blank']) ?>
					</div>
				</div>
			</div>
		</footer>
	<?php $html->bodyEnd() ?>
</html>
