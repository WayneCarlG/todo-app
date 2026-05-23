<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <a href="{{ route('todos.index') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-8 w-auto">
                    <span class="font-bold text-2xl text-gray-800 dark:text-white">Todo</span>
                </a>
            </div>

            <!-- Right Side -->
            <div class="flex items-center gap-4">
                
                <!-- Theme Toggle -->
                <button onclick="toggleTheme()" 
                        class="p-3 rounded-2xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
                    <i id="theme-icon" class="fas fa-moon text-xl text-gray-600 dark:text-gray-300"></i>
                </button>

                <!-- User Menu -->
                <div class="relative">
                    <button onclick="toggleDropdown()" 
                            class="flex items-center gap-2 py-2 px-4 rounded-2xl hover:bg-gray-100 dark:hover:bg-gray-800">
                        <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-lg py-2 border border-gray-100 dark:border-gray-700">
                        <a href="#" class="block px-6 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="w-full text-left px-6 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 text-red-600 dark:text-red-400">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Theme Toggle
    function toggleTheme() {
        document.documentElement.classList.toggle('dark');
        const isDark = document.documentElement.classList.contains('dark');
        localStorage.theme = isDark ? 'dark' : 'light';
        updateIcon();
    }

    function updateIcon() {
        const icon = document.getElementById('theme-icon');
        if (document.documentElement.classList.contains('dark')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    }

    // Dropdown
    function toggleDropdown() {
        const dropdown = document.getElementById('user-dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('user-dropdown');
        if (!e.target.closest('button')) {
            dropdown.classList.add('hidden');
        }
    });

    // Initialize
    window.addEventListener('load', () => {
        updateIcon();
    });
</script>