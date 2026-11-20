<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel - Elegance Salon')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <aside class="admin-sidebar">

            <div class="admin-brand">
                <h2>Elegance</h2>
                <span>ADMIN PANEL</span>
            </div>

            <nav class="admin-nav">

                <p class="nav-heading">MAIN MENU</p>

                <a href="{{ route('admin.dashboard') }}"
   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
    <i class="fas fa-th-large"></i>
    <span>Dashboard</span>
</a>

                <p class="nav-heading">MANAGEMENT</p>

                <a href="{{ route('admin.staff.index') }}"
                   class="{{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                     <i class="fas fa-users"></i>
                  <span>Staff Management</span>
                    </a>          

               <a href="{{ route('admin.customers.index') }}"
                   class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                   <i class="fas fa-user-friends"></i>
               <span>Customers</span>
                    </a>

                <a href="{{ route('admin.appointments.index') }}"
                  class="{{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i>
                 <span>Appointments</span>
                </a>


                   <a href="{{ route('admin.services.index') }}"
                   class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                       <i class="fas fa-spa"></i>
                      <span>Services Management</span>
                        </a>


                

                <a href="{{ route('admin.inventory.index') }}"
   class="{{ request()->routeIs('admin.inventory.index', 'admin.inventory.create', 'admin.inventory.edit', 'admin.inventory.store', 'admin.inventory.update') ? 'active' : '' }}">
    <i class="fas fa-box-open"></i>
    <span>Inventory Management</span>
</a>

<a href="{{ route('admin.inventory.transactions.index') }}"
   class="{{ request()->routeIs('admin.inventory.transactions.*') ? 'active' : '' }}">
    <i class="fas fa-exchange-alt"></i>
    <span>Stock Transactions</span>
</a>

<a href="{{ route('admin.suppliers.index') }}"
   class="{{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}">
    <i class="fas fa-truck"></i>
    <span>Supplier Management</span>
</a>


                <a href="{{ route('admin.reviews.index') }}"
   class="{{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
    <i class="fas fa-comments"></i>
    <span>Customer Feedback</span>
</a>

               

            </nav>

            <div class="admin-sidebar-bottom">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="admin-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

        </aside>


        <!-- MAIN AREA -->
        <div class="admin-main">

            <!-- TOP HEADER -->
            <header class="admin-topbar">

                <div class="admin-page-info">
                    <h3>@yield('page-heading', 'Dashboard')</h3>
                    <p>Welcome to Elegance Salon Management</p>
                </div>

                <div class="admin-user">
                    <div class="admin-user-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div>
                        <strong>{{ Auth::user()->name }}</strong>
                        <span>Administrator</span>
                    </div>
                </div>

            </header>


            <!-- PAGE CONTENT -->
            <main class="admin-content">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </main>

        </div>

    </div>

</body>
</html>