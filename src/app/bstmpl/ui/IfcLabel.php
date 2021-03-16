<?php
namespace bstmpl\ui;

use n2n\impl\web\ui\view\html\HtmlElement;
use n2n\impl\web\ui\view\html\HtmlSnippet;
use n2n\impl\web\ui\view\html\HtmlUtils;
use n2n\util\type\ArgUtils;
use n2n\web\ui\UiComponent;
use n2n\web\ui\Raw;

class IfcLabel extends HtmlSnippet {
	
	// 	// 	================
	// 	// 	Icon Font Style
	// 	// 	================
	
	// 	const POS_LEFT = 'left';
	// 	const POS_RIGHT = 'right';
	
	// 	public function __construct(string $iconType, $contents = null, bool $textSrOnly = false,
	// 			$pos = self::POS_LEFT, array $iAttrs = null, array $textAttrs = null) {
	
// 				ArgUtils::valEnum($pos, array(self::POS_LEFT, self::POS_RIGHT));
// 				ArgUtils::valType($contents, array('string', UiComponent::class), true);
		
// 				$elemIcon = new HtmlElement('i', HtmlUtils::mergeAttrs((array) $iAttrs,
// 						['aria-hidden' => 'true', 'class' => $iconType . ' ifc-' . $pos]), '');
		
// 				if (null !== $contents) {
// 					if ($textSrOnly) {
// 						$textAttrs = HtmlUtils::mergeAttrs((array) $textAttrs, ['class' => 'sr-only']);
// 					}
// 					$contents = new HtmlElement('span', $textAttrs, $contents);
// 				}
		
// 				if ($pos === self::POS_LEFT) {
// 					parent::__construct($elemIcon, ' ', $contents);
// 				} else {
// 					parent::__construct($contents, ' ', $elemIcon);
// 				}
// 			}	
	
	
	// ================
	// SVG STYLE
	// ================
	
	const POS_LEFT = 'left';
	const POS_RIGHT = 'right';
	
	public function __construct(string $icon, $contents = null, bool $textSrOnly = false,
			$pos = self::POS_RIGHT, array $attrs = null, array $textAttrs = null) {
				ArgUtils::valEnum($pos, array(self::POS_LEFT, self::POS_RIGHT));
				ArgUtils::valType($contents, array('string', UiComponent::class), true);
				ArgUtils::valEnum($icon, (new \ReflectionClass(new Ifc()))->getConstants());
				
				$iconBaseAttrs = ['class' => 'svg ' . $icon, 'aria-hidden' => 'true'];
				
				$elemIcon = new Raw('<svg ' . HtmlElement::buildAttrsHtml(HtmlUtils::mergeAttrs($iconBaseAttrs, (array) $attrs)) . '><use xlink:href="#' . $icon . '"></use></svg>');
				
				if (null !== $contents && $textSrOnly) {
					$contents = new HtmlElement('span', array('class' => 'sr-only'), $contents);
				}
				
				if ($pos === self::POS_LEFT) {
					parent::__construct($elemIcon, ' ', $contents);
				} else {
					parent::__construct($contents, ' ', $elemIcon);
				}
	}
	
	public static function srOnly($icon, $contents, $attrs = null) {
		return new IfcLabel($icon, $contents, true, IfcLabel::POS_RIGHT, $attrs);
	}
	
	public static function icon($icon, $attrs = null) {
		return new IfcLabel($icon, null, false, self::POS_RIGHT, $attrs);
	}
	
	public static function iconed($icon, $contents, $pos = self::POS_RIGHT) {
		return new IfcLabel($icon, $contents, false, $pos);
	}
}

