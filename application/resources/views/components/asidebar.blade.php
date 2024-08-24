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
              <i class="bi bi-circle"></i><span>All category</span>
            </a>
          </li>

        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#news-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Manage news</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="news-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{route('manage-news.create')}}">
              <i class="bi bi-circle"></i><span>Add news</span>
            </a>
          </li>

          <li>
            <a href="{{route('manage-news.index')}}">
              <i class="bi bi-circle"></i><span>All news</span>
            </a>
          </li>

        </ul>
      </li>
  </aside>