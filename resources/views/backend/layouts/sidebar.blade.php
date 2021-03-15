 @php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav style="" class="mt-2">
        <ul style="" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                User Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                </a>
              </li>
            </ul>
          </li> 
          <!-- Roles -->

          <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Profile Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

               <!-- student -->
          <li class="nav-item has-treeview {{($prefix=='/setups')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Students Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.view')}}" class="nav-link {{($route=='students.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student View</p> 
                </a>
              </li>
              </ul>
            </li>

           <!-- Setup -->
          <li class="nav-item has-treeview {{($prefix=='/setups')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Setups Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setups.class-view')}}" class="nav-link {{($route=='setups.class-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class</p> 
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('setups.group-view')}}" class="nav-link {{($route=='setups.group-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Group</p> 
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('setups.section-view')}}" class="nav-link {{($route=='setups.section-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Section</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('setups.session-view')}}" class="nav-link {{($route=='setups.session-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Session Year</p> 
                </a>
              </li>
           </ul>
          </li> 

          <!-- Book Manange -->
          <li class="nav-item has-treeview {{($prefix=='/books')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Book Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('books.category-view')}}" class="nav-link {{($route=='books.category-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book Category</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('books.book-view')}}" class="nav-link {{($route=='books.book-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Book</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('books.book-add')}}" class="nav-link {{($route=='books.book-add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Book</p> 
                </a>
              </li>
            </ul>
          </li> 

          <!-- Book Issue -->
          <li class="nav-item has-treeview {{($prefix=='/issuebooks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Book Issue
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('issuebooks.issue-add')}}" class="nav-link {{($route=='issuebooks.issue-add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue Book</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('issuebooks.issue-view')}}" class="nav-link {{($route=='issuebooks.issue-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue Book View</p> 
                </a>
              </li>
            </ul>

              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('issuebooks.pending-list')}}" class="nav-link {{($route=='issuebooks.pending-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue  Pending List</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('issuebooks.returne-book-list')}}" class="nav-link {{($route=='issuebooks.returne-book-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Return Book List</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('issuebooks.date-over')}}" class="nav-link {{($route=='issuebooks.date-over')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Limit Date Over</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('issuebooks.date-over-return')}}" class="nav-link {{($route=='issuebooks.date-over-return')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Return Date Over</p> 
                </a>
              </li>
            </ul>
          </li> 


           <li class="nav-item has-treeview {{($prefix=='/searches')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Issue Book Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('searches.search-view')}}" class="nav-link {{($route=='searches.search-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Librarian & Student</p> 
                </a>
              </li>
              </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('searches.date-search-view')}}" class="nav-link {{($route=='searches.date-search-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date By Search</p> 
                </a>
              </li>
              </ul>
            </li>


           


       

