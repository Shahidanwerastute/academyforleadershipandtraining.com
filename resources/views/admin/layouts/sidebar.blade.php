<aside id="sidebar_main">
	<div class="sidebar_main_header">
		<div class="sidebar_logo">
			<a href="{{route('admin-group')}}" class="sSidebar_hide sidebar_logo_large">
				{{ HTML::image('public/assets/assets/img/logo_main.png',null, array('height' => '15','width' => '71','class' => 'logo_regular')) }}
				{{ HTML::image('public/assets/assets/img/logo_main_white.png',null, array('height' => '15','width' => '71','class' => 'logo_light')) }}
			</a>
			<a href="{{route('admin-group')}}" class="sSidebar_show sidebar_logo_small">
				{{ HTML::image('public/assets/assets/img/logo_main.png',null, array('height' => '32','width' => '32','class' => 'logo_regular')) }}
				{{ HTML::image('public/assets/assets/img/logo_main_white.png',null, array('height' => '32','width' => '32','class' => 'logo_light')) }}
			</a>
		</div>
	</div>
	<div class="menu_section">
		<ul>
			<li title="Dashboard" class="{{ (Route::is('admin-dashboard') ? 'act_item' : '') }}">
				<a href="{{ route('admin-dashboard') }}">
					<span class="menu_icon"><i class="material-icons">dashboard</i></span>
					<span class="menu_title">Dashboard</span>
				</a>
			</li>
			@if(Auth::user()->hasRole('administrator'))
			<li title="Companies" class="{{ (Route::is('admin-group') ? 'act_item' : '') }}">
				<a href="{{ route('admin-group') }}">
					<span class="menu_icon"><i class="material-icons">group_work</i></span>
					<span class="menu_title">Companies</span>
				</a>
			</li>
			@endif
			<li title="Employees" class="{{ (Route::is('admin-employee') ? 'act_item' : '') }}">
				<a href="{{ route('admin-employee') }}">
					<span class="menu_icon"><i class="material-icons">people</i></span>
					<span class="menu_title"> Employees</span>
				</a>
			</li>
			<li title="Coupons" class="{{ (Route::is('admin-coupon') ? 'act_item' : '') }}">
				<a href="{{ route('admin-coupon') }}">
					<span class="menu_icon"><i class="material-icons">swap_calls</i></span>
					<span class="menu_title"> Coupons</span>
				</a>
			</li>
			{{--@if(Auth::user()->hasPermissionTo('category view') || Auth::user()->hasRole('administrator'))
				<li title="Create Category" class="{{ (Route::is('admin-category') ? 'act_item' : '') }}">
			<a href="{{ route('admin-category') }}">
				<span class="menu_icon"><i class="material-icons">line_style</i></span>
				<span class="menu_title">Create Category</span>
			</a>
			</li>
			@endif --}}
			{{-- @if(Auth::user()->hasPermissionTo('survey view') || Auth::user()->hasRole('administrator'))
				<li title="Create Survey" class="{{ (Route::is('admin-survey') ? 'act_item' : '') }}">
			<a href="{{ route('admin-survey') }}">
				<span class="menu_icon"><i class="material-icons">subtitles</i></span>
				<span class="menu_title">Create Survey</span>
			</a>
			</li>
			@endif --}}
			@if(Auth::user()->hasPermissionTo('survey submissions') || Auth::user()->hasRole('administrator'))
			<li title="Survey Results" class="{{ (Route::is('admin-submissions') ? 'act_item' : '') }}">
				<a href="{{ route('admin-submissions') }}">
					<span class="menu_icon"><i class="material-icons">create</i></span>
					<span class="menu_title">Assessment Results</span>
				</a>
			</li>
			@endif
			{{-- @if(Auth::user()->hasPermissionTo('role view') || Auth::user()->hasRole('administrator'))
				<li title="Manage Roles" class="{{ (Route::is('admin-role') ? 'act_item' : '') }}">
			<a href="{{ route('admin-role') }}">
				<span class="menu_icon"><i class="material-icons">visibility</i></span>
				<span class="menu_title">Manage Roles</span>
			</a>
			</li>
			@endif --}}
			{{-- @if(Auth::user()->hasRole('administrator'))
				<li title="Manage Permissions" class="{{ (Route::is('admin-permission') ? 'act_item' : '') }}">
			<a href="{{ route('admin-permission') }}">
				<span class="menu_icon"><i class="material-icons">pan_tool</i></span>
				<span class="menu_title">Manage Permissions</span>
			</a>
			</li>
			@endif --}}
			{{-- @if(Auth::user()->hasPermissionTo('user view') || Auth::user()->hasRole('administrator'))
				<li title="Manage Users" class="{{ (Route::is('admin-user') ? 'act_item' : '') }}">
			<a href="{{ route('admin-user') }}">
				<span class="menu_icon"><i class="material-icons">people</i></span>
				<span class="menu_title"> Manage Users</span>
			</a>
			</li>
			@endif --}}
			<li title="Manage Pdf's" class="{{ (Route::is('admin-pdf') ? 'act_item' : '') }}">
				<a href="{{ route('admin-pdf') }}">
					<span class="menu_icon"><i class="material-icons">picture_as_pdf</i></span>
					<span class="menu_title"> Manage Pdf's</span>
				</a>
			</li>
			<li title="Blogs">
				<a href="#">
					<span class="menu_icon"><i class="material-icons">description</i></span>
					<span class="menu_title">Blogs</span>
				</a>
				<ul>
					<li class="{{ (Route::is('admin-blog') ? 'act_item' : '') }}"><a href="{{ route('admin-blog') }}">Blogs</a></li>
					<li class="{{ (Route::is('admin-review') ? 'act_item' : '') }}"><a href="{{ route('admin-review') }}">Reviews</a></li>
				</ul>
			</li>
			<li title="Courses">
				<a href="#">
					<span class="menu_icon"><i class="material-icons">library_books</i></span>
					<span class="menu_title">Courses</span>
				</a>
				<ul>
					<li class="{{ (Route::is('admin-course') ? 'act_item' : '') }}"><a href="{{ route('admin-course') }}">Courses</a></li>
					<li class="{{ (Route::is('admin-course-sorting') ? 'act_item' : '') }}"><a href="{{ route('admin-course-sorting') }}">Courses Sorting</a></li>
					<li class="{{ (Route::is('admin-instructor') ? 'act_item' : '') }}"><a href="{{ route('admin-instructor') }}">Instructors</a></li>
					<li class="{{ (Route::is('admin-payment') && $data['route-paramters']['status'] == "payment" ? 'act_item' : '') }}"><a href="{{ route('admin-payment', ['payment']) }}">Payments</a></li>
					<li class="{{ (Route::is('admin-payment') && $data['route-paramters']['status'] == "request" ? 'act_item' : '') }}"><a href="{{ route('admin-payment', ['request']) }}">Requests</a></li>
				</ul>
			</li>
			<li title="New Manage Pdf's" class="{{ (Route::is('admin-new-pdf') ? 'act_item' : '') }}">
				<a href="{{ route('admin-new-pdf') }}">
					<span class="menu_icon"><i class="material-icons">picture_as_pdf</i></span>
					<span class="menu_title"> New Manage Pdf's</span>
				</a>
			</li>
			<li title="Create Sessions" class="{{ (Route::is('admin-session') ? 'act_item' : '') }}">
				<a href="{{ route('admin-session') }}">
					<span class="menu_icon"><i class="material-icons">line_style</i></span>
					<span class="menu_title">Sessions</span>
				</a>
			</li>
			<li title="Profile Settings" class="{{ (Route::is('admin-rater-email-fields') ? 'act_item' : '') }}">
				<a href="{{ route('admin-rater-email-fields') }}">
					<span class="menu_icon"><i class="material-icons">account_box</i></span>
					<span class="menu_title">Raters' Email Fields</span>
				</a>
			</li>
			<li title="Profile Settings" class="{{ (Route::is('admin-edit-profile') ? 'act_item' : '') }}">
				<a href="{{ route('admin-edit-profile') }}">
					<span class="menu_icon"><i class="material-icons">account_box</i></span>
					<span class="menu_title">Profile Settings</span>
				</a>
			</li>
			@if(Auth::user()->hasRole('administrator'))
			<li title="General Settings" class="{{ (Route::is('admin-general-setting') ? 'act_item' : '') }}">
				<a href="{{ route('admin-general-setting') }}">
					<span class="menu_icon"><i class="material-icons">perm_data_setting</i></span>
					<span class="menu_title">General Settings</span>
				</a>
			</li>
			@endif
			{{-- @if(Auth::user()->hasRole('administrator'))
				<li title="Smtp Setting" class="{{ (Route::is('admin-setting-smtp') ? 'act_item' : '') }}">
			<a href="{{ route('admin-setting-smtp') }}">
				<span class="menu_icon"><i class="material-icons">settings</i></span>
				<span class="menu_title">Smtp Settings</span>
			</a>
			</li>
			@endif --}}
		</ul>
	</div>
</aside>
<!-- main sidebar end -->