<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
      <div class="logo">

        <a href="javascript:void(0)" class="simple-text logo-normal">
          Eshop
        </a>
      </div>
      <ul class="nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}} ">
          <a class="nav-link" href={{url('dashboard')}}>
            <i class="tim-icons icon-chart-pie-36"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="{{Request::is('categories') ? 'active' : ''}}">
          <a href={{url('categories')}}>
            <i class="tim-icons icon-atom"></i>
            <p>Categories</p>
          </a>
        </li>
        <li class="{{Request::is('add-category') ? 'active' : ''}}">
          <a href={{url('add-category')}}>
            <i class="tim-icons icon-atom"></i>
            <p>Add Categories</p>
          </a>
        </li>

        <li class="{{Request::is('products') ? 'active' : ''}}">
            <a href={{url('products')}}>
              <i class="tim-icons icon-atom"></i>
              <p>Products</p>
            </a>
        </li>

        <li class="{{Request::is('add-products') ? 'active' : ''}}">
            <a href={{url('add-products')}}>
              <i class="tim-icons icon-atom"></i>
              <p>Add Products</p>
            </a>
        </li>


      </ul>
    </div>
  </div>
