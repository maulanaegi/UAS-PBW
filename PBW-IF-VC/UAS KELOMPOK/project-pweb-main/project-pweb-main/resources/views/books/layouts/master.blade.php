<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>@yield('title', 'Laravel') | MyBooks</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <script src="{{asset("assets/js/color-modes.js")}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <style>
            :root {
                --primary-color: #4CAF50;
                --secondary-color: #45a049;
                --background-color: #f8f9fa;
                --text-color: #333;
                --card-bg: #ffffff;
                --border-color: rgba(0,0,0,.125);
            }

            [data-bs-theme="dark"] {
                --primary-color: #66bb6a;
                --secondary-color: #81c784;
                --background-color: #121212;
                --text-color: #ffffff;
                --card-bg: #1e1e1e;
                --border-color: rgba(255,255,255,.125);
            }

            body {
                background-color: var(--background-color);
                color: var(--text-color);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                transition: all 0.3s ease;
            }

            .navbar {
                background-color: var(--card-bg);
                box-shadow: 0 2px 4px rgba(0,0,0,.1);
            }

            .card {
                background-color: var(--card-bg);
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0,0,0,.1);
                transition: transform 0.3s ease;
                border-color: var(--border-color);
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .btn-success {
                background-color: var(--primary-color);
                border-color: var(--primary-color);
                border-radius: 20px;
                padding: 8px 20px;
                transition: all 0.3s ease;
            }

            .btn-success:hover {
                background-color: var(--secondary-color);
                border-color: var(--secondary-color);
                transform: translateY(-2px);
            }

            .table {
                background-color: var(--card-bg);
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0,0,0,.1);
                color: var(--text-color);
            }

            .table thead {
                background-color: var(--primary-color);
                color: white;
            }

            .table th, .table td {
                padding: 15px;
                vertical-align: middle;
                border-color: var(--border-color);
            }

            .btn-icon {
                border-radius: 50%;
                width: 35px;
                height: 35px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin: 0 5px;
                transition: all 0.3s ease;
            }

            .btn-icon:hover {
                transform: scale(1.1);
            }

            .page-header {
                background-color: var(--card-bg);
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 30px;
                box-shadow: 0 2px 4px rgba(0,0,0,.1);
            }

            .footer {
                background-color: var(--card-bg);
                padding: 20px;
                border-radius: 10px 10px 0 0;
                box-shadow: 0 -2px 4px rgba(0,0,0,.1);
                color: var(--text-color);
            }

            .theme-toggle {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1000;
                background-color: var(--primary-color);
                color: white;
                border: none;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 2px 5px rgba(0,0,0,.2);
                transition: all 0.3s ease;
            }

            .theme-toggle:hover {
                transform: scale(1.1);
            }

            .text-muted {
                color: var(--text-color) !important;
                opacity: 0.7;
            }

            /* Table interactions */
            .table-hover-highlight {
                transform: scale(1.01);
                box-shadow: 0 4px 8px rgba(0,0,0,.15);
                transition: all 0.2s ease;
            }

            .sortable {
                position: relative;
                cursor: pointer;
                user-select: none;
            }

            .sortable:hover {
                background-color: var(--primary-color);
                color: white;
            }

            .search-box {
                position: relative;
            }

            .search-box input {
                padding-right: 30px;
                border-radius: 20px;
                border: 1px solid var(--border-color);
                background-color: var(--card-bg);
                color: var(--text-color);
            }

            .search-box input:focus {
                box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
                border-color: var(--primary-color);
            }

            .btn-link {
                color: var(--primary-color);
                text-decoration: none;
            }

            .btn-link:hover {
                color: var(--secondary-color);
                text-decoration: underline;
            }

            /* Modal styling */
            .modal-content {
                background-color: var(--card-bg);
                color: var(--text-color);
            }

            .modal-header {
                border-bottom-color: var(--border-color);
            }

            .modal-header .btn-close {
                color: var(--text-color);
            }

            /* Animations */
            .fade-enter {
                opacity: 0;
            }

            .fade-enter-active {
                opacity: 1;
                transition: opacity 200ms ease-in;
            }

            .fade-exit {
                opacity: 1;
            }

            .fade-exit-active {
                opacity: 0;
                transition: opacity 200ms ease-in;
            }

            /* Loading indicator */
            .loading {
                position: relative;
            }

            .loading:after {
                content: '';
                position: absolute;
                width: 16px;
                height: 16px;
                top: 50%;
                left: 50%;
                margin-top: -8px;
                margin-left: -8px;
                border-radius: 50%;
                border: 2px solid var(--primary-color);
                border-top-color: transparent;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
    </head>
    <body>
        <div class="col-lg-10 mx-auto p-4 py-md-5">
            <div class="page-header">
                @include('books.layouts.header')
            </div>
            <main>
                @yield('content')
            </main>
            <footer class="footer mt-5">
                @include('books.layouts.footer')
            </footer>
        </div>

        <!-- Theme Toggle Button -->
        <button class="theme-toggle" id="theme-toggle" title="Toggle dark mode">
            <i class="fas fa-moon"></i>
        </button>

        <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script>
            // Dark mode toggle
            const themeToggle = document.getElementById('theme-toggle');
            const icon = themeToggle.querySelector('i');
            const html = document.documentElement;
            
            // Check for saved theme preference
            const savedTheme = localStorage.getItem('theme') || 'light';
            html.setAttribute('data-bs-theme', savedTheme);
            updateIcon(savedTheme);

            themeToggle.addEventListener('click', () => {
                const currentTheme = html.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                
                html.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcon(newTheme);
            });

            function updateIcon(theme) {
                if (theme === 'dark') {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            }

            // Delete confirmation
            $('.confirm-delete').click(function(e){
                e.preventDefault();
                var form = $(this).closest('form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });
        </script>
    </body>
</html>