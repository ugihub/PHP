<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <?php if( in_groups('admin')) : ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar - Heading -->
                <div class="sidebar-heading">User Management</div>

            <!-- Nav Item - MyProfile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-users"></i>
                    <span>User List</span></a>
            </li>

            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar - Heading -->
                <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - MyProfile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - EditProfile -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-user-edit"></i>
                    <span>Edit Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout')?>">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>