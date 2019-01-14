<?php 
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2nutil\bootstrap\ui\BsFormHtmlBuilder;
	use bstmpl\model\layout\BsExampleForm;
	use n2nutil\bootstrap\ui\Bs;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$bsFromHtml = new BsFormHtmlBuilder($view);
	$bsExampleForm = $view->lookup(BsExampleForm::class);
	$view->assert($bsExampleForm instanceof BsExampleForm);
	
	
?>

<h2>Forms</h2>
<div class="row">
	<div class="col-sm-4">
		<h3>Simple Form</h3>
		<?php $bsFromHtml->open($bsExampleForm) ?>
			<?php $bsFromHtml->inputGroup('firstname', Bs::hTxt('Example help text here.')->ph('Examplename')) ?>
			<?php $bsFromHtml->inputGroup('lastname') ?>
			<?php $bsFromHtml->inputCheckboxCheck('checkMeOut', true) ?>
			<?php $bsFromHtml->buttonSubmitGroup(null, 'submit') ?>
		<?php $bsFromHtml->close() ?>
	</div>
	<div class="col-sm-8">
		<h3>horizontal Forms</h3>
		<?php $bsFromHtml->open($bsExampleForm) ?>
		<?php $bsCols = Bs::row('col-sm-4', 'col-sm-8', 'offset-sm-4') ?>
			<?php $bsFromHtml->inputGroup('firstname', $bsCols->hTxt('Example help text here.')->ph('Examplename')) ?>
			<?php $bsFromHtml->inputGroup('lastname', $bsCols->hTxt(null)->ph(null)) ?>
			<?php $bsFromHtml->inputCheckboxCheck('checkMeOut', true, $bsCols) ?>
			<?php $bsFromHtml->buttonSubmitGroup(null, 'submit', $bsCols) ?>
		<?php $bsFromHtml->close() ?>
	</div>
</div>



