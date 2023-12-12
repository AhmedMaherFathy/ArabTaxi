@section('sidebar')
<ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: #92023F ; direction:rtl; text-align:right;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{asset('assets/img/logo.svg')}}" alt="logo" title="welcome">
            {{-- {{ asset('assets/img/logo.svg') }} --}}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    {{-- <hr> --}}

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active sidebaricone" >
        <a class="nav-link" href="{{route('statistics.dashboard')}}" style="direction:rtl; text-align:right;">
            <i class="fas fa-fw fa-tachometer-alt" class="sidebaricone"></i>
            <span>لوحه التحكم</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" >

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        الوجهات
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active sidebaricone">
        <a class="nav-link " href="{{route('admin.list')}}"  style="direction:rtl; text-align:right;">
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <span>قائمه المتحكمين</span> 
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active" style="display: grid">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="direction:rtl; text-align:right;">
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <span>السائقين</span>
        </a>
        <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="direction:rtl; text-align:right;">
            <div class=" py-2 collapse-inner rounded" style="width:80%; ">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item " href="{{route('driver.male')}}" style="direction:rtl; text-align:right; color:black;">الرجال</a>
                <a class="collapse-item" href="{{route('driver.female')}}" style="direction:rtl; text-align:right; color:black;">النساء</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
@endsection

