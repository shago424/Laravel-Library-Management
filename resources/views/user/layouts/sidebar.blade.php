 @php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul style="" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      
       
          <!-- Roles -->
          <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/stprofiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stprofiles.profile-view')}}" class="nav-link {{($route=='stprofiles.profile-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p> 
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stprofiles.profile-edit')}}" class="nav-link {{($route=='stprofiles.profile-edit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stprofiles.password-change')}}" class="nav-link {{($route=='stprofiles.password-change')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

           <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/students')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Issue Book
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.allbook-issue-view')}}" class="nav-link {{($route=='students.allbook-issue-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue Book View</p> 
                </a>
              </li>
            </ul>

             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.allbook-issue-add')}}" class="nav-link {{($route=='students.allbook-issue-add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Issue Book </p> 
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/showbooks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Show All Book
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('showbooks.show-book-view')}}" class="nav-link {{($route=='showbooks.show-book-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Book</p> 
                </a>
              </li>
            </ul>
          </li>
         

     
      <!-- /.sidebar-menu -->
      