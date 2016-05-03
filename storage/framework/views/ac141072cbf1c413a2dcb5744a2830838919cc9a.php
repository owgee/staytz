<ul id="menu" class="page-sidebar-menu">
    <li <?php echo (Request::is('admin') ? 'class="active"' : ''); ?>>
        <a href="<?php echo e(route('dashboard')); ?>">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

     <!-- MINE-->
    <li <?php echo (Request::is('admin/listings/*') ? 'class="active"' : ''); ?>>
        <a href="#">
            <i class="livicon" data-name="list-ul" data-color="#f6bb42" data-hc="#f6bb42" data-size="18" data-loop="true"></i>
            <span class="title">Listings</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php echo (Request::is('admin/listings/all') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/listings/all')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    All
                </a>
            </li>
            <li <?php echo (Request::is('admin/listings/hotels') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/listings/hotels')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Hotels and Lodges
                </a>
            </li>
            <li <?php echo (Request::is('admin/listings/guesthouses') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/listings/guesthouses')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Guest Houses
                </a>
            </li>
            <li <?php echo (Request::is('admin/listings/conferencehalls') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/listings/conferencehalls')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Conference halls
                </a>
            </li>
            <li <?php echo (Request::is('admin/listings/apartments') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/listings/apartments')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Apartments
                </a>
            </li>
        </ul>
    </li>

    <li <?php echo (Request::is('admin/places/*') ? 'class="active"' : ''); ?>>
        <a href="#">
            <i class="livicon" data-name="flag" data-c="#e9573f" data-hc="#e9573f" data-size="18"
               data-loop="true"></i>
            <span class="title">Places</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php echo (Request::is('admin/listings/all') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/places/')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Regions
                </a>
            </li>
        </ul>
    </li>

   
    <li <?php echo (Request::is('admin/notifications/*') || Request::is('admin/notifications') ? 'class="active"' : ''); ?>>
        <a href="#">
            <i class="livicon" data-name="mail" data-size="18" data-c="#67C5DF" data-hc="#67C5DF"
               data-loop="true"></i>
            <span class="title">Push notifications</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php echo (Request::is('admin/notifications/create') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/notifications/create')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    New
                </a>
            </li>
            <li <?php echo (Request::is('admin/notifications') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/notifications')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    All notifications
                </a>
            </li>
        </ul>
    </li>

    <li <?php echo (Request::is('admin/bookings') ? 'class="active"' : ''); ?>>
        <a href="#">
            <i class="livicon" data-name="notebook" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-113"></i>
            <span class="title">Bookings</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php echo (Request::is('admin/bookings') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/bookings/')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    View bookings
                </a>
            </li>
        </ul>
    </li>

    <li <?php echo (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : ''); ?>>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php echo (Request::is('admin/users') ? 'class="active" id="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/users')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li <?php echo (Request::is('admin/users/create') ? 'class="active" id="active"' : ''); ?>>
                <a href="<?php echo e(URL::to('admin/users/create')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li>
            <li <?php echo ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : ''); ?>>
                <a href="<?php echo e(URL::route('users.show',Sentinel::getUser()->id)); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li>
            <li <?php echo (Request::is('admin/deleted_users') ? 'class="hidden" id="activex"' : 'class="hidden"'); ?>>
                <a href="<?php echo e(URL::to('admin/deleted_users')); ?>">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li>
        </ul>
    </li>

    <!-- Menus generated by CRUD generator -->
    <!-- include('admin/layouts/menu') -->
</ul>