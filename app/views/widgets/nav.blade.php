<nav class="navbar navbar-default" role="navigation">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Attributes Demo</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li {{ URL::current() === URL::to('patients') ? 'class="active"' : null }}><a href="{{URL::to('patients')}}">Patients</a></li>
			<li {{ URL::current() === URL::to('attributes') ? 'class="active"' : null }}><a href="{{URL::to('attributes')}}">Attributes</a></li>
		</ul>
	</div>

</nav>
