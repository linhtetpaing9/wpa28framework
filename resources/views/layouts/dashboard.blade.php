
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('layouts.title')
    

    
    @include('layouts.css')
</head>

<body class="fix-header fix-sidebar">

    
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        
        <!-- header header  -->

        @include('layouts.nav')

        <!-- End header header -->
        <!-- Left Sidebar  -->
        @include('layouts.sidebar')
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
          
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    @yield('title')
                </div>
                
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    <div class="row">
                        
                         @yield('content')
                                
                    </div>
                  
                </div>
              
                
            
            </div>
           
        </div>

       @include('layouts.script')
    </body>





    </html>