 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('home') }}" class="brand-link" style="background-color: #5D5F61">
         <img src="{{ asset('assets/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-text">
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-header">MAIN NAVIGATION </li>

                 <li class="nav-item">
                     <a href="{{ route('home') }}" class="nav-link "><i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('documents.index') }}"
                         class="nav-link {{ Route::is('documents.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-list"></i>
                         <p>
                             Document List
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('invoices.index') }}"
                         class="nav-link {{ Route::is('invoices.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-list"></i>
                         <p>
                             Invoice List
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('shippings.index') }}"
                         class="nav-link {{ Route::is('shippings.index') ? 'active' : '' }}">

                         <i class="nav-icon fas fa-list"></i>
                         <p>Shipping List</p>
                     </a>
                 </li>

                 <li class="nav-header">TRANSACTION</li>
                 <li class="nav-item {{ Route::is('documents.create') ? 'menu-open' : '' }}">
                     <a href="#" class="nav-link  {{ Route::is('documents.create') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-folder-open"></i>
                         <p>
                             Documents Detail
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('documents.create') }}"
                                 class="nav-link {{ Route::is('documents.create') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Documents</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item {{ Route::is('invoices.create') ? 'menu-open' : '' }}">
                     <a href="#" class="nav-link  {{ Route::is('invoices.create') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-file-invoice"></i>
                         <p>
                             Invoice Detail
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('invoices.create') }}"
                                 class="nav-link {{ Route::is('invoices.create') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Invoice</p>
                             </a>
                         </li>

                     </ul>
                 </li>

                 <li class="nav-item {{ Route::is('shippings.create') ? 'menu-open' : '' }}">
                     <a href="#" class="nav-link  {{ Route::is('shippings.create') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-file"></i>
                         <p>
                             Shipping Detail
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('shippings.create') }}"
                                 class="nav-link {{ Route::is('shippings.create') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Shipping</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 {{-- <li class="nav-header">REPORT</li>
                 <li class="nav-item">
                     <a href="{{ route('report.index') }}"
                         class="nav-link {{ Route::is('report.*') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-file-invoice"></i>
                         <p>Sales Report</p>
                     </a>
                 </li> --}}

                 @if (Auth::user()->role_id == 1)
                     <li class="nav-header">USER MANAGEMENT</li>
                     <li class="nav-item ">
                         <a href="{{ route('users.index') }}"
                             class="nav-link {{ Route::is('users.*') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-users "></i>
                             <p>User List</p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('roles.index') }}"
                             class="nav-link {{ Route::is('roles.*') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-user-tag "></i>
                             <p>Input Role</p>
                         </a>
                     </li>
                     <li class="nav-header">CONTAINER MANAGEMENT</li>
                     <li class="nav-item ">
                         <a href="{{ route('tipecontainers.index') }}"
                             class="nav-link {{ Route::is('tipecontainers.*') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-square "></i>
                             <p>Container List</p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('tipecontainers.create') }}"
                             class="nav-link {{ Route::is('tipecontainers.create') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-square "></i>
                             <p>Input Container</p>
                         </a>
                     </li>
                 @endif
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
