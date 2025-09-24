<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Dashboard Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #f5f7fa;
        }

        .sidebar {
            width: 220px;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card h5 {
            font-weight: 600;
        }

        .card h2 {
            font-weight: bold;
        }

        .navbar input[type="search"] {
            border-radius: 20px;
            padding-left: 15px;
        }

        #menuCollapse a {
            font-size: 0.95rem;
            color: #444;
        }

        #menuCollapse a:hover {
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-end sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading text-primary fw-bold p-3">Admin</div>
            <div class="list-group list-group-flush">

                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action"><i class="fas fa-home me-2"></i>Dashboard</a>

                <a href="{{ route('order.baru') }}" class="list-group-item list-group-item-action"><i class="fas fa-cart-plus me-2"></i>Pesanan Baru</a>

                <a href="{{ route('order.rekap') }}" class="list-group-item list-group-item-action"><i class="fas fa-receipt me-2"></i>Rekap Pesanan</a>

                <!-- Dropdown Menu -->
                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#menuCollapse" role="button" aria-expanded="false"
                    aria-controls="menuCollapse">
                    <div><i class="fas fa-book me-2"></i>Menu</div>
                    <i class="fas fa-chevron-down"></i>
                </a>

                <div class="collapse ps-4" id="menuCollapse">
                    <a href="{{ route('makanan.index') }}" class=" list-group-item list-group-item-action border-0 bg-transparent"><i class="fas fa-utensils me-2"></i>Makanan</a>

                    <a href="{{ route('minuman.index') }}" class="list-group-item list-group-item-action border-0 bg-transparent"><i class="fas fa-coffee me-2"></i>Minuman</a>
                </div>

                <a href="{{ route('meja.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-chair me-2"></i>List Meja</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-university me-2"></i>List Bank</a>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="list-group-item list-group-item-action text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-light bg-white border-bottom justify-content-between px-4 py-3">
                <input class="form-control w-50" type="search" placeholder="Type to search..." aria-label="Search" />
                <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" width="40" height="40" />
                    <span class="ms-2 fw-bold">Admin Kasir</span>
                </div>
            </nav>

            <div class="container-fluid px-4 py-4">
                @yield('content')
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <!-- JSZip (wajib untuk Excel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- pdfmake (wajib untuk PDF) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
</body>

</html>