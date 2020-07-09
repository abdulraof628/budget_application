<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('head')
    </head>
    
    <body>
        <div class="dashboard-main-wrapper">
	        <div class="dashboard-header">
                @yield('top_navbar')
            </div>

            <div class="nav-left-sidebar sidebar-dark">
                <div class="menu-list">
                    @yield('side_navbar')
                </div>
            </div>
            
	        <div class="dashboard-wrapper">
                @yield('content')
                <div class="footer" style="bottom: 0; position: fixed">
                    @yield('footer')
                </div>
            </div>
            @yield('script')
        </div>
    </body>
</html>