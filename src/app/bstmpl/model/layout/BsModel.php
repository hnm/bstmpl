<?php
namespace bstmpl\model\layout;

use n2n\context\RequestScoped;

class BsModel implements RequestScoped {
	const COL_CLASS = 'col-md-4';
	const BOX_CLASS = 'p-3 mb-3';
	const COLOR_PREFIX =  'swatch-';
	
	public function getColors() {
		return [
				'blue',
				'indigo',
				'purple',
				'pink',
				'red',
				'orange',
				'yellow',
				'green',
				'teal',
				'cyan'
		];
	}
	
	public function getThemeColors() {
		return [
				'primary',
				'secondary',
				'success',
				'info',
				'warning',
				'danger',
				'light',
				'dark',
		];
	}
	
	public function getGrays() {
		return [
				"black",
				"900",
				"800",
				"700",
				"600",
				"500",
				"400",
				"300",
				"200",
				"100",
				"white"
		];
	}
	
	public function getProjectGrays() {
		return [
				'project-gray-d-200',
				'project-gray-d-100',
				'project-gray',
				'project-gray-l-100',
				'project-gray-l-200'
		];
	}
	
	public function getProjectThemeColors() {
		return [
			'primary' => [
					'primary-d-200',
					'primary-d-100',
					'primary',
					'primary-l-100',
					'primary-l-200'
			],
			'secondary' => [
					'secondary-d-200',
					'secondary-d-100',
					'secondary',
					'secondary-l-100',
					'secondary-l-200',
			]
		];
	}
}
