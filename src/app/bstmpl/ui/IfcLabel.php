<?php
namespace bstmpl\ui;

use n2n\impl\web\ui\view\html\HtmlElement;
use n2n\impl\web\ui\view\html\HtmlSnippet;
use n2n\impl\web\ui\view\html\HtmlUtils;
use n2n\reflection\ArgUtils;
use n2n\web\ui\UiComponent;

class IfcLabel extends HtmlSnippet {
	
	const POS_LEFT = 'left';
	const POS_RIGHT = 'right';
	
	public function __construct(string $iconType, $contents = null, bool $textSrOnly = false, 
			$pos = self::POS_LEFT, array $iAttrs = null) {
		
		ArgUtils::valEnum($pos, array(self::POS_LEFT, self::POS_RIGHT));
		ArgUtils::valType($contents, array('string', UiComponent::class), true);
		
		$elemIcon = new HtmlElement('i', HtmlUtils::mergeAttrs((array) $iAttrs, 
				array('aria-hidden' => 'true', 'class' => $iconType . ' ifc-' . $pos)), '');
		
		if (null !== $contents && $textSrOnly) {
			$contents = new HtmlElement('span', array('class' => 'sr-only'), $contents);
		}
		
		if ($pos === self::POS_LEFT) {
			parent::__construct($elemIcon, ' ', $contents);
		} else {
			parent::__construct($contents, ' ', $elemIcon);
		}
	}	
}

