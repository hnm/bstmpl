<?php 
	use n2n\web\http\Response;
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\core\err\ThrowableModel;
	use n2n\core\config\MailConfig;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	$request = HtmlView::request($view);
	$response = HtmlView::response($view);
	$httpContext = HtmlView::httpContext($view);
	
	$throwableModel = $view->getParam('throwableModel'); 
	$view->assert($throwableModel instanceof ThrowableModel); 

	$httpStatus = $response->getStatus();
	$title = $httpStatus . ' ' . Response::textOfStatusCode($httpStatus);
	
	$mailConfig = $view->lookup(MailConfig::class);
	$view->assert($mailConfig instanceof MailConfig);
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php $html->esc($title) ?></title>
		<link href="<?php $html->out($httpContext->getAssetsUrl('bstmpl')->ext('css/error.css')) ?>" media="all" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<article>
			<header>
				<div class="wrapper">
					<?php $html->imageAsset(array('img', 'logo.png'), 'logo', array('class' => 'logo img-fluid')) ?>
				</div>
			</header>
			<div id="content">
				<div class="wrapper">
					<h1>Es ist ein Fehler aufgetreten: <?php $html->out($title) ?></h1>
					<?php if ($httpStatus == Response::STATUS_500_INTERNAL_SERVER_ERROR): ?>
						<p>
							Leider ist auf unserer Homepage ein unerwarteter Fehler aufgetreten. Die verantwortlichen Personen 
							wurden informiert. Wir bemühen uns, den Fehler so rasch als möglich zu beheben. Bitte versuchen Sie
							es in ein paar Minuten nochmals. Besten Dank für Ihr Verständnis!
						</p>
					<?php endif ?>
					<p>
						<a href="javascript:history.back()">Zurück zur letzten Seite</a> | 
						<?php $html->linkToContext('', 'zur Startseite') ?>
					</p>
				</div>
			</div>
			<footer>
				<div class="wrapper">
					<address>
						<strong>Firma</strong><br />
						Strasse, Nr.<br />
						PLZ, Ort<br />
						Telefon<br />
						<?php $html->linkEmail($mailConfig->getCustomerAddress()) ?>
					</address>
				</div>
			</footer>
		</article>
	</body>
</html>

