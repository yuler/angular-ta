<!DOCTYPE html>
<html lang="en" ng-app="siteApp">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
		 <!-- ,maximum-scale=1.0, user-scalable=no -->
	@include('_partials/assets')
	<title>
		@section('title')
			TA主页
		@show
	</title>
</head>
<body>
	
	@include('_partials/navigation')
	
	<div id="sb-site" >
		<div ng-view class="container"></div>

		@include('_partials/footer')
		
		<div class="sb-slidebar sb-left">
			<!-- Your left Slidebar content. -->
			<div class="book-summary">
			    <div class="book-search">
			        <input type="text" placeholder="Search" class="form-control">
			    </div>
			    <ul class="summary">
			        <li>
			            <a href="https://www.gitbook.io/@gitbookio" target="blank" class="author-link">About the author</a>
			        </li>
			        <li>
			            <a href="https://www.gitbook.io/book/gitbookio/javascript" target="blank" class="issues-link">Questions and Issues</a>
			        </li>
			        <li>
			            <a href="https://www.gitbook.io/book/gitbookio/javascript" target="blank" class="contribute-link">Edit and Contribute</a>
			        </li>
			        <li class="divider"></li>
			        <li class="chapter active done" data-level="0" data-path="index.html">
	                    <a href="./index.html">
	                        <i class="fa fa-check"></i>
	                        
	                         Introduction
	                    </a>
			        </li>
			        <li class="chapter  done" data-level="1" data-path="basics/README.html">
		                    <a href="./basics/README.html">
		                        <i class="fa fa-check"></i>
		                            <b>1.</b>
		                         Basics
		                    </a>
			            <ul class="articles">
					        <li class="chapter  done" data-level="1.1" data-path="basics/comments.html">
			                    <a href="./basics/comments.html">
			                        <i class="fa fa-check"></i>
			                            <b>1.1.</b>
			                         Comments
			                    </a>
					        </li>
				    		 <li class="chapter  done" data-level="1.1" data-path="basics/comments.html">
			                    <a href="./basics/comments.html">
			                        <i class="fa fa-check"></i>
			                            <b>1.1.</b>
			                         Comments
			                    </a>
					        </li>
				        </ul>
			        </li>
			        <li class="divider"></li>
			        <li>
			            <a href="http://www.gitbook.io/" target="blank" class="gitbook-link">Generated using GitBook</a>
			        </li>
			    </ul>
			</div>
		</div>
		
		<div class="sb-slidebar sb-right">
			<!-- Your left Slidebar content. -->
			<div class="book-summary">
			    <div class="book-search">
			        <input type="text" placeholder="Search" class="form-control">
			    </div>
			    <ul class="summary">
			        <li>
			            <a href="https://www.gitbook.io/@gitbookio" target="blank" class="author-link">About the author</a>
			        </li>
			        <li>
			            <a href="https://www.gitbook.io/book/gitbookio/javascript" target="blank" class="issues-link">Questions and Issues</a>
			        </li>
			        <li>
			            <a href="https://www.gitbook.io/book/gitbookio/javascript" target="blank" class="contribute-link">Edit and Contribute</a>
			        </li>
			        <li class="divider"></li>
			        <li class="chapter active done" data-level="0" data-path="index.html">
	                    <a href="./index.html">
	                        <i class="fa fa-check"></i>
	                        
	                         Introduction
	                    </a>
			        </li>
			        <li class="chapter  done" data-level="1" data-path="basics/README.html">
		                    <a href="./basics/README.html">
		                        <i class="fa fa-check"></i>
		                            <b>1.</b>
		                         Basics
		                    </a>
			            <ul class="articles">
					        <li class="chapter  done" data-level="1.1" data-path="basics/comments.html">
			                    <a href="./basics/comments.html">
			                        <i class="fa fa-check"></i>
			                            <b>1.1.</b>
			                         Comments
			                    </a>
					        </li>
				    		 <li class="chapter  done" data-level="1.1" data-path="basics/comments.html">
			                    <a href="./basics/comments.html">
			                        <i class="fa fa-check"></i>
			                            <b>1.1.</b>
			                         Comments
			                    </a>
					        </li>
				        </ul>
			        </li>
			        <li class="divider"></li>
			        <li>
			            <a href="http://www.gitbook.io/" target="blank" class="gitbook-link">Generated using GitBook</a>
			        </li>
			    </ul>
			</div>
		</div>
		
	</div>
	
</body>
</html>