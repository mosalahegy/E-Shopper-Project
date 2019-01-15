<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('storage/storage/uploads/images/users/' . Auth::user()->image)}}" class="img-circle" alt="User Image">
            </div>
            
              <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="/dashboard/profile/{{Auth::user()->id}}"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Navigation</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
              </ul>
            </li>
          </ul>
          <ul class="sidebar-menu" data-widget="tree">
                
                <li class="active treeview">
                  <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="/dashboard/users/create"><i class="fa fa-plus"></i>Add New User</a></li>
                    <li><a href="/dashboard/users"><i class="fa fa-print"></i>Show All</a></li>
                  </ul>
                </li>
            </ul>
          <ul class="sidebar-menu" data-widget="tree">
              
              <li class="active treeview">
                <a href="#">
                  <i class="fa fa-cogs"></i> <span>Site Settings</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="/dashboard/sitesettings/create"><i class="fa fa-plus"></i>Add New Setting</a></li>
                  <li><a href="/dashboard/sitesettings"><i class="fa fa-print"></i>Show All</a></li>
                </ul>
              </li>
          </ul>
          <ul class="sidebar-menu" data-widget="tree">
              
              <li class="active treeview">
                <a href="#">
                  <i class="fa fa-th-list"></i> <span>Catogries</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="/dashboard/categories/create"><i class="fa fa-plus"></i>Add New Category</a></li>
                  <li><a href="/dashboard/categories"><i class="fa fa-print"></i>Show All</a></li>
                </ul>
              </li>
          </ul>
        <ul class="sidebar-menu" data-widget="tree">
            
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-cart-plus"></i> <span>Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="/dashboard/products/create"><i class="fa fa-plus"></i>Add New Product</a></li>
              <li><a href="/dashboard/products"><i class="fa fa-print"></i>Show All</a></li>
            </ul>
          </li>
        </ul>


        <ul class="sidebar-menu" data-widget="tree">
            
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-envelope-o"></i> <span>Messages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/dashboard/contacts"><i class="fa fa-print"></i>Show All</a></li>
            </ul>
          </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-tv"></i> <span>Sliders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="/dashboard/sliders/create"><i class="fa fa-plus"></i>Add New Slider</a></li>
              <li><a href="/dashboard/sliders"><i class="fa fa-print"></i>Show All</a></li>
            </ul>
          </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-bookmark"></i> <span>Brands</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="/dashboard/brands/create"><i class="fa fa-plus"></i>Add New Brand</a></li>
              <li><a href="/dashboard/brands"><i class="fa fa-print"></i>Show All</a></li>
            </ul>
          </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-bookmark"></i> <span>Advertisements</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="/dashboard/advertisements/create"><i class="fa fa-plus"></i>Add New Advertisement</a></li>
              <li><a href="/dashboard/advertisements"><i class="fa fa-print"></i>Show All</a></li>
            </ul>
          </li>
        </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>
