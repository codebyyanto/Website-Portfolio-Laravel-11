<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Portfolio'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        .glass-effect {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(148, 163, 184, 0.1);
        }
        .sidebar-glass {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            border-right: 1px solid rgba(148, 163, 184, 0.1);
        }
        .active-menu {
            background: rgba(100, 116, 139, 0.4);
            border-left: 4px solid #64748b;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen text-slate-200">
    <!-- Mobile Menu Button -->
    <button id="menuToggle" class="md:hidden fixed top-4 left-4 z-50 bg-slate-600/90 border border-slate-500/30 text-slate-100 w-12 h-12 rounded-xl backdrop-blur-sm transition-all duration-300 hover:bg-slate-600 hover:scale-105">
        <i class="fas fa-bars text-lg"></i>
    </button>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-40 hidden"></div>

    <div class="flex min-h-screen">
        @unless(request()->is('admin*'))
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-glass w-64 fixed top-0 left-0 h-screen overflow-y-auto z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
            <div class="p-6 border-b border-slate-700/50 text-center">
                <h2 class="text-xl font-bold text-slate-100">Portfolio</h2>
                <p class="text-slate-400 text-sm mt-2">Biodata Mahasiswa</p>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#data-diri" class="menu-link flex items-center gap-4 p-4 text-slate-300 rounded-xl hover:bg-slate-600/30 hover:text-slate-100 transition-all duration-300 hover:pl-6 active-menu">
                            <i class="fas fa-user w-6 text-center text-slate-500"></i>
                            Data Diri
                        </a>
                    </li>
                    <li>
                        <a href="#riwayat-sekolah" class="menu-link flex items-center gap-4 p-4 text-slate-300 rounded-xl hover:bg-slate-600/30 hover:text-slate-100 transition-all duration-300 hover:pl-6">
                            <i class="fas fa-graduation-cap w-6 text-center text-slate-500"></i>
                            Riwayat Sekolah
                        </a>
                    </li>
                    <li>
                        <a href="#riwayat-organisasi" class="menu-link flex items-center gap-4 p-4 text-slate-300 rounded-xl hover:bg-slate-600/30 hover:text-slate-100 transition-all duration-300 hover:pl-6">
                            <i class="fas fa-users w-6 text-center text-slate-500"></i>
                            Riwayat Organisasi
                        </a>
                    </li>
                    <li>
                        <a href="#riwayat-kegiatan" class="menu-link flex items-center gap-4 p-4 text-slate-300 rounded-xl hover:bg-slate-600/30 hover:text-slate-100 transition-all duration-300 hover:pl-6">
                            <i class="fas fa-trophy w-6 text-center text-slate-500"></i>
                            Riwayat Kegiatan
                        </a>
                    </li>
                    <li>
                        <a href="#riwayat-proyek" class="menu-link flex items-center gap-4 p-4 text-slate-300 rounded-xl hover:bg-slate-600/30 hover:text-slate-100 transition-all duration-300 hover:pl-6">
                            <i class="fas fa-project-diagram w-6 text-center text-slate-500"></i>
                            Riwayat Proyek
                        </a>
                    </li>
                    <li>
                        <a href="#daftar-keahlian" class="menu-link flex items-center gap-4 p-4 text-slate-300 rounded-xl hover:bg-slate-600/30 hover:text-slate-100 transition-all duration-300 hover:pl-6">
                            <i class="fas fa-star w-6 text-center text-slate-500"></i>
                            Daftar Keahlian
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        @endunless

        <!-- Main Content -->
        <!-- Main Content -->
        <main class="flex-1 {{ request()->is('admin*') ? '' : 'md:ml-64' }} min-h-screen flex flex-col relative">
            <div class="flex-grow w-full">
                @yield('content')
            </div>
            
            <!-- Footer (Inside Main) -->
            <x-footer />
        </main>
    </div>

    <!-- Footer -->


    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const overlay = document.getElementById('overlay');
        const menuLinks = document.querySelectorAll('.menu-link');

        if (menuToggle && sidebar) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('translate-x-0');
                overlay.classList.toggle('hidden');
                
                const icon = menuToggle.querySelector('i');
                if (sidebar.classList.contains('translate-x-0')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        }

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            const icon = menuToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        });

        // Close sidebar when clicking a menu link (mobile)
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('translate-x-0');
                    overlay.classList.add('hidden');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
                
                // Update active menu
                menuLinks.forEach(l => l.classList.remove('active-menu'));
                link.classList.add('active-menu');
            });
        });

        // Smooth scrolling for navigation links
        menuLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const targetId = link.getAttribute('href');
                // Only prevent default if it's an anchor link on the same page
                if (targetId.startsWith('#')) {
                    e.preventDefault();
                    
                    const targetSection = document.querySelector(targetId);
                    
                    // Scroll to target section
                    if (targetSection) {
                        const offsetTop = targetSection.offsetTop - 20;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Update active menu on scroll
        window.addEventListener('scroll', () => {
            let current = '';
            const sections = document.querySelectorAll('section');
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                
                if (window.pageYOffset >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            menuLinks.forEach(link => {
                link.classList.remove('active-menu');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active-menu');
                }
            });
        });

        // Update current year in footer (if element exists)
        const yearElement = document.querySelector('.current-year');
        if (yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }
    </script>
</body>
</html>
