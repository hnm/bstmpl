<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$view->useTemplate('~\view\boilerplate.html', ['cssFileName' => 'style-layout']);
	
?>

<div class="container" role="main">
	<h1>Grid Testing</h1>
	
	<p>Your current device size is:</p>
	<p class="d-none d-xl-block"><strong>Breakpoint XL - Desktop Big</strong> (12 Col: 80px - Spacer: 20px)</p>
	<p class="d-none d-lg-block d-xl-none"><strong>Breakpoint LG - Desktop Normal</strong> (12 Col: 60px - Spacer: 20px)</p>
	<p class="d-none d-md-block d-lg-none"><strong>Breakpoint MD - Tablet</strong> (12 Col: 40px - Spacer: 20px)</p>
	<p class="d-none d-sm-block d-md-none"><strong>Breakpoint SM - Phone landscape</strong> (6 Col: 16.6% - Spacer: 20px)</p>
	<p class="d-sm-none"><strong>Breakpoint XS - Phone portrait</strong> (1 Col 100% - Spacer: 20px)</p>
	
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1">1</div>
			<div class="col-sm-11">11</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-2">2</div>
			<div class="col-sm-10">10</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-3">3</div>
			<div class="col-sm-9">9</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-4">4</div>
			<div class="col-sm-8">8</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-5">5</div>
			<div class="col-sm-7">7</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-6">6</div>
			<div class="col-sm-6">6</div>
		</div>
	</div>
	
	<h2>Nice Columns</h2>
	<p>Here are some examples, how to make some nice columns. Use <code>.row-margin</code> on row DIV to create a margin 
	after the row.</p>
	
	<p class="visible-phone-landscape"><span class="label label-info">Notice</span> To avoid uneven colunns use <code>.col-sm-full-6</code> (for a full column) and <code>.col-sm-half-6</code> (for a half column) on columns that do not fill the page.</p>
	<p class="visible-phone-portrait"><span class="label label-info">Notice</span> To avoid uneven colunns use <code>.col-sm-full-2</code> (for a full column) and <code>.col-sm-half-2</code> (for a half column) on columns that do not fill the page.</p>
	
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-6">half (6)</div>
			<div class="col-sm-6">half (6)</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-4 col-sm-full-6">one-third (4)</div>
			<div class="col-sm-8">two thirds (8)</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-4 col-sm-half-2 col-sm-full-6">first-third (4)</div>
			<div class="col-sm-4 col-sm-half-2 col-sm-half-6">second-third (4)</div>
			<div class="col-sm-4 col-sm-full-2 col-sm-half-6">third-third (4)</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-3">first-fourth (3)</div>
			<div class="col-sm-3">second-fourth (3)</div>
			<div class="col-sm-3">third-fourth (3)</div>
			<div class="col-sm-3">fourth-fourth (3)</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-2 col-sm-half-2">sixth (2)</div>
			<div class="col-sm-4 col-sm-half-2">third (4)</div>
			<div class="col-sm-4 col-sm-half-2">third (4)</div>
			<div class="col-sm-2 col-sm-half-2">sixth (2)</div>
		</div>
	</div>
	
	<h2>Offsets</h2>
	
	<p>Offsets can be used, to skip columns. Offset cols do not have to be the first in a row. They can be placed everywhere.</p>
	
	<p class="visible-phone-landscape visible-phone-portrait"><span class="label label-warning">Warning!</span> Offsets are not available for this resolution!</p>
	
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 offset-sm-1">(-&gt;1) 1</div>
			<div class="col-sm-1 offset-sm-2">(-&gt;2) 1</div>
			<div class="col-sm-7">7</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-2 offset-sm-2">(-&gt;2) 2</div>
			<div class="col-sm-8">8</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-3 offset-sm-3">(-&gt;3) 3</div>
			<div class="col-sm-6">6</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-4 offset-sm-4">(-&gt;4) 4</div>
			<div class="col-sm-4">4</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-5 offset-sm-5">(-&gt;5) 5</div>
			<div class="col-sm-2">2</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-6 offset-sm-6">(-&gt;6) 6</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 offset-sm-7">(-&gt;7) 1</div>
			<div class="col-sm-4">4</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 offset-sm-8">(-&gt;8) 1</div>
			<div class="col-sm-3">3</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 offset-sm-9">(-&gt;9) 1</div>
			<div class="col-sm-2">2</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 offset-sm-10">(-&gt;10) 1</div>
			<div class="col-sm-1">1</div>
		</div>
	</div>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 offset-sm-11">(-&gt;11) 1</div>
		</div>
	</div>
	
	
	<h2>Nested Grid</h2>
	<p>Use <code>.row</code> around nested cols to make sure, that margins are correct!</p>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-6">
				6
				<div class="row">
					<div class="col-sm-6">6</div>
					<div class="col-sm-4">4</div>
					<div class="col-sm-2">2</div>
				</div>
			</div>
			<div class="col-sm-3">3</div>
			<div class="col-sm-2">2</div>
			<div class="col-sm-1">1</div>
		</div>
	</div>
	
	<h2>Push &amp; Pull</h2>
	<p>You can use <code>.push</code> and <code>.pull</code> in order to switch order of cols. This is very handy
	if you want to maintain a logical structure of your html code. Please notice, that you always have to push the
	same amount of elements as you pull!</p>
	
	<p class="visible-phone-landscape visible-phone-portrait"><span class="label label-warning">Warning!</span> Push &amp; Pull is not available for this resolution!</p>
	
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-4 col-sm-push-4">first-third (4) pushed 4</div>
			<div class="col-sm-4 col-sm-pull-4">second-third (4) pulled 4</div>
			<div class="col-sm-4">third-third (4)</div>
		</div>
	</div>
	
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1 col-sm-push-1">1. col-sm-push-1</div>
			<div class="col-sm-1 col-sm-pull-1">2. col-sm-pull-1</div>
			<div class="col-sm-1 col-sm-push-2">3. col-sm-push-2</div>
			<div class="col-sm-1 col-sm-push-3">4. col-sm-push-3</div>
			<div class="col-sm-1 col-sm-pull-2">5. col-sm-pull-2</div>
			<div class="col-sm-1 col-sm-push-6">6. col-sm-push-6</div>
			<div class="col-sm-1 col-sm-pull-3">7. col-sm-pull-3</div>
			<div class="col-sm-1 col-sm-push-3">8. col-sm-push-3</div>
			<div class="col-sm-1 col-sm-push-1">9. col-sm-push-1</div>
			<div class="col-sm-1 col-sm-pull-4">10. col-sm-pull-4</div>
			<div class="col-sm-1 col-sm-pull-2">11. col-sm-pull-2</div>
			<div class="col-sm-1 col-sm-pull-4">12. col-sm-pull-4</div>
		</div>
	</div>
</div>


<div class="container-fluid">
	<h2>This is a fluid container</h2>
	
	<h3>Normal 1 Grid</h3>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
			<div class="col-sm-1">1</div>
		</div>
	</div>
	
	<h3>Nested Grid</h3>
	<div class="bd-example-row">
		<div class="row">
			<div class="col-sm-6">
				6
				<div class="row">
					<div class="col-sm-6">6</div>
					<div class="col-sm-4">4</div>
					<div class="col-sm-2">2</div>
				</div>
			</div>
			<div class="col-sm-3">3</div>
			<div class="col-sm-2">2</div>
			<div class="col-sm-1">1</div>
		</div>
	</div>
	
</div>
