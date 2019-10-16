<?php
namespace bstmpl\ui;

use n2n\impl\web\ui\view\html\HtmlView;
use n2n\impl\web\ui\view\html\HtmlElement;
use n2n\impl\web\ui\view\html\HtmlUtils;
use n2n\io\managed\File;
use bootstrap\img\MimgBs;
use n2n\impl\web\ui\view\html\img\Mimg;
use n2n\impl\web\ui\view\html\img\ImgComposer;
use n2n\web\ui\UiComponent;
use n2n\util\type\CastUtils;
class TemplateHtmlBuilder {
	private $view;
	private $html;
	private $meta;

	public function __construct(HtmlView $view) {
		$this->view = $view;
		$this->html = $view->getHtmlBuilder();
		$this->meta = $this->html->meta();
	}
	public function getFancyImage(File $image = null, ImgComposer $thumbComposer = null, ImgComposer $fancyComposer = null, array $attrs = null, array $imgAttrs = null, array $fancyOptions = null, $htmlElement = null) {
		if ($thumbComposer === null) {
			$thumbComposer = MimgBs::xs(Mimg::prop(497, 332))->sm(546)->md(690)->lg(910)->xl(1110);
		}
		
		if ($fancyComposer === null) {
			$fancyComposer = MimgBs::xs(Mimg::prop(497, 449))->sm(546)->md(690)->lg(910)->xl(1110);
		}
		
// 		$this->meta->bodyEnd()->addJs('fancybox-2/js/jquery.fancybox.js', 'bstmpl');
		$this->meta->bodyEnd()->addJs('fancybox-3/dist/jquery.fancybox.js', 'bstmpl');
		$this->meta->bodyEnd()->addCss('fancybox-3/dist/jquery.fancybox.css', null, 'bstmpl');
		
		//build lyteoptions
		
// 		v2
// 		$fancyOptions = (array) $fancyOptions + array('data-fancybox-group' => 'bstmpl-gallery');
// 		v3
		$fancyOptions = (array) $fancyOptions + array('data-fancybox' => 'bstmpl-gallery');
		
		$imgSet = $fancyComposer->createImgSet($image, $this->view->getN2nContext());

		if ($imgSet->isPictureRequired()) {
			throw new \InvalidArgumentException('Picture not supported.');
		}
		
		$srcsetAttr = null;
		$sizes = null;
		foreach ($imgSet->getImageSourceSets() as $imageSourceSet) {
			$srcsetAttr = $imageSourceSet->getSrcsetAttr();
			$sizes = $imageSourceSet->getAttrs()['sizes'];
			break;
		}
		
		$lyteBoxLinkDefaultAttrs = HtmlUtils::mergeAttrs($fancyOptions, array('class' => 'fancybox', 
				'href' => $this->view->buildUrlStr($image, false), 
				'data-srcset' => $srcsetAttr, 'data-sizes' => $sizes));
		
		$attrs = HtmlUtils::mergeAttrs($lyteBoxLinkDefaultAttrs, (array) $attrs);
		
		$imgAttrs = HtmlUtils::mergeAttrs((array) $imgAttrs, array('class' => 'img-fluid'));
		
		$lyteBoxLink = new HtmlElement('a', $attrs);
		
		$thumbImage = $this->html->getImage($image, $thumbComposer, $imgAttrs);
		
		if (null !== $htmlElement) {
			CastUtils::assertTrue($htmlElement instanceof UiComponent);
			$htmlElement->append($thumbImage);
			$lyteBoxLink->append($htmlElement);
		} else {
			$lyteBoxLink->append($thumbImage);
		}
		
		return $lyteBoxLink;
	}
	
	public function fancyImage(File $image = null, $thumbComposer = null, $fancyComposer = null, array $attrs = null, array $imgAttrs = null, array $fancyOptions = null, $htmlElement = null) {
		$this->view->out($this->getFancyImage($image, $thumbComposer, $fancyComposer, $attrs, $imgAttrs, $fancyOptions, $htmlElement));
	}
	
	
// 	private $view;
// 	private $html;
// 	private $meta;
	
// 	public function __construct(HtmlView $view) {
// 		$this->html = $view->getHtmlBuilder();
// 		$this->meta = $this->html->meta();
// 		$this->view = $view;
// 	}
	
// 	public function getYoutubeVideo($youtubeId) {
// 		if (null === $youtubeId) return;
// 		$this->meta->addJsUrl('https://www.youtube.com/iframe_api', true);
// 		$videoContainerDiv = new HtmlElement('div', array('class' => 'video-container', 'data-youtube-id' => $youtubeId), 
// 				new HtmlElement('div'));
// 		return $videoContainerDiv;
// 	}
	
// 	public function youtubeVideo($youtubeId) {
// 		$this->view->out($this->getYoutubeVideo($youtubeId));
// 	}
	
// 	public function link($href, $label = null, array $attrs = null) {
// 		$this->view->out($this->getLink($href, $label, $attrs));
// 	}
	
// 	public function getLink($href, $label = null, array $attrs = null) {
// 		$attrs = (null === $attrs) ? array() : $attrs;
	
// 		if (!isset($attrs['target'])) {
// 			if (null !== ($target = $this->determineTarget($href))) {
// 				$attrs['target'] = $target;
// 			}
// 		}
	
// 		if (null === $label) $label = preg_replace('/https?:\/\//', '', $href);
	
// 		return $this->html->getLink($href, $label, $attrs);
// 	}
	
// 	public function pageOrExternalLink(Page $linkedPage = null, $linkExternal = null, $label = null, $attrs = null) {
// 		$this->view->out($this->getPageOrExternalLink($linkedPage, $linkExternal, $label, $attrs));
// 	}
	
// 	public function getPageOrExternalLink(Page $linkedPage = null, $linkExternal = null, $label = null, $attrs = null) {
// 		if (null === $linkedPage && null === $linkExternal) return null;
	
// 		if (null !== $linkedPage) {
// 			$pageHtml = new PageHtmlBuilder($this->view);
// 			return $pageHtml->link($linkedPage, $label, $attrs);
// 		} elseif (null !== $linkExternal) {
// 			return $this->getLink($linkExternal, $label, $attrs);
// 		}
// 	}
	
// 	public function getAdaptiveImageAsset(array $dimensionPaths, $attrs = null) {
// 		$this->meta->addJs('js/responsive-initializer.js', 'tmpl');
	
// 		$adaptiveImageAttrs = array();
// 		$adaptiveImageAttrs['data-file-paths'] = array();
// 		$adaptiveImageAttrs['data-current-resolution'] = null;
// 		$currentPath = null;
// 		foreach ($dimensionPaths as $resolution => $dimensionPath) {
// 			$adaptiveImageAttrs['data-file-paths'][$resolution] = $dimensionPath;
// 			if (null === $currentPath) {
// 				$adaptiveImageAttrs['data-current-resolution'] = $resolution;
// 				$currentPath = $dimensionPath;
// 			}
// 		}
// 		$adaptiveImageAttrs['data-file-paths'] = StringUtils::jsonEncode($adaptiveImageAttrs['data-file-paths']);
// 		$adaptiveImageAttrs = HtmlUtils::mergeAttrs(array('src' => $currentPath,
// 				'class' => 'img-responsive adaptive-image'), $adaptiveImageAttrs);
	
// 		return new HtmlElement('img', HtmlUtils::mergeAttrs($adaptiveImageAttrs, (array) $attrs));
// 	}
	
// 	public function adaptiveImageAsset(array $dimensionPaths, $attrs = null) {
// 		$this->view->out($this->getAdaptiveImageAsset($dimensionPaths, $attrs));
// 	}
	
// 	public function adaptiveImage(File $fileImage, array $thumbStrategies, $attrs = null) {
// 		$this->view->out($this->getAdaptiveImage($fileImage, $thumbStrategies, $attrs));
// 	}
	
// 	public function getAdaptiveImage(File $fileImage, array $thumbStrategies, $attrs = null) {
// 		if ($fileImage === null) return null;
		
// 		$attrs = HtmlUtils::mergeAttrs(array('class' => 'img-responsive'), (array) $attrs);
// 		if (!$fileImage->isValid()) return $this->html->getImage($fileImage, reset($thumbStrategies), $attrs, false, false);
		 
// 		$this->meta->addJs('js/responsive-initializer.js', 'tmpl');
// 		$this->meta->addJs('js/functions.js', 'tmpl');
	
// 		$attrs = HtmlUtils::mergeAttrs(array('class' => 'img-responsive'), (array) $attrs);
// 		if (count($thumbStrategies) <= 1) return $this->html->getImage($fileImage, (false !== ($thumbStrategy = reset($thumbStrategies))) ? $thumbStrategy : null, $attrs, true, true);
	
// 		$thumbStrategyAttrs = array();
// 		$thumbStrategyAttrs['data-file-paths'] = array();
// 		$imageFile = new ImageFile($fileImage);
	
// 		$firstThumbStrategy = null;
// 		foreach ($thumbStrategies as $resolution => $thumbStrategy) {
// 			ArgUtils::assertTrue($thumbStrategy instanceof ThumbStrategy);
	
// 			if (null === $firstThumbStrategy) {
// 				$firstThumbStrategy = $thumbStrategy;
// 				$thumbStrategyAttrs['data-current-resolution'] = $resolution;
// 				continue;
// 			}
			 
// 			$thumbStrategyAttrs['data-file-paths'][$resolution] = (string) $imageFile->getOrCreateThumb($thumbStrategy)->getFile()->getFileSource()->getUrl();
// 		}
// 		$thumbStrategyAttrs['data-file-paths'] = StringUtils::jsonEncode($thumbStrategyAttrs['data-file-paths']);
	
// 		$attrs = HtmlUtils::mergeAttrs($attrs, array('alt' => $fileImage->getOriginalName(), 'class' => 'adaptive-image'));
// 		$attrs = HtmlUtils::mergeAttrs($attrs, $thumbStrategyAttrs);
	
// 		return $this->html->getImage($fileImage, $firstThumbStrategy, $attrs, false, false);
// 	}
	
// 	public function getLyteboxImage(File $image = null,  $imageThumbStrategies = null, $lyteBoxThumbStrategies = null, array $attrs = null, array $imgAttrs = null, array $lyteOptions = null) {
// 		if (!$image instanceof File) return;
	
// 		if (!$imageThumbStrategies) {
// 			$imageThumbStrategies = array(
// 					'us' => ThSt::prop(449, 299),
// 					'xs' => ThSt::prop(737, 491),
// 					'sm' => ThSt::prop(714, 476),
// 					'md' => ThSt::prop(942, 628),
// 					'lg' => ThSt::prop(1200, 900)
// 			);
// 		}
	
// 		$largestImageStrategy = end($imageThumbStrategies);
	
// 		if (!$lyteBoxThumbStrategies) {
// 			$lyteBoxThumbStrategies = array(
// 					'us' => ThSt::prop(449, 449, false),
// 					'xs' => ThSt::prop(737, 737, false),
// 					'sm' => ThSt::prop(900, 900, false)
// 			);
// 		}
	
// 		$imageFile = new ImageFile($image);
	
	
// 		$imgAttrs = HtmlUtils::mergeAttrs(array('class' => 'img-responsive'), (array) $imgAttrs);
	
// 		// if image is smaller than thumb size, do only return image
// 		if ($imageFile->getHeight() < $largestImageStrategy->getHeight() && $imageFile->getWidth() < $largestImageStrategy->getWidth()) {
// 			return $this->html->getImage($image, null, $imgAttrs);
// 		}
	
// 		$this->meta->addJs('js/responsive-initializer.js', 'tmpl');
// 		$this->meta->addJs('lytebox/js/lytebox.js', 'tmpl');
// 		$this->meta->addCss('lytebox/css/lytebox.css', 'screen', 'tmpl');
	
	
// 		$adaptiveUiImage = $this->getAdaptiveImage($image, (array) $imageThumbStrategies, $imgAttrs);
// 		//$uiImage = $this->html->getImage($image, $thumbDimension, $imgAttrs);
	
	
// 		// check if image is bigger than max dimensions
// 		$thumbStrategyAttrs = array();
// 		$thumbStrategyAttrs['data-file-paths'] = array();
	
// 		$firstLyteBoxThumbStrategy = null;
// 		foreach ($lyteBoxThumbStrategies as $resolution => $lyteBoxThumbStrategy) {
// 			ArgUtils::assertTrue($lyteBoxThumbStrategy instanceof ThumbStrategy);
	
// 			if (null === $firstLyteBoxThumbStrategy) {
// 				$firstLyteBoxThumbStrategy = $lyteBoxThumbStrategy;
// 				$thumbStrategyAttrs['data-current-resolution'] = $resolution;
// 				continue;
// 			}
// 			$thumbStrategyAttrs['data-file-paths'][$resolution] =  $imageFile->getOrCreateThumb($lyteBoxThumbStrategy)->getFile()->getFileSource()->getUrl();
// 		}
// 		$thumbStrategyAttrs['data-file-paths'] = StringUtils::jsonEncode($thumbStrategyAttrs['data-file-paths']);
	
// 		$lyteboxImage = $imageFile->getOrCreateThumb($firstLyteBoxThumbStrategy);
	
// 		//build lyteoptions
// 		$lyteOptions = (array) $lyteOptions + array('titleTop' => 'true', 'navTop' => 'true', 'group' => 'tmpl-gallery');
	
// 		$lyteOptionsString = '';
// 		foreach($lyteOptions as $lyteOption => $value) {
// 			$lyteOptionsString .= $lyteOption . ':' . $value . ' ';
// 		}
	
// 		$lyteBoxLinkDefaultAttrs = array('class' => 'lytebox', 'data-lyte-options' => $lyteOptionsString, 'href' => $lyteboxImage->getFile()->getFileSource()->getUrl());
	
	
// 		$lyteBoxLinkAttrs = HtmlUtils::mergeAttrs($lyteBoxLinkDefaultAttrs, (array) $attrs);
// 		$lyteBoxLinkAttrs = HtmlUtils::mergeAttrs($lyteBoxLinkAttrs, $thumbStrategyAttrs);
	
// 		return new HtmlElement('a', $lyteBoxLinkAttrs, $adaptiveUiImage);
	
// 	}
	
// 	public function lyteboxImage(File $image = null, $imageThumbStrategies = null, $lyteBoxThumbStrategies = null, array $attrs = null, array $imgAttrs = null, array $lyteOptions = null) {
// 		$this->view->out($this->getLyteboxImage($image, $imageThumbStrategies, $lyteBoxThumbStrategies, $attrs, $imgAttrs, $lyteOptions));
// 	}
	
// 	private function determineTarget($href) {
// 		$uriParts = parse_url($href);
	
// 		if ($uriParts['host'] == $this->request->getHostName()) {
// 			return null;
// 		}
	
// 		foreach ($this->subsystemConfigs as $subSystemConfig) {
// 			if ($uriParts['host'] == $subSystemConfig->getHostName()) {
// 				return null;
// 			}
// 		}
	
// 		return '_blank';
// 	}
}
