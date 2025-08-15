@include('admin.layouts.parts.head')
@include('admin.layouts.parts.header')
<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
		    @include('admin.layouts.parts.left-side')
		    <!-- Main content -->
			<div class="content-wrapper">
			    <!-- Page breadcrumb -->
                	<div class="page-header page-header-default">
                		<div class="breadcrumb-line">
                			<ul class="breadcrumb">
                			    @yield('breadcrumb')
                			</ul>
                		</div>
                	</div>
                <!-- /page breadcrumb -->
			    <!-- Content area -->
				<div class="content">
				    
                    @yield('page-content')
                    
                    @include('admin.layouts.parts.footer')
                </div>
            </div>
        </div>
    </div>

@include('admin.layouts.parts.foot')
