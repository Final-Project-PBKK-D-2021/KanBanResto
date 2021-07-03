<li class="nav-label mg-t-15">With Business</li>
@if(request()->route('business_id'))
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
<li class="nav-label mg-t-15">With Outlet</li>
@if(request()->route('business_id'))
    <li>
        <a href="{{route('owner.withBusiness.outlet.index', ['business_id' => request()->route('business_id')])}}"
           class="nav-link">
            <i data-feather="shopping-bag"></i>
            <span>Outlet</span>
        </a>
    </li>
    @if(request()->route('outlet_id'))
        <li>
            <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')])}}"
            class="nav-link">
                <i data-feather="users"></i>
                <span>Staff</span>
            </a>
        </li>
    @elseif(request()->route('outlet'))
        <li>
            <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet')])}}"
            class="nav-link">
                <i data-feather="users"></i>
                <span>Staff</span>
            </a>
        </li>
    @endif
@endif

