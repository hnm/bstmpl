<?php 
	use css\model\StyleCollection;
	use n2n\impl\web\ui\view\html\HtmlView;

	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$styles = $view->lookup('css\model\StyleCollection');
	$view->assert($styles instanceof StyleCollection);
	
	$html->meta()->addCss('css/styleguide.css', null, 'tmpl');
?>
<h1>Farben</h1>

<div class="row">
	<div class="col-sm-4">
		<p class="lead">
			Das CSS Framework von n2n kennt folgende Farben:
		</p>
		<p>
			Grundsätzlich sind zwei <strong>Marken-Farben</strong> vorgesehen: eine primäre (primary) und eine sekundäre (secondary). 
			Die sekundäre Farbe kann auch weggelassen werden. Ausserdem stehen die Farben "emphasized" und "inversed"
			zur verfügung. Während "emphasized einfach ein leichter Grauton ist, repräsentiert "inversed" einen dunklen
			Grauton.
		</p>
		<p>
			Die <strong>Mitteilungsfahrben</strong> sind die Farben, welche für Gefahren/Fehler (danger), Warnungen (warning),
			Erfolgsmeldungen (success) und Informationen (info) stehen. Sie werden von der primären Markenfarbe abgeleitet.
		</p>
		<p>
			Die <strong>Color-Range</strong> zieht sich von der Hintergrund- bis zur Vordergrundfarbe in 16 verschiedenen Abstufungen.
			Achtung: Da nicht immer fest steht, ob die Hintergrundfarbe dunkel oder hell ist wird die Range mit den hexadezimal Werten
			0 bis F repräsentiert. Wenn als Hintergrundfarbe Schwarz (#000000) und als Vordergrundfarbe Weiss (#FFFFFF) definiert ist,
			entspricht der Index der Range Farbe genau dem Farbwert. Beispiel: RangeC --> #CCCCCC.
		</p>
		<p>
			Die Farben werden in der Klasse <code>StyleCollection</code> definiert.
		</p>
	</div>
	<div class="col-sm-8">
		<h2 class="sg-chapter-headline">Brand Colors</h2>
		<div class="row">
			<div class="col-xs-3">
				<div class="brand-primary-bg sg-color-field">
					Primary <?php echo $styles->brandPrimary ?>
				</div>
			</div>
			<?php if ($styles->brandSecondary): ?>
				<div class="col-xs-3">
					<div class="brand-secondary-bg sg-color-field">
						Secondary <?php echo $styles->brandSecondary ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-xs-3">
				<div class="brand-emphasized-bg sg-color-field">
					Emphasized <?php echo $styles->colorRange->getRangeD() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="brand-inversed-bg sg-color-field range-f-fg">
					Inversed <?php echo $styles->colorRange->getRange3() ?>
				</div>
			</div>
		</div>
		<h2 class="sg-chapter-headline">Message Colors</h2>
		<div class="row">
			<div class="col-xs-3">
				<div class="brand-danger-bg sg-color-field">
					Danger <?php echo $styles->brandDanger ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="brand-warning-bg sg-color-field">
					Warning <?php echo $styles->brandWarning ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="brand-success-bg sg-color-field">
					Success <?php echo $styles->brandSuccess ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="brand-info-bg sg-color-field range-f-fg">
					Info <?php echo $styles->brandInfo ?>
				</div>
			</div>
		</div>
		
		<h2 class="sg-chapter-headline">Range Colors</h2>
		<div class="row">
			<div class="col-xs-3">
				<div class="range-0-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange0() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-1-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange1() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-2-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange2() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-3-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange3() ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<div class="range-4-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange4() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-5-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange5() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-6-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange6() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-7-bg sg-color-field range-f-fg">
					<?php echo $styles->colorRange->getRange7() ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<div class="range-8-bg sg-color-field">
					<?php echo $styles->colorRange->getRange8() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-9-bg sg-color-field">
					<?php echo $styles->colorRange->getRange9() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-a-bg sg-color-field">
					<?php echo $styles->colorRange->getRangeA() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-b-bg sg-color-field">
					<?php echo $styles->colorRange->getRangeB() ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<div class="range-c-bg sg-color-field">
					<?php echo $styles->colorRange->getRangeC() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-d-bg sg-color-field">
					<?php echo $styles->colorRange->getRangeD() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-e-bg sg-color-field">
					<?php echo $styles->colorRange->getRangeE() ?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="range-f-bg sg-color-field">
					<?php echo $styles->colorRange->getRangeF() ?>
				</div>
			</div>
		</div>			
	</div>

</div>