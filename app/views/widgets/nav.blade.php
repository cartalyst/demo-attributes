<div class="masthead clearfix">
	<div class="inner">
		<h3 class="masthead-brand">Attributes <span>by Cartalyst</span></h3>
		<ul class="nav masthead-nav">
			<li {{ URL::current() === URL::to('') ? 'class="active"' : null }}><a href="{{URL::to('/')}}">Home</a></li>
			<li {{ URL::current() === URL::to('patients') ? 'class="active"' : null }}><a href="{{URL::to('patients')}}">Patients</a></li>
			<li {{ URL::current() === URL::to('attributes') ? 'class="active"' : null }}><a href="{{URL::to('attributes')}}">Attributes</a></li>
		</ul>
	</div>
</div>
