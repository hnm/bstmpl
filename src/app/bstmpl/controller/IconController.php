<?php
namespace bstmpl\controller;

use n2n\web\http\controller\ControllerAdapter;
use n2n\io\IoUtils;
use n2n\core\N2N;
use n2n\core\container\N2nContext;
use n2n\io\fs\FsPath;

class IconController extends ControllerAdapter {
	
	public function index(N2nContext $n2nc) {
		
		$scssFile = IoUtils::getContents(N2N::getPublicDirPath()->ext(array('assets', 'bstmpl', 'scss', 'custom', '_icomoon-icons.scss')));
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
		$path = new FsPath(__DIR__  . '\..\ui\Ifc.php');
		
		
		
		IoUtils::putContentsSafe((string) $path, $contents);
	}
}