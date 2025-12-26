<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Logbook | Pemerintah Daerah X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body>
    <nav class="bg-blue-600 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <span class="text-xl font-bold tracking-tight">PEMDA X</span>
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition">Dashboard</a>
                        <a href="{{ route('log.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition">Log Harian</a>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs text-blue-100 leading-none">Selamat Datang,</p>
                        <p class="text-sm font-semibold uppercase">Kepala Dinas</p>
                    </div>
                    <img class="h-10 w-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=Kepala+Dinas&background=fff&color=2563eb" alt="Avatar">
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm rounded-r-lg">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="text-center py-6 text-slate-400 text-sm">
        Pemerintah Daerah X &copy; 2026 | Developed by Novelita Fatma Anjany for Magang Programmer **PT. Tatacipta Teknologi Indonesia**
    </footer>
</body>
</html>