<h2>Forms</h2>
	<p class="lead">There are 3 different form types (like in Twitter Bootstrap):</p>
	<div class="row">
		<div class="col-sm-4 col-sm-full-6">
			<h3>Basic Form</h3>
			<form>
				<label>Label name</label>
				<input type="text" class="form-control span3" placeholder="Type something…">
				<span class="help-block">Example block-level help text here.</span>
				<label class="checkbox">
				<input type="checkbox"> Check me out
				</label>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		
		<div class="col-sm-8">
			<h3>Search Form</h3>
			<form class="form-search">
				<input type="text" class="form-control search-query">
				<button type="submit" class="btn btn-default">Search</button>
			</form>

			<h3>Inline Form</h3>
			<form class="well form-inline">
				<div class="form-group">
					<label for="frm-email" class="sr-only">Email Address</label>
					<input type="text" class="form-control" id="frm-email" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password">
				</div>
				<label class="checkbox">
					<input type="checkbox"> Remember me
				</label>
				<button type="submit" class="btn btn-default">Sign in</button>
			</form>
		</div>
	</div>
	<h3>Horizontal Forms</h3>
	
	<form class="form-horizontal">
		<fieldset>
			<div class="form-group">
				<label class="control-label col-sm-3" for="input01">Text input</label>
				<div class="col-sm-9">
					<input class="form-control" id="input01" type="text">
					<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="optionsCheckbox">Checkbox</label>
				<div class="col-sm-9">
					<label class="checkbox">
						<input id="optionsCheckbox" value="option1" type="checkbox">
						Option one is this and that—be sure to include why it's great
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 text-right">
					<label for="input02">Label</label> 
					<label for="input03">Group</label>
				</div>
				<div class="col-sm-9" class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<input class="col-sm-3 form-control" id="input02" type="text">
						</div>
						<div class="col-sm-4">
							<input class="col-sm-3 form-control" id="input03" type="text">
						</div>
					</div>
					<p class="help-block">With <code>.label-group</code> you can put more input fields with labels on one line! Use also <code>.input-grid-spacer</code> to ensure correct spacing!</p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="select01">Select list</label>
				<div class="col-sm-9">
					<select id="select01" class="form-control">
						<option>something</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="multiSelect">Multicon-select</label>
				<div class="col-sm-9">
					<select multiple="multiple" id="multiSelect" class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="fileInput">File input</label>
				<div class="col-sm-9">
					<input class="input-file" id="fileInput" type="file">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="textarea">Textarea</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="textarea" rows="3"></textarea>
				</div>
			</div>
			<div class="col-sm-9 col-sm-offset-3">
				<input type="submit" class="btn btn-primary" value="Save changes" />
				<button class="btn btn-default">Cancel</button>
			</div>
		</fieldset>
	</form>		

	
	<div class="row">
		<div class="col-sm-6">
			<h3>Spezial Form states</h3>
			<form class="form-horizontal">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-4" for="focusedInput">Focused input</label>
						<div class="col-sm-8">
							<input class="input-xlarge form-control focused" id="focusedInput" value="This is focused…" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Uneditable input</label>
						<div class="col-sm-8">
							<span class="input-xlarge uneditable-input">Some value here</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="disabledInput">Disabled input</label>
						<div class="col-sm-8">
							<input class="input-xlarge form-control disabled" id="disabledInput" placeholder="Disabled input here…" disabled="disabled" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="optionsCheckbox2">Disabled checkbox</label>
						<div class="col-sm-8">
							<label class="">
								<input id="optionsCheckbox2" value="option1" disabled="disabled" type="checkbox">
								This is a disabled checkbox
							</label>
						</div>
					</div>
					<div class="form-group warning has-warning">
						<label class="control-label col-sm-4" for="inputWarning">Input with warning</label>
						<div class="col-sm-8">
							<input id="inputWarning" class="form-control" type="text">
							<span class="help-block">Something may have gone wrong</span>
						</div>
					</div>
					<div class="form-group error has-error">
						<label class="control-label col-sm-4" for="inputError">Input with error</label>
						<div class="col-sm-8">
							<input id="inputError" class="form-control"  type="text">
							<span class="help-block">Please correct the error</span>
						</div>
					</div>
					<div class="form-group success has-success">
						<label class="control-label col-sm-4" for="inputSuccess">Input with success</label>
						<div class="col-sm-8">
							<input id="inputSuccess" class="form-control"  type="text">
							<span class="help-block">Woohoo!</span>
						</div>
					</div>
					<div class="form-group has-success">
						<label class="control-label col-sm-4" for="selectError">Select with success</label>
						<div class="col-sm-8 ">
							<select id="selectError" class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<span class="help-block">Woohoo!</span>
						</div>
					</div>
					<div class="col-sm-8 col-sm-offset-4">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button class="btn btn-default">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="col-sm-6">
			<h3>More form elements</h3>
			<form class="form-horizontal">
				<fieldset>
          <div class="form-group">
            <label class="control-label col-sm-4">Alternate sizes</label>
            <div class="col-sm-8 docs-input-sizes">
              <input class="form-control" placeholder=".input-mini" type="text">
              <input class="form-control" placeholder=".input-small" type="text">
              <input class="form-control" placeholder=".input-medium" type="text">
              <p class="help-block">You may also use static classes that don't map to the grid, adapt to the responsive CSS styles, or account for varying types of col-sm-9 (e.g., <code>input</code> vs. <code>select</code>).</p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="prependedInput">Prepended text</label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon">@</span><input class="form-control" id="prependedInput" size="16" type="text">
              </div>
              <p class="help-block">Here's some help text</p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="appendedInput">Appended text</label>
            <div class="col-sm-8">
              <div class="input-group">
                <input class="form-control" id="appendedInput" size="16" type="text"><span class="input-group-addon">.00</span>
              </div>
              <span class="help-inline">Here's more help text</span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="appendedPrependedInput">Append and prepend</label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input class="form-control" id="appendedPrependedInput" size="16" type="text">
                <span class="input-group-addon">.00</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="appendedInputButton">Append with button</label>
            <div class="col-sm-8">
              <div class="input-group">
                <input class="form-control" id="appendedInputButton" size="16" type="text">
                <span class="input-group-btn">
                	<button class="btn btn-default" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="appendedInputButtons">Two-button append</label>
            <div class="col-sm-8">
              <div class="input-group">
                <input class="form-control" id="appendedInputButtons" size="16" type="text">
                <span class="input-group-btn btn-group">
	                <button class="btn btn-default" type="button">Search</button>
	                <button class="btn btn-default" type="button">Options</button>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="inlineCheckboxes">Inline checkboxes</label>
            <div class="col-sm-8">
              <label class="checkbox inline">
                <input id="inlineCheckbox1" value="option1" type="checkbox"> 1
              </label>
              <label class="checkbox inline">
                <input id="inlineCheckbox2" value="option2" type="checkbox"> 2
              </label>
              <label class="checkbox inline">
                <input id="inlineCheckbox3" value="option3" type="checkbox"> 3
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="optionsCheckboxList">Checkboxes</label>
            <div class="col-sm-8">
              <label class="checkbox">
                <input name="optionsCheckboxList1" value="option1" type="checkbox">
                Option one is this and that—be sure to include why it's great
              </label>
              <label class="checkbox">
                <input name="optionsCheckboxList2" value="option2" type="checkbox">
                Option two can also be checked and included in form results
              </label>
              <label class="checkbox">
                <input name="optionsCheckboxList3" value="option3" type="checkbox">
                Option three can—yes, you guessed it—also be checked and included in form results
              </label>
              <p class="help-block"><strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.</p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Radio buttons</label>
            <div class="col-sm-8">
              <label class="radio">
                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="checked" type="radio">
                Option one is this and that—be sure to include why it's great
              </label>
              <label class="radio">
                <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                Option two can be something else and selecting it will deselect option one
              </label>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button class="btn btn-default">Cancel</button>
			</div>
		</fieldset>
			</form>
		</div>
	</div>