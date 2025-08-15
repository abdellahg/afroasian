<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Admin Panel</span>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			

			

			<ul class="nav navbar-nav navbar-right">
				
				<!--<li class="dropdown">-->
				<!--	<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
				<!--		<i class="icon-bubbles4"></i>-->
				<!--		<span class="visible-xs-inline-block position-right">Messages</span>-->
				<!--		<span class="badge bg-warning-400">2</span>-->
				<!--	</a>-->
					
				<!--	<div class="dropdown-menu dropdown-content width-350">-->
				<!--		<div class="dropdown-content-heading">-->
				<!--			Messages-->
				<!--			<ul class="icons-list">-->
				<!--				<li><a href="#"><i class="icon-compose"></i></a></li>-->
				<!--			</ul>-->
				<!--		</div>-->

						

				<!--		<div class="dropdown-content-footer">-->
				<!--			<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</li>-->

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('assets/admin/images/placeholder.jpg') }}" alt="">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{url('/')}}" target="_blank"><i class="icon-eye"></i>View Website</a></li>
						
						<li><a href="{{ url('/logout') }}"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->