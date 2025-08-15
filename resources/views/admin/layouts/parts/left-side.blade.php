<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="{{ asset('assets/admin/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Cairo, EG
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li {{{ (Request::is('admin/dashboard') ? ' class=active' : '') }}} >
                                    <a href="{{url('/admin/dashboard')}}"><i class="icon-home4">
                                        </i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li><a href="#"><i class="icon-tree6"></i> <span>Tour Categories</span></a>
								    <ul>
										<li {{{ (Request::is('admin/categories/main') ? ' class=active' : '') }}}
                                            {{{ (Request::is('admin/categories/main/add') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/categories/main')}}">Main Categories</a></li>
										<li {{{ (Request::is('admin/categories/sub') ? ' class=active' : '') }}}
                                            {{{ (Request::is('admin/categories/sub/add') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/categories/sub')}}">Sub Categories</a></li>
									</ul>
								</li>
								
								<li><a href="#"><i class="icon-location4"></i> <span>Destinations</span></a>
								    <ul>
										<li {{{ (Request::is('admin/destinations/add') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/destinations/add')}}">New Destination</a></li>
										<li {{{ (Request::is('admin/destinations/local') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/destinations/local')}}">Local Destinations</a></li>
                                        <li {{{ (Request::is('admin/destinations/foreign') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/destinations/foreign')}}">Foreign Destinations</a></li>
									</ul>
								</li>
								
								<li><a href="#"><i class="icon-earth"></i> <span>Tours</span></a>
								    <ul>
										<li {{{ (Request::is('admin/items/add') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/items/add')}}">New Tour</a></li>
										<li {{{ (Request::is('admin/items') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/items')}}">Tours</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="icon-cash"></i> <span>Payments</span></a>
									<ul>
										<li {{{ (Request::is('admin/payments') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/payments')}}">Manage Payments</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="icon-archive"></i> <span>Reservations</span></a>
								    <ul>
										<li {{{ (Request::is('admin/reservations') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/reservations')}}">Manage Reservations</a></li>
									</ul>
								</li>
								
								<li><a href="#"><i class="icon-envelop3"></i> <span>Messages</span></a>
									<ul>
										<li {{{ (Request::is('admin/messages') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/messages')}}">All Messages</a></li>
									</ul>
								</li>
                                
                                <li><a href="#"><i class="icon-comments"></i> <span>Reviews</span></a>
									<ul>
										<li {{{ (Request::is('admin/reviews') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/reviews')}}">Manage Reviews</a></li>
									</ul>
								</li>
                                
								<li><a href="#"><i class="icon-stack"></i> <span>Pages</span></a>
									<ul>
										<li {{{ (Request::is('admin/home-settings') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/home-settings')}}">Home Page</a></li>
                                        <li {{{ (Request::is('admin/home-services') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/home-services')}}">Home Services</a></li>
                                        <li {{{ (Request::is('admin/about-settings') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/about-settings')}}">About Us</a></li>
                                        <li {{{ (Request::is('admin/contact-settings') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/contact-settings')}}">Contact Us</a></li>
                                            <li {{{ (Request::is('admin/register-settings') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/register-settings')}}">Register Page</a></li>
                                        <li {{{ (Request::is('admin/terms-settings') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/terms-settings')}}">Terms and Conditions</a></li>
                                        
									</ul>
								</li>

								<li><a href="#"><i class="icon-newspaper"></i> <span>Blogs</span></a>
									<ul>
										<li {{{ (Request::is('admin/blogs/add') ? ' class=active' : '') }}}>
											<a href="{{url('/admin/blogs/add')}}">New Blog</a></li>
										<li {{{ (Request::is('admin/blogs') ? ' class=active' : '') }}}>
											<a href="{{url('/admin/blogs')}}">Blogs</a></li>
										<li class="navigation-divider"></li>	
										<li {{{ (Request::is('admin/blog/categories/add') ? ' class=active' : '') }}}>
											<a href="{{url('/admin/blog/categories/add')}}">New Blog Category</a></li>
										<li {{{ (Request::is('admin/blog/categories') ? ' class=active' : '') }}}>
											<a href="{{url('/admin/blog/categories')}}">Blog Categories</a></li>
									</ul>
								</li>
                                
                                <li><a href="#"><i class="icon-camera"></i> <span>Galleries</span></a>
									<ul>
										<li {{{ (Request::is('admin/galleries/add') ? ' class=active' : '') }}}>
											<a href="{{url('/admin/galleries/add')}}">New Gallery</a></li>
										<li {{{ (Request::is('admin/galleries') ? ' class=active' : '') }}}>
											<a href="{{url('/admin/galleries')}}">Galleries</a></li>
									</ul>
								</li>
								
								<li ><a href="#"><i class="icon-cogs"></i> <span>Settings</span></a>
								    <ul>
										<li {{{ (Request::is('admin/settings') ? ' class=active' : '') }}} >
                                            <a href="{{url('/admin/settings')}}">Main Settings</a></li>
                                        
                                        <li {{{ (Request::is('admin/social') ? ' class=active' : '') }}} >
                                            <a href="{{url('/admin/social')}}">Social Links</a></li>
                                        
										<li {{{ (Request::is('admin/meta-settings') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/meta-settings')}}">Meta Settings</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="icon-question4"></i> <span>Surveys</span></a>
								    <ul>
										<li {{{ (Request::is('admin/surveys') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/surveys')}}">Surveys</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="icon-users4"></i> <span>users</span></a>
								    <ul>
										<li {{{ (Request::is('admin/users') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/users')}}">Users</a></li>
									</ul>
								</li>
								@if(Auth::user()->admin == 1 && Auth::user()->role == 1 )
								<li><a href="#"><i class="icon-users"></i> <span>Admins</span></a>
								    <ul>
										<li {{{ (Request::is('admin/add-admin') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/add-admin')}}">New Admin</a></li>
										<li {{{ (Request::is('admin/admins') ? ' class=active' : '') }}}>
                                            <a href="{{url('/admin/admins')}}">All Admins</a></li>
									</ul>
								</li>
								@endif
								<!-- /main -->



							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->