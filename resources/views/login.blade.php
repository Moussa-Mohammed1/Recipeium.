<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Recipeium - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f48c25",
                        "primary-hover": "#d67618",
                        "background-light": "#f8f7f5",
                        "background-dark": "#221910",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2a221b",
                        "text-main": "#181411",
                        "text-secondary": "#8a7560",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-10px);
            }
        }

        .fade-in {
            animation: fadeIn 0.4s ease-in-out forwards;
        }

        .fade-out {
            animation: fadeOut 0.3s ease-in-out forwards;
        }

        .form-hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-main dark:text-white transition-colors duration-200 overflow-hidden">
    <div class="h-screen w-full relative flex items-center justify-center overflow-hidden bg-cover bg-center p-6 sm:p-8 md:p-12"
        style="background-image: url('https://images.unsplash.com/photo-1617228069096-4638a7ffc906?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
        <div
            class="relative w-full max-w-[520px] p-6 sm:p-8 bg-surface-light dark:bg-surface-dark rounded-2xl shadow-2xl flex flex-col gap-5">
            <div class="flex flex-col gap-1 items-center text-center">
                <div class="flex items-center gap-2 mb-1 text-primary">
                    <span class="material-symbols-outlined !text-3xl">skillet</span>
                    <span class="font-black text-xl tracking-tight text-text-main dark:text-white">Recipeium</span>
                </div>
                <h2 id="welcome-title" class="text-text-main dark:text-white text-2xl font-bold leading-tight tracking-tight">Welcome Back
                </h2>
                <p id="welcome-subtitle" class="text-text-secondary text-sm">Discover new flavors or share your secret ingredients.</p>
            </div>
            <div class="w-full">
                <div class="flex border-b border-[#e6e0db] dark:border-gray-700 gap-8 justify-center">
                    <button id="login-tab" onclick="openLogin();"
                        class="flex flex-col items-center justify-center border-b-[3px] border-primary pb-3 px-4 transition-colors">
                        <span class="text-primary text-sm font-bold leading-normal tracking-[0.015em]">Login</span>
                    </button>
                    <button id="signup-tab" onclick="openSignup();"
                        class="flex flex-col items-center justify-center border-b-[3px] border-transparent hover:border-gray-300 dark:hover:border-gray-600 pb-3 px-4 transition-colors">
                        <span
                            class="text-text-secondary hover:text-text-main dark:text-gray-400 dark:hover:text-gray-200 text-sm font-bold leading-normal tracking-[0.015em]">Sign
                            Up</span>
                    </button>
                </div>
            </div>
            
            <!-- Login Form -->
            <form id="login-form" class="flex flex-col gap-4 fade-in" action="/login" method="POST">
                @csrf
                <label class="flex flex-col w-full">
                    <span class="text-text-main dark:text-gray-200 text-sm font-bold leading-normal pb-2">Email
                        Address</span>
                    <div class="relative">
                        <input
                            name="email"
                            class="form-input flex w-full rounded-lg text-text-main dark:text-white border border-[#e6e0db] dark:border-gray-700 bg-surface-light dark:bg-background-dark focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 placeholder:text-text-secondary dark:placeholder:text-gray-500 text-base transition-colors"
                            placeholder="chef@example.com" type="email" required />
                        <div
                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary dark:text-gray-500">
                            <span class="material-symbols-outlined text-xl">mail</span>
                        </div>
                    </div>
                </label>
                <label class="flex flex-col w-full">
                    <div class="flex justify-between items-center pb-2">
                        <span class="text-text-main dark:text-gray-200 text-sm font-bold leading-normal">Password</span>
                        <a class="text-primary text-sm font-bold hover:underline" href="#">Forgot?</a>
                    </div>
                    <div class="relative flex w-full">
                        <input
                            name="password"
                            class="form-input flex w-full rounded-lg text-text-main dark:text-white border border-[#e6e0db] dark:border-gray-700 bg-surface-light dark:bg-background-dark focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 placeholder:text-text-secondary dark:placeholder:text-gray-500 text-base transition-colors pr-10"
                            placeholder="Enter your password" type="password" />
                        <button
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-text-secondary hover:text-text-main dark:text-gray-500 dark:hover:text-gray-300"
                            type="button">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </button>
                    </div>
                </label>
                <button
                    class="w-full flex items-center justify-center gap-2 rounded-lg h-12 px-5 bg-primary hover:bg-primary-hover text-white text-base font-bold transition-colors shadow-sm mt-2"
                    type="submit">
                    <span>Enter Kitchen</span>
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </button>
            </form>

            <!-- Sign Up Form -->
            <form id="signup-form" class="flex flex-col gap-4 hidden" action="/register" method="POST">
                @csrf
                <label class="flex flex-col w-full">
                    <span class="text-text-main dark:text-gray-200 text-sm font-bold leading-normal pb-2">Full Name</span>
                    <div class="relative">
                        <input
                            name="name"
                            class="form-input flex w-full rounded-lg text-text-main dark:text-white border border-[#e6e0db] dark:border-gray-700 bg-surface-light dark:bg-background-dark focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 placeholder:text-text-secondary dark:placeholder:text-gray-500 text-base transition-colors"
                            placeholder="Gordon Ramsay" type="text" />
                        <div
                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary dark:text-gray-500">
                            <span class="material-symbols-outlined text-xl">person</span>
                        </div>
                    </div>
                </label>
                <label class="flex flex-col w-full">
                    <span class="text-text-main dark:text-gray-200 text-sm font-bold leading-normal pb-2">Email
                        Address</span>
                    <div class="relative">
                        <input
                            name="email"
                            class="form-input flex w-full rounded-lg text-text-main dark:text-white border border-[#e6e0db] dark:border-gray-700 bg-surface-light dark:bg-background-dark focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 placeholder:text-text-secondary dark:placeholder:text-gray-500 text-base transition-colors"
                            placeholder="chef@example.com" type="email" />
                        <div
                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary dark:text-gray-500">
                            <span class="material-symbols-outlined text-xl">mail</span>
                        </div>
                    </div>
                </label>
                <label class="flex flex-col w-full">
                    <span class="text-text-main dark:text-gray-200 text-sm font-bold leading-normal pb-2">Password</span>
                    <div class="relative flex w-full">
                        <input
                            name="password"
                            class="form-input flex w-full rounded-lg text-text-main dark:text-white border border-[#e6e0db] dark:border-gray-700 bg-surface-light dark:bg-background-dark focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 placeholder:text-text-secondary dark:placeholder:text-gray-500 text-base transition-colors pr-10"
                            placeholder="Create a strong password" type="password" />
                        <button
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-text-secondary hover:text-text-main dark:text-gray-500 dark:hover:text-gray-300"
                            type="button">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </button>
                    </div>
                </label>
                <label class="flex flex-col w-full">
                    <span class="text-text-main dark:text-gray-200 text-sm font-bold leading-normal pb-2">Confirm Password</span>
                    <div class="relative flex w-full">
                        <input
                            name="password_confirmation"
                            class="form-input flex w-full rounded-lg text-text-main dark:text-white border border-[#e6e0db] dark:border-gray-700 bg-surface-light dark:bg-background-dark focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 placeholder:text-text-secondary dark:placeholder:text-gray-500 text-base transition-colors pr-10"
                            placeholder="Confirm your password" type="password" />
                        <button
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-text-secondary hover:text-text-main dark:text-gray-500 dark:hover:text-gray-300"
                            type="button">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </button>
                    </div>
                </label>
                <button
                    class="w-full flex items-center justify-center gap-2 rounded-lg h-12 px-5 bg-primary hover:bg-primary-hover text-white text-base font-bold transition-colors shadow-sm mt-2"
                    type="submit">
                    <span>Start Cooking</span>
                    <span class="material-symbols-outlined text-lg">restaurant</span>
                </button>
            </form>
            <div class="text-center">
                <p class="text-text-secondary text-xs">
                    By joining, you agree to our
                    <a class="text-primary hover:underline font-medium" href="#">Terms of Service</a>
                    and
                    <a class="text-primary hover:underline font-medium" href="#">Privacy Policy</a>.
                </p>
            </div>
        </div>
    </div>

    <script>
        let loginBtn = document.getElementById('login-tab');
        let signupBtn = document.getElementById('signup-tab');
        let loginForm = document.getElementById('login-form');
        let signupForm = document.getElementById('signup-form');
        let welcomeTitle = document.getElementById('welcome-title');
        let welcomeSubtitle = document.getElementById('welcome-subtitle');
        
        function openLogin() {
            // Update tab styles
            loginBtn.classList.remove('border-transparent', 'hover:border-gray-300');
            loginBtn.classList.add('border-primary');
            loginBtn.querySelector('span').classList.remove('text-text-secondary', 'hover:text-text-main', 'dark:text-gray-400', 'dark:hover:text-gray-200');
            loginBtn.querySelector('span').classList.add('text-primary');
            
            signupBtn.classList.remove('border-primary');
            signupBtn.classList.add('border-transparent', 'hover:border-gray-300', 'dark:hover:border-gray-600');
            signupBtn.querySelector('span').classList.remove('text-primary');
            signupBtn.querySelector('span').classList.add('text-text-secondary', 'hover:text-text-main', 'dark:text-gray-400', 'dark:hover:text-gray-200');
            
            // Update titles
            welcomeTitle.textContent = 'Welcome Back';
            welcomeSubtitle.textContent = 'Discover new flavors or share your secret ingredients.';
            
            // Switch forms with animation
            if (!loginForm.classList.contains('hidden')) {
                return; // Already showing login form
            }
            
            signupForm.classList.remove('fade-in');
            signupForm.classList.add('fade-out');
            
            setTimeout(() => {
                signupForm.classList.add('hidden');
                signupForm.classList.remove('fade-out');
                
                loginForm.classList.remove('hidden');
                loginForm.classList.add('fade-in');
            }, 300);
        }
        
        function openSignup() {

            signupBtn.classList.remove('border-transparent', 'hover:border-gray-300');
            signupBtn.classList.add('border-primary');
            signupBtn.querySelector('span').classList.remove('text-text-secondary', 'hover:text-text-main', 'dark:text-gray-400', 'dark:hover:text-gray-200');
            signupBtn.querySelector('span').classList.add('text-primary');
            
            loginBtn.classList.remove('border-primary');
            loginBtn.classList.add('border-transparent', 'hover:border-gray-300', 'dark:hover:border-gray-600');
            loginBtn.querySelector('span').classList.remove('text-primary');
            loginBtn.querySelector('span').classList.add('text-text-secondary', 'hover:text-text-main', 'dark:text-gray-400', 'dark:hover:text-gray-200');
            
            welcomeTitle.textContent = 'Join Recipeium';
            welcomeSubtitle.textContent = 'Create your account and start sharing your culinary masterpieces.';
            
            if (!signupForm.classList.contains('hidden')) {
                return; 
            }
            
            loginForm.classList.remove('fade-in');
            loginForm.classList.add('fade-out');
            
            setTimeout(() => {
                loginForm.classList.add('hidden');
                loginForm.classList.remove('fade-out');
                
                signupForm.classList.remove('hidden');
                signupForm.classList.add('fade-in');
            }, 300);
        }
    </script>
</body>

</html>