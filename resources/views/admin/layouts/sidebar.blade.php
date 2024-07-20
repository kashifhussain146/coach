 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="{!! Auth::guard('admin')->user()->getRoleNames()[0] !!} Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">
             @if (Auth::guard('admin')->user())
                 {!! Auth::guard('admin')->user()->getRoleNames()[0] !!} Panel
             @endif
         </span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->


         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                 @can('Home Page Module')
                     <li
                         class="nav-item {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'faq-banner' ? 'menu-open' : '' }} {{ in_array(\Request::route()->getName(), [
                             'category-create',
                             'category-list',
                             'questions-list',
                             'questions-create',
                             'subject-category-create',
                             'subject-category-list',
                         ])
                             ? ' menu-open'
                             : '' }}">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Home Page
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview ">

                             @can('Service Management Module')
                                 <li
                                     class="nav-item {{ in_array(\Request::route()->getName(), ['category-create', 'category-list']) ? ' menu-open' : '' }}">
                                     <a href="#"
                                         class="nav-link  {{ in_array(\Request::route()->getName(), ['category-create', 'category-list']) ? 'active' : '' }}">
                                         <p>
                                             Service Management
                                             <i class="fas fa-angle-left right"></i>
                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Add Service')
                                             <li class="nav-item">
                                                 <a href="{{ route('category-create') }}"
                                                     class="nav-link {{ in_array(\Request::route()->getName(), ['category-create']) ? 'active' : '' }}">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Service</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('List Service')
                                             <li class="nav-item">
                                                 <a href="{{ route('category-list') }}"
                                                     class="nav-link {{ in_array(\Request::route()->getName(), ['category-list']) ? 'active' : '' }}">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Service</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>

                                 </li>
                             @endcan


                             @can('Module_Master_slider')
                                 <li
                                     class="nav-item {{ in_array(\Request::route()->getName(), ['admin.modules.data.add', 'admin.modules.data']) ? ' menu-open' : '' }}">
                                     <a href="#"
                                         class="nav-link 
                           {{ \Request::route()->named('admin.modules.data.add') && \Request::route()->parameter('module') == 'faqs' ? 'active' : '' }}
                           {{ \Request::route()->named('admin.modules.data') && \Request::route()->parameter('module') == 'faqs' ? 'active' : '' }}
                         ">

                                         <p>
                                             Banner Management
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_slider')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'slider']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Banner</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_slider')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'slider']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Banner</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>

                                 </li>
                             @endcan



                             @can('Module_Master_choose-us')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Why Choose Us
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">

                                         @can('Module_Add_choose-us')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'choose-us']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Choose</p>
                                                 </a>
                                             </li>
                                         @endcan
                                         @can('Module_List_choose-us')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'choose-us']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Choose</p>
                                                 </a>
                                             </li>
                                         @endcan

                                     </ul>
                                 </li>
                             @endcan


                             @can('Module_Master_home-page-faqs')
                                 <li class="nav-item {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'faq-banner' ? 'menu-open' : '' }}">
                                     <a href="#" class="nav-link {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'faq-banner' ? 'active' : '' }}">

                                         <p>
                                             Faq
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">

                                         @can('Module_Add_home-page-faqs')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'home-page-faqs']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Faq</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_home-page-faqs')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'home-page-faqs']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Faq</p>
                                                 </a>
                                             </li>

                                             <li class="nav-item">
                                                 <a href="{{ route('admin.widgets_data', ['page' => 'faq-banner']) }}"
                                                     class="nav-link {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'faq-banner' ? 'active' : '' }}">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Faq Banner</p>
                                                 </a>
                                             </li>
                                             
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                         </ul>
                     </li>
                 @endcan

                 @can('Assignment Management Module')
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Assignment Management
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>

                         <ul class="nav nav-treeview">


                             @can('Module_Master_how-work')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             How we Work
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_how-work')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'how-work']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Work</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_how-work')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'how-work']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Work</p>
                                                 </a>
                                             </li>
                                         @endcan

                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_assignment-categories')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Category
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_assignment-categories')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'assignment-categories']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Category</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_assignment-categories')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'assignment-categories']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Category</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan


                             @can('Module_Master_experts')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Experts
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_experts')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'experts']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Experts</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_experts')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'experts']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Experts</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan


                             @can('Module_Master_services')

                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Services
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_services')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'services']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Services</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_services')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'services']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Services</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>

                             @endcan

                             @can('Module_Master_portfolio')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Portfolio
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_portfolio')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'portfolio']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Portfolio</p>
                                                 </a>
                                             </li>
                                         @endcan
                                         @can('Module_List_portfolio')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'portfolio']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Portfolio</p>
                                                 </a>
                                             </li>
                                         @endcan

                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_collegess')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Colleges
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_collegess')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'collegess']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Colleges</p>
                                                 </a>
                                             </li>
                                         @endcan
                                         @can('Module_List_collegess')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'collegess']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Colleges</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan



                             @can('Module_Master_subjects')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Subjects
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_subjects')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'subjects']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Subjects</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_subjects')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'subjects']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Subjects</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan


                             @can('Module_Master_testimonials')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Testimonials
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_testimonials')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'testimonials']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Testimonials</p>
                                                 </a>
                                             </li>
                                         @endcan
                                         @can('Module_List_testimonials')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'testimonials']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Testimonials</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_help-faqs')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Faq
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_help-faqs')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'help-faqs']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Faq</p>
                                                 </a>
                                             </li>
                                         @endcan
                                         @can('Module_List_help-faqs')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'help-faqs']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Faq</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_assignment-faqs')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Assignment Page Faq
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_assignment-faqs')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'assignment-faqs']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Faq</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_assignment-faqs')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'assignment-faqs']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Faq</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_assignment-testimonials')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Assignment Page Testimonials
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_assignment-testimonials')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'assignment-testimonials']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Faq</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_assignment-testimonials')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'assignment-testimonials']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Faq</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_assignment')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Assignment
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_assignment')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'assignment']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Assignment</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_assignment')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'assignment']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Assignment</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan
                         </ul>


                     </li>
                 @endcan


                 @can('Solution Library Module')
                     <li
                         class="nav-item {{ in_array(\Request::route()->getName(), ['colleges-list', 'colleges-create', 'colleges-edit', 'subject-create', 'subject-list', 'questions-list', 'questions-create', 'subject-category-create', 'subject-category-list']) ? ' menu-open' : '' }}">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Solution Library
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>

                         <ul class="nav nav-treeview">
                             @can('Category Master Module')
                                 <li class="nav-item">
                                     <a href="#"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['subject-category-create', 'subject-category-list']) ? ' active' : '' }}">

                                         <p>
                                             Category
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview ">
                                         @can('Add Category')
                                             <li class="nav-item">
                                                 <a href="{{ route('subject-category-create') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Category</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('List Category')
                                             <li class="nav-item">
                                                 <a href="{{ route('subject-category-list') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Category</p>
                                                 </a>
                                             </li>
                                         @endcan

                                     </ul>
                                 </li>
                             @endcan


                             @can('Subjects Master Module')
                                 <li class="nav-item">
                                     <a href="#"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['subject-create', 'subject-list']) ? ' active' : '' }}">
                                         <p>
                                             Subjects
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul
                                         class="nav nav-treeview {{ in_array(\Request::route()->getName(), ['subject-create', 'subject-list']) ? ' menu-open' : '' }}">
                                         @can('Add Subjects')
                                             <li class="nav-item ">
                                                 <a href="{{ route('subject-create') }}" class="nav-link ">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Subjects</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('List Subjects')
                                             <li
                                                 class="nav-item {{ in_array(\Request::route()->getName(), ['subject-list']) ? ' active' : '' }}">
                                                 <a href="{{ route('subject-list') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Subjects</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_library')
                                 <li class="nav-item  ">
                                     <a href="#" class="nav-link  ">

                                         <p>
                                             College
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul
                                         class="nav nav-treeview {{ in_array(\Request::route()->getName(), ['colleges-list']) ? 'menu-open' : '' }}">
                                         @can('Module_Add_library')
                                             <li class="nav-item ">
                                                 <a href="{{ route('colleges-list') }}"
                                                     class="nav-link {{ in_array(\Request::route()->getName(), ['colleges-list']) ? 'active' : '' }}">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List College</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_library')
                                             <li class="nav-item">
                                                 <a href="{{ route('colleges-create') }}"
                                                     class="nav-link   {{ in_array(\Request::route()->getName(), ['colleges-create']) ? 'active' : '' }}">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add College</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_course-code')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <p>
                                             Course Code
                                             <i class="fas fa-angle-left right"></i>
                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_course-code')
                                             <li class="nav-item">
                                                 <a href="{{ route('course-code-create') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Code</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_course-code')
                                             <li class="nav-item">
                                                 <a href="{{ route('course-code-list') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Code</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module Questions Master')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <p>Questions<i class="fas fa-angle-left right"></i></p>
                                     </a>

                                     <ul
                                         class="nav nav-treeview {{ in_array(\Request::route()->getName(), ['questions-create', 'questions-list']) ? ' menu-open' : '' }}">
                                         @can('Module Add Questions')
                                             <li class="nav-item">
                                                 <a href="{{ route('questions-create') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Questions</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module List Questions')
                                             <li class="nav-item">
                                                 <a href="{{ route('questions-list') }}" class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Questions</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                         </ul>


                     </li>
                 @endcan
                 <!--- Take my online class Module-->

                 @can('Online Class Module')
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Online Class Management
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>

                         <ul class="nav nav-treeview">
                             @php
                                 $check = \App\Models\ModulesData::where('module_id', 29)->first();
                                 if (!$check) {
                                     $route = route('admin.modules.data.add', 'online-class');
                                 } else {
                                     $route = route('admin.modules.data.edit', [
                                         'module' => 'online-class',
                                         'id' => $check->id,
                                     ]);
                                 }
                             @endphp

                             @can('Module_Master_works')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Work Master
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_works')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'works']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Work</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_works')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'works']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Work</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan


                             @can('Module_Master_help-service')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Services Master
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_help-service')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'help-service']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Services</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_help-service')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'help-service']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Services</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_take-my-online-Faq')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Faq Master
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_take-my-online-Faq')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'take-my-online-Faq']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Faq</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_take-my-online-Faq')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'take-my-online-Faq']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Faq</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan

                             @can('Module_Master_help-my-online-testimonials')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Testimonials Master
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_help-my-online-testimonials')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'help-my-online-testimonials']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Testimonials</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_help-my-online-testimonials')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'help-my-online-testimonials']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Testimonials</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan



                             @can('Module_Master_online-colleges')
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">

                                         <p>
                                             Colleges Master
                                             <i class="fas fa-angle-left right"></i>

                                         </p>
                                     </a>
                                     <ul class="nav nav-treeview">
                                         @can('Module_Add_online-colleges')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data.add', ['module' => 'online-colleges']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>Add Colleges</p>
                                                 </a>
                                             </li>
                                         @endcan

                                         @can('Module_List_online-colleges')
                                             <li class="nav-item">
                                                 <a href="{{ route('admin.modules.data', ['module' => 'online-colleges']) }}"
                                                     class="nav-link">
                                                     <i class="far fa-circle nav-icon"></i>
                                                     <p>List Colleges</p>
                                                 </a>
                                             </li>
                                         @endcan
                                     </ul>
                                 </li>
                             @endcan


                             @can('Module_Master_online-class')
                                 @can('Module_Edit_online-class')
                                     <li class="nav-item">
                                         <a href="{{ $route }}" class="nav-link">

                                             <p>
                                                 Manage Online Classe Page
                                                 <i class="fas fa-angle-left right"></i>

                                             </p>
                                         </a>
                                     </li>
                                 @endcan
                             @endcan

                         </ul>

                     </li>
                 @endcan



                 @can('Users Masters Module')
                     <li
                         class="nav-item {{ in_array(\Request::route()->getName(), ['user-list', 'user-create', 'user-edit']) ? ' menu-open' : '' }}">
                         <a href="#" class="nav-link ">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Users Management
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             @can('Add Users')
                                 <li class="nav-item">
                                     <a href="{{ route('user-list') }}"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['user-list']) ? ' active ' : '' }}">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>User List</p>
                                     </a>
                                 </li>
                             @endcan

                             @can('List Users')
                                 <li class="nav-item">
                                     <a href="{{ route('user-create') }}"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['user-edit', 'user-create']) ? ' active ' : '' }}">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Add Users</p>
                                     </a>
                                 </li>
                             @endcan

                         </ul>
                     </li>
                 @endcan


                 @if (Auth()->guard('admin')->user()->hasRole('Admin'))
                     <li
                         class="nav-item {{ in_array(\Request::route()->getName(), ['roles-list', 'roles-create', 'roles-edit']) ? ' menu-open' : '' }}">
                         <a href="#" class="nav-link ">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Roles Management
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">

                             <li class="nav-item">
                                 <a href="{{ route('roles-list') }}"
                                     class="nav-link {{ in_array(\Request::route()->getName(), ['roles-list']) ? ' active ' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Roles List</p>
                                 </a>
                             </li>

                             <li class="nav-item">
                                 <a href="{{ route('roles-create') }}"
                                     class="nav-link {{ in_array(\Request::route()->getName(), ['roles-edit', 'roles-create']) ? ' active ' : '' }}">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Add Roles</p>
                                 </a>
                             </li>

                         </ul>
                     </li>
                 @endif


                 @can('FAQs Module')
                     <li
                         class="nav-item 
                   {{ \Request::route()->named('admin.modules.data.add') && \Request::route()->parameter('module') == 'faqs' ? 'menu-open' : '' }}
                   {{ \Request::route()->named('admin.modules.data') && \Request::route()->parameter('module') == 'faqs' ? 'menu-open' : '' }}
                ">
                         <a href="#"
                             class="nav-link 
                   
                   {{ \Request::route()->named('admin.modules.data.add') && \Request::route()->parameter('module') == 'faqs' ? 'active' : '' }}
                   {{ \Request::route()->named('admin.modules.data') && \Request::route()->parameter('module') == 'faqs' ? 'active' : '' }}
                   ">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Faq
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             @can('Module_Add_faqs')
                                 <li class="nav-item">
                                     <a href="{{ route('admin.modules.data.add', ['module' => 'faqs']) }}"
                                         class="nav-link 
                               {{ \Request::route()->named('admin.modules.data.add') && \Request::route()->parameter('module') == 'faqs' ? 'active' : '' }}
                               ">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Add Faq</p>
                                     </a>
                                 </li>
                             @endcan

                             @can('Module_List_faqs')
                                 <li class="nav-item">
                                     <a href="{{ route('admin.modules.data', ['module' => 'faqs']) }}"
                                         class="nav-link
                               {{ \Request::route()->named('admin.modules.data') && \Request::route()->parameter('module') == 'faqs' ? 'active' : '' }}
                               ">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>List Faq</p>
                                     </a>
                                 </li>
                             @endcan
                         </ul>
                     </li>
                 @endcan




                 @can('Blogs Management Module')
                     <li
                         class="nav-item
               
               {{ \Request::route()->named('admin.modules.data.add') && \Request::route()->parameter('module') == 'blogs' ? 'menu-open' : '' }}
               {{ \Request::route()->named('admin.modules.data') && \Request::route()->parameter('module') == 'blogs' ? 'menu-open' : '' }}
                   
               ">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Blogs
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             @can('Module_Add_blogs')
                                 <li class="nav-item">
                                     <a href="{{ route('admin.modules.data.add', ['module' => 'blogs']) }}" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Add Blogs</p>
                                     </a>
                                 </li>
                             @endcan

                             @can('Module_List_blogs')
                                 <li class="nav-item">
                                     <a href="{{ route('admin.modules.data', ['module' => 'blogs']) }}" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>List Blogs</p>
                                     </a>
                                 </li>
                             @endcan
                         </ul>
                     </li>
                 @endcan

                 @can('Tasks Management')
                     <li
                         class="nav-item {{ in_array(\Request::route()->getName(), ['tasks-create', 'tasks-list', 'tasks-edit']) ? ' menu-open' : '' }}">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Tasks
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             @can('Add Tasks')
                                 <li class="nav-item  ">
                                     <a href="{{ route('tasks-create') }}"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['tasks-create', 'tasks-edit']) ? ' active' : '' }}">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Add Tasks</p>
                                     </a>
                                 </li>
                             @endcan

                             @can('List Tasks')
                                 <li class="nav-item  ">
                                     <a href="{{ route('tasks-list') }}"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['tasks-list']) ? ' active' : '' }}">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>List Tasks</p>
                                     </a>
                                 </li>
                             @endcan


                             {{-- @can('Module_List_master')
                                 <li class="nav-item  ">
                                     <a href="{{ route('masters-list') }}" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Master List</p>
                                     </a>
                                 </li>
                             @endcan --}}

                         </ul>
                     </li>
                 @endcan


                 @can('Tasks Management')
                     <li
                         class="nav-item {{ in_array(\Request::route()->getName(), ['masters-list']) ? ' menu-open' : '' }}">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Master
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">

                             @can('Module_List_master')
                                 <li class="nav-item  ">
                                     <a href="{{ route('masters-list') }}"
                                         class="nav-link {{ in_array(\Request::route()->getName(), ['masters-list']) ? ' active' : '' }}">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>List</p>
                                     </a>
                                 </li>
                             @endcan

                         </ul>
                     </li>

                 @endcan



                 @can('Settings')

                     @can('Home Page Settings')
                         <li class="nav-item">
                             <a href="{{ route('admin.widgets_data', ['page' => 'home-page-content']) }}"
                                 class="nav-link {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'home-page-content' ? 'active' : '' }} ">
                                 <i class="nav-icon fas fa-circle"></i>
                                 <p>
                                     Home page settings
                                 </p>
                             </a>

                         </li>
                     @endcan

                     @can('Terms & Conditions')
                         <li class="nav-item">
                             <a href="{{ route('admin.widgets_data', ['page' => 'terms-conditions']) }}"
                                 class="nav-link
                               {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'terms-conditions' ? 'active' : '' }}
                               ">
                                 <i class="nav-icon fas fa-circle"></i>
                                 <p>
                                     Terms Conditions
                                 </p>
                             </a>

                         </li>
                     @endcan

                     @can('Privacy Policy')
                         <li class="nav-item">
                             <a href="{{ route('admin.widgets_data', ['page' => 'privacy-policy']) }}"
                                 class="nav-link
                               {{ \Request::route()->named('admin.widgets_data') && \Request::route()->parameter('page') == 'privacy-policy' ? 'active' : '' }}
                               ">
                                 <i class="nav-icon fas fa-circle"></i>
                                 <p>
                                     Privacy Policy
                                 </p>
                             </a>

                         </li>
                     @endcan
                     <li class="nav-item">
                         <a href="{{ route('about-us.edit') }}" class="nav-link
                               ">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 About Us
                             </p>
                         </a>

                     </li>

                     <li class="nav-item">
                         <a href="{{ route('admin.get-a-quote.edit') }}"
                             class="nav-link
                               ">
                             <i class="nav-icon fas fa-circle"></i>
                             <p>
                                 Get A Quote
                             </p>
                         </a>

                     </li>

                 @endcan

             </ul>
         </nav>

         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
