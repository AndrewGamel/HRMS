<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> @yield('content_header') </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

                 <li class="breadcrumb-item">@yield('content_header_active_link')</li>
<li class="breadcrumb-item active">@yield('content_header_active')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="content">
              @if (Session::has('success'))
                    <div class="alert alert-success text-center font-weight-lighter" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                  @if (Session::has('error'))
                    <div class="alert alert-danger text-center font-weight-lighter" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
           @yield('content')

        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  </div>
