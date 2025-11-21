<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Vibe<span>Nigeria</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body" style="background: linear-gradient(#fff, #dcdcdc);">
        <ul class="nav">
          <li class="nav-item nav-category" >Main</li>
          <li class="nav-item">
            @if(Auth::user()->can('role_management.menu'))
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
            @else 
<a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>

            @endif
            
          </li>

          @if(Auth::user()->can('role_management.menu'))
          <li class="nav-item nav-category">Badges & Levels Admin</li>
          


          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Component</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapsed" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('admin.Badges')}}" class="nav-link">Admin Create Badges</a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.Levels')}}" class="nav-link">Admin Create Levels</a>
                </li>
                
              </ul>
            </div>
          </li>
@endif

@if(Auth::user()->can('role_management.menu'))

          <li class="nav-item nav-category">Admin Activities</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                  <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Task</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapsed" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('admin.Tasks')}}" class="nav-link">Admin Creat Task</a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.showTask')}}" class="nav-link">Admin View Tasks</a>
                </li>

                
                <li class="nav-item">
                  <a href="{{ route('admin.submissions')}}" class="nav-link">Approve Tasks</a>
                </li>
                
              </ul>
            </div>
          </li>



    @endif
         
       
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapsed" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
              
                  <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Task Activities</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapsed" id="forms">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('user.all-task')}}" class="nav-link">User View All Tasks</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">User Completed Tasks</a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">User Task Profile</a>
                </li>
              
                <li class="nav-item">
                  <a href="{{ route('user.my.submissions')}}" class="nav-link">submited Tasks</a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">Enrolled Tasks</a>
                </li>
              </ul>
            </div>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapsed" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
              <i class="link-icon" data-feather="layout"></i>
              <span class="link-title">Table</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapsed" id="tables">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/tables/basic-table.html" class="nav-link">Basic Tables</a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data-table.html" class="nav-link">Data Table</a>
                </li>
              </ul>
            </div>
          </li>
         
         
         
          
         

@if(Auth::user()->can('role_management.menu'))
          <li class="nav-item nav-category">Role & Permission</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rolePages" role="button" aria-expanded="false" aria-controls="errorPages">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Role & Permission</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="rolePages">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.permissions'))
                <li class="nav-item">
                  <a href="{{ route('all.permission') }}" class="nav-link">All Permissions</a>
                </li>
                @endif
                
                @if(Auth::user()->can('all.roles'))
                <li class="nav-item">
                  <a href="{{ route('all.roles') }}" class="nav-link">All Roles</a>
                </li>
                @endif
                @if(Auth::user()->can('roles_in_permission'))
                <li class="nav-item">
                  <a href="{{ route('add.roles.permission') }}" class="nav-link">Roles In Permission</a>
                </li>
                @endif
                @if(Auth::user()->can('all_role_and_permission'))
                <li class="nav-item">
                  <a href="{{ route('all.roles.permission') }}" class="nav-link">All Roles & Permission</a>
                </li>
                @endif
              </ul>
            </div>
          </li>
@endif

@if(Auth::user()->can('menu.adminstrators'))
          <li class="nav-item nav-category">Admin Management</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminPages" role="button" aria-expanded="false" aria-controls="adminPages">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Administrators</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>

            <div class="collapse" id="adminPages">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.administrators'))
                <li class="nav-item">
                  <a href="{{ route('all.admin') }}" class="nav-link">All Admins</a>
                </li>
                @endif
                @if(Auth::user()->can('add.adminstrators'))
                <li class="nav-item">
                  <a href="{{ route('add.admin') }}" class="nav-link">Add Admins</a>
                </li>

                @endif
               
              </ul>
            </div>
          </li>
          @endif

        </ul>
      </div>
    </nav>
   