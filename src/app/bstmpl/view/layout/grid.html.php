<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	
	$view = HtmlView::view($view);
	
	$view->useTemplate('~\view\boilerplate.html');
?>

<div class="container" role="main">
	<h1>Grid Testing</h1>
	
	<p>Your current device size is:</p>
	<p class="visible-desktop-big"><strong>Desktop Big</strong> (12 Col: 80px - Spacer: 20px)</p>
	<p class="visible-desktop-normal"><strong>Desktop Normal</strong> (12 Col: 60px - Spacer: 20px)</p>
	<p class="visible-tablet"><strong>Tablet</strong> (12 Col: 40px - Spacer: 20px)</p>
	<p class="visible-phone-landscape"><strong>Phone landscape</strong> (6 Col: 16.6% - Spacer: 20px)</p>
	<p class="visible-phone-portrait"><strong>Phone portrait</strong> (1 Col 100% - Spacer: 20px)</p>
	
	<div class="row">
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
	</div>
	<div class="row">
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-11"><div class="box emphasized">11</div></div>
	</div>
	<div class="row">
		<div class="col-sm-2"><div class="box emphasized">2</div></div>
		<div class="col-sm-10"><div class="box emphasized">10</div></div>
	</div>
	<div class="row">
		<div class="col-sm-3"><div class="box emphasized">3</div></div>
		<div class="col-sm-9"><div class="box emphasized">9</div></div>
	</div>
	<div class="row">
		<div class="col-sm-4"><div class="box emphasized">4</div></div>
		<div class="col-sm-8"><div class="box emphasized">8</div></div>
	</div>
	<div class="row">
		<div class="col-sm-5"><div class="box emphasized">5</div></div>
		<div class="col-sm-7"><div class="box emphasized">7</div></div>
	</div>
	<div class="row">
		<div class="col-sm-6"><div class="box emphasized">6</div></div>
		<div class="col-sm-6"><div class="box emphasized">6</div></div>
	</div>
	
	<h2>Nice Columns</h2>
	<p>Here are some examples, how to make some nice columns. Use <code>.row-margin</code> on row DIV to create a margin 
	after the row.</p>
	
	<p class="visible-phone-landscape"><span class="label label-info">Notice</span> To avoid uneven colunns use <code>.col-sm-full-6</code> (for a full column) and <code>.col-sm-half-6</code> (for a half column) on columns that do not fill the page.</p>
	<p class="visible-phone-portrait"><span class="label label-info">Notice</span> To avoid uneven colunns use <code>.col-sm-full-2</code> (for a full column) and <code>.col-sm-half-2</code> (for a half column) on columns that do not fill the page.</p>
	
	<div class="row">
		<div class="col-sm-6"><div class="box emphasized">half (6)</div></div>
		<div class="col-sm-6"><div class="box emphasized">half (6)</div></div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-full-6"><div class="box emphasized">one-third (4)</div></div>
		<div class="col-sm-8"><div class="box emphasized">two thirds (8)</div></div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-half-2 col-sm-full-6"><div class="box emphasized">first-third (4)</div></div>
		<div class="col-sm-4 col-sm-half-2 col-sm-half-6"><div class="box emphasized">second-third (4)</div></div>
		<div class="col-sm-4 col-sm-full-2 col-sm-half-6"><div class="box emphasized">third-third (4)</div></div>
	</div>
	<div class="row">
		<div class="col-sm-3"><div class="box emphasized">first-fourth (3)</div></div>
		<div class="col-sm-3"><div class="box emphasized">second-fourth (3)</div></div>
		<div class="col-sm-3"><div class="box emphasized">third-fourth (3)</div></div>
		<div class="col-sm-3"><div class="box emphasized">fourth-fourth (3)</div></div>
	</div>
	<div class="row">
		<div class="col-sm-2 col-sm-half-2"><div class="box emphasized">sixth (2)</div></div>
		<div class="col-sm-4 col-sm-half-2"><div class="box emphasized">third (4)</div></div>
		<div class="col-sm-4 col-sm-half-2"><div class="box emphasized">third (4)</div></div>
		<div class="col-sm-2 col-sm-half-2"><div class="box emphasized">sixth (2)</div></div>
	</div>
	
	<h2>Offsets</h2>
	
	<p>Offsets can be used, to skip columns. Offset cols do not have to be the first in a row. They can be placed everywhere.</p>
	
	<p class="visible-phone-landscape visible-phone-portrait"><span class="label label-warning">Warning!</span> Offsets are not available for this resolution!</p>
	
	<div class="row">
		<div class="col-sm-1 col-sm-offset-1"><div class="box emphasized">(-&gt;1) 1</div></div>
		<div class="col-sm-1 col-sm-offset-2"><div class="box emphasized">(-&gt;2) 1</div></div>
		<div class="col-sm-7"><div class="box emphasized">7</div></div>
	</div>
	<div class="row">
		<div class="col-sm-2 col-sm-offset-2"><div class="box emphasized">(-&gt;2) 2</div></div>
		<div class="col-sm-8"><div class="box emphasized">8</div></div>
	</div>
	<div class="row">
		<div class="col-sm-3 col-sm-offset-3"><div class="box emphasized">(-&gt;3) 3</div></div>
		<div class="col-sm-6"><div class="box emphasized">6</div></div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4"><div class="box emphasized">(-&gt;4) 4</div></div>
		<div class="col-sm-4"><div class="box emphasized">4</div></div>
	</div>
	<div class="row">
		<div class="col-sm-5 col-sm-offset-5"><div class="box emphasized">(-&gt;5) 5</div></div>
		<div class="col-sm-2"><div class="box emphasized">2</div></div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-6"><div class="box emphasized">(-&gt;6) 6</div></div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-7"><div class="box emphasized">(-&gt;7) 1</div></div>
		<div class="col-sm-4"><div class="box emphasized">4</div></div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-8"><div class="box emphasized">(-&gt;8) 1</div></div>
		<div class="col-sm-3"><div class="box emphasized">3</div></div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-9"><div class="box emphasized">(-&gt;9) 1</div></div>
		<div class="col-sm-2"><div class="box emphasized">2</div></div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-10"><div class="box emphasized">(-&gt;10) 1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
	</div>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-11"><div class="box emphasized">(-&gt;11) 1</div></div>
	</div>
	
	
	<h2>Nested Grid</h2>
	<p>Use <code>.row</code> around nested cols to make sure, that margins are correct!</p>
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6"><div class="box emphasized">6</div></div>
				<div class="col-sm-4"><div class="box emphasized">4</div></div>
				<div class="col-sm-2"><div class="box emphasized">2</div></div>
			</div>
		</div>
		<div class="col-sm-3"><div class="box emphasized">3</div></div>
		<div class="col-sm-2"><div class="box emphasized">2</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
	</div>
	
	<h2>Push &amp; Pull</h2>
	<p>You can use <code>.push</code> and <code>.pull</code> in order to switch order of cols. This is very handy
	if you want to maintain a logical structure of your html code. Please notice, that you always have to push the
	same amount of elements as you pull!</p>
	
	<p class="visible-phone-landscape visible-phone-portrait"><span class="label label-warning">Warning!</span> Push &amp; Pull is not available for this resolution!</p>
	
	<div class="row">
		<div class="col-sm-4 col-sm-push-4"><div class="box emphasized">first-third (4) pushed 4</div></div>
		<div class="col-sm-4 col-sm-pull-4"><div class="box emphasized">second-third (4) pulled 4</div></div>
		<div class="col-sm-4"><div class="box emphasized">third-third (4)</div></div>
	</div>
	
	<div class="row">
		<div class="col-sm-1 col-sm-push-1"><div class="box emphasized">1. col-sm-push-1</div></div>
		<div class="col-sm-1 col-sm-pull-1"><div class="box emphasized">2. col-sm-pull-1</div></div>
		<div class="col-sm-1 col-sm-push-2"><div class="box emphasized">3. col-sm-push-2</div></div>
		<div class="col-sm-1 col-sm-push-3"><div class="box emphasized">4. col-sm-push-3</div></div>
		<div class="col-sm-1 col-sm-pull-2"><div class="box emphasized">5. col-sm-pull-2</div></div>
		<div class="col-sm-1 col-sm-push-6"><div class="box emphasized">6. col-sm-push-6</div></div>
		<div class="col-sm-1 col-sm-pull-3"><div class="box emphasized">7. col-sm-pull-3</div></div>
		<div class="col-sm-1 col-sm-push-3"><div class="box emphasized">8. col-sm-push-3</div></div>
		<div class="col-sm-1 col-sm-push-1"><div class="box emphasized">9. col-sm-push-1</div></div>
		<div class="col-sm-1 col-sm-pull-4"><div class="box emphasized">10. col-sm-pull-4</div></div>
		<div class="col-sm-1 col-sm-pull-2"><div class="box emphasized">11. col-sm-pull-2</div></div>
		<div class="col-sm-1 col-sm-pull-4"><div class="box emphasized">12. col-sm-pull-4</div></div>
	</div>
</div>


<div class="container-fluid">
	<h2>This is a fluid container</h2>
	
	<h3>Normal 1 Grid</h3>
	<div class="row">
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
	</div>
	
	<h3>Nested Grid</h3>
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6"><div class="box emphasized">6</div></div>
				<div class="col-sm-4"><div class="box emphasized">4</div></div>
				<div class="col-sm-2"><div class="box emphasized">2</div></div>
			</div>
		</div>
		<div class="col-sm-3"><div class="box emphasized">3</div></div>
		<div class="col-sm-2"><div class="box emphasized">2</div></div>
		<div class="col-sm-1"><div class="box emphasized">1</div></div>
	</div>
	
</div>
