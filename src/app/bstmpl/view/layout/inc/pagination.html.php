<h2>Pagination and Pager<small></small></h2>
	<p><span class="label label-warning">Notice</span> We use <code>SPAN</code> tags in order to show inactive (disabled and active) choices.</p>

	<div class="row">
		<div class="col-sm-3">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
	        				<span class="sr-only">Previous</span>
        				</a>
        			</li>
					<li class="page-item active">
						<span class="page-link">1</span>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">2</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">3</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">4</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Next">
					    	<span aria-hidden="true">&raquo;</span>
					    	<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="col-sm-3">
			<nav aria-label="Page navigation">
				<ul class="pagination pagination-sm">
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Previous">«</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">10</a>
					</li>
					<li class="page-item active">
						<span class="page-link">11</span>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">12</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">»</a>
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="col-sm-3">
			<ul class="pagination pagination-lg">
				<li>
					<a href="#">«</a>
				</li>
				<li class="active">
					<span>10</span>
				</li>
				<li>
					<span>...</span>
				</li>
				<li>
					<a href="#">20</a>
				</li>
				<li>
					<a href="#">»</a>
				</li>
			</ul>
		</div>
		
		<div class="col-sm-3 text-center">
			<ul class="pagination">
				<li class="active">
					<span>1</span>
				</li>
				<li>
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
			</ul>
		</div>
	</div>
	
	<h2>Pager <small>For quick previous and next links</small></h2>
	
	<div class="row">
		<div class="col-sm-6">
			<h3>Default</h3>
			<ul class="pager">
				<li>
					<a href="#">Previous</a>
				</li>
				<li>
					<a href="#">Next</a>
				</li>
			</ul>
		</div>
		
		<div class="col-sm-6">
			<h3>Aligned links</h3>
			<ul class="pager">
				<li class="previous">
					<a href="#">&larr; Older</a>
				</li>
				<li class="next">
					<a href="#">Newer &rarr;</a>
				</li>
			</ul>
		</div>
		
	</div>