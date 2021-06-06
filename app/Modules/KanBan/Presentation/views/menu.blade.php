<li class="nav-label mg-t-15">Menu</li>
<li>
    <a href="{{route('owner.business.index')}}" class="nav-link">
        <i data-feather="info"></i>
        <span>Business</span>
    </a>
</li>
@if(request()->route('business_id'))
    <li>
        <a href="{{route('owner.withBusiness.outlet.index', ['business_id' => request()->route('business_id')])}}"
           class="nav-link">
            <i data-feather="shopping-bag"></i>
            <span>Outlet</span>
        </a>
    </li>
    <li>
        <a href="{{route('owner.withBusiness.menu.index', ['business_id' => request()->route('business_id')])}}"
           class="nav-link">
            <i data-feather="layers"></i>
            <span>Menu</span>
        </a>
    </li>
    <li>
        <a href="{{route('owner.withBusiness.product.index', ['business_id' => request()->route('business_id')])}}"
           class="nav-link">
            <i data-feather="coffee"></i>
            <span>Product He</span>
        </a>
    </li>
    @if(request()->route('outlet_id'))
        <li>
            <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')])}}"
               class="nav-link">
                <i data-feather="coffee"></i>
                <span>staff</span>
            </a>
        </li>
    @endif
    <li>
        <a href="javascript: logout()" class="nav-link">
            <i data-feather="logout"></i>
            <span>Logout</span>
        </a>
        @if(Auth::guard('owner')->check())
            <form action="{{route('logout')}}" method="post" name="logoutForm" class="d-none">
                @csrf
            </form>
        @elseif(Auth::guard('staff')->check())
            <form action="{{route('staff_logout')}}" method="post" name="logoutForm" class="d-none">
                @csrf
            </form>
        @endif
        <script>
            function logout() {
                document.logoutForm.submit();
            }
        </script>
    </li>
@endif
