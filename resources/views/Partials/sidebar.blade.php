<!-- partial:partials/_sidebar.blade.php -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-danger">Buka</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="typcn typcn-document-text menu-icon"></i>
                <span class="menu-title">All Datas</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Product</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
