<?php
namespace bstmpl\controller;

use n2n\web\http\controller\ControllerAdapter;
use n2n\io\IoUtils;
use n2n\core\N2N;
use n2n\core\container\N2nContext;
use n2n\io\fs\FsPath;

class IconController extends ControllerAdapter {
	
	// ==========================
	// IconFont
	// ==========================
	
	public function doFont(N2nContext $n2nc) {
		
		$scssFile = IoUtils::getContents(N2N::getPublicDirPath()->ext(array('assets', 'bstmpl', 'scss', 'custom', 'icomoon', '_icomoon-icons.scss')));
		$matches = [];
		preg_match_all('/\.(ifc-.*):before/', $scssFile, $matches);
		test($matches);
		
		$contents = '';
		$lines[] = '<?php';
		$lines[] = 'namespace bstmpl\ui;';
		$lines[] = '';
		
		$lines[] = 'class Ifc {';
		foreach($matches[1] as $key => $icon) {
			$lines[] = "\t" . 'const ' . strtoupper(str_replace('-', '_', $icon)) .  ' = ' . "'ifc " . $icon . "'" . ';';
		}
		
		$lines[] = '}';
		
		$contents .= implode(PHP_EOL, $lines);
		$path = new FsPath(__DIR__  . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, ['..', 'ui', 'Ifc.php']));
		
		
		
		IoUtils::putContentsSafe((string) $path, $contents);
	}
	
	// 	==========================
	// 	Font SVG
	// 	==========================
	
	public function doSVG(N2nContext $n2nc) {
		
		$svgFile = IoUtils::getContents(N2N::getPublicDirPath()->ext(array('assets', 'bstmpl', 'img', 'symbol-defs.svg')));
		
		//create svgDefs
		$path = new FsPath(__DIR__  . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, ['..', 'view', 'inc', 'svgDefs.html.php']));
		IoUtils::putContentsSafe((string) $path, $svgFile);
		
		
		//create Ifc Class and put icons names
		$matches = [];
		preg_match_all('/symbol id="(svg-.*?)"/', $svgFile, $matches);
		test($matches);
		
		$contents = '';
		$lines[] = '<?php';
		$lines[] = 'namespace bstmpl\ui;';
		$lines[] = '';
		
		$lines[] = 'class Ifc {';
		foreach($matches[1] as $key => $icon) {
			$lines[] = "\t" . 'const ' . strtoupper(str_replace('-', '_', str_replace('svg-', '', $icon))) .  ' = ' . "'" . $icon . "'" . ';';
		}
		
		$lines[] = '}';
		
		$contents .= implode(PHP_EOL, $lines);
		$path = new FsPath(__DIR__  . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, ['..', 'ui', 'Ifc.php']));
		
		
		
		IoUtils::putContentsSafe((string) $path, $contents);
	}
}
