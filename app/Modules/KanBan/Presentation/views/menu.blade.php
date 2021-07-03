<li class="nav-label mg-t-15">Menu</li>
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
            <span>Product</span>
        </a>
    </li>
@endif

@if(request()->route('outlet_id') && request()->route('business_id'))
        <li>
            <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')])}}"
               class="nav-link">
                <i data-feather="coffee"></i>
                <span>Staff</span>
            </a>
        </li>
@endif
