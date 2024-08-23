<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
  
  
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('account.index')}}">
              <i class="bi bi-circle"></i><span>User List</span>
            </a>
          </li>
        </ul>
      </li>

  
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Manage Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{route('manage-category.create')}}">
              <i class="bi bi-circle"></i><span>Add category</span>
            </a>
          </li>

          <li>
            <a href="{{route('manage-category.index')}}">
              <i class="bi bi-circle"></i><span>Show</span>
            </a>
          </li>

        </ul>
      </li>
  </aside>