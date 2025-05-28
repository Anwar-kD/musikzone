<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Piano Lessons - MelodyMentor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
        }

        /* Hero background avec piano */
        .piano-hero {
            background: linear-gradient(135deg,
                rgba(15, 23, 42, 0.9) 0%,
                rgba(51, 65, 85, 0.85) 50%,
                rgba(71, 85, 105, 0.8) 100%
            ), url('https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') center/cover;
            position: relative;
            min-height: 70vh;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }

        /* Navigation dropdowns - réutilisé de welcome */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            min-width: 200px;
            z-index: 100;
            padding: 0.5rem 0;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Custom checkbox styles */
        .custom-checkbox {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #52D4A3;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
            position: relative;
        }

        .custom-checkbox:checked {
            background-color: #52D4A3;
            border-color: #52D4A3;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation - Identique à welcome page -->
    <nav class="absolute top-0 w-full z-50 py-4 px-4 lg:px-8">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-teal-400 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-teal-400">melodymentor</span>
            </div>

            <!-- Menu de navigation desktop -->
            <div class="hidden lg:flex items-center space-x-8">
                <!-- Homepage dropdown -->
                <div class="dropdown relative">
                    <button class="text-white hover:text-teal-400 transition-colors duration-300 flex items-center space-x-1">
                        <span>Homepage</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Home v1</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Home v2</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Home v3</a>
                    </div>
                </div>

                <a href="#" class="text-white hover:text-teal-400 transition-colors duration-300">About us</a>

                <!-- Lessons dropdown -->
                <div class="dropdown relative">
                    <button class="text-white hover:text-teal-400 transition-colors duration-300 flex items-center space-x-1">
                        <span>Lessons</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        {{-- <a href="{{ route('piano.lessons') }}" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Piano Lessons</a>
                        <a href="{{ route('guitar.lessons') }}" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Guitar Lessons</a> --}}
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Violin Lessons</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Drum Lessons</a>
                    </div>
                </div>

                <a href="#" class="text-white hover:text-teal-400 transition-colors duration-300">Contact us</a>

                <!-- Pages dropdown -->
                <div class="dropdown relative">
                    <button class="text-white hover:text-teal-400 transition-colors duration-300 flex items-center space-x-1">
                        <span>Pages</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">About</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Instructors</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Pricing</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Blog</a>
                    </div>
                </div>
            </div>

            <!-- Bouton Get Started -->
            <button class="bg-teal-400 text-gray-900 px-6 py-2 rounded-full font-semibold hover:bg-teal-300 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-teal-300">
                Get Started
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="piano-hero flex items-center justify-center text-center text-white">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl lg:text-6xl font-extrabold mb-6 animate-fade-in-up">
                Piano Lesson
            </h1>
            <p class="text-lg lg:text-xl opacity-90 mb-8 max-w-2xl mx-auto animate-fade-in-up delay-100">
                Et non tellus pede massa molestie. Donec adipiscing sapien arcu
                scelerisque eleifend imperdiet vehic tempis porta mauris ex porta mauris. Etiam mauris dolor atque sapien.
            </p>
            <button class="bg-teal-400 text-gray-900 px-8 py-3 rounded-full font-semibold hover:bg-teal-300 hover:shadow-lg transition-all duration-300 animate-fade-in-up delay-200">
                Book Now
            </button>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Left Column - Descriptions -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6">Descriptions</h2>

                    <!-- Description paragraphs -->
                    <div class="space-y-4 mb-8">
                        <p class="text-gray-600 leading-relaxed">
                            Fusce ligula ex rem feugiat pede accumsan tellus scelerisque metu ius rhoncus. Sapien odane nam eros
                            addictive elit ante rutilis est porta aliquet arc por finibusdam ultrices vestibulum aliquot libero
                            quam ve at sodales. Ultrices molestae tacmfors lobortis nisl quis semisod sollicitudinem.
                        </p>
                        <p class="text-gray-600 leading-relaxed">
                            Fusce ligula ex rem feugiat pede accumsan tellus scelerisque metu ius rhoncus. Sapien odane nam eros
                            addictive elit ante rutilis est porta aliquet arc por finibusdam ultrices vestibulum aliquot libero
                            quam ve at sodales. Ultrices molestae tacmfors lobortis nisl quis semisod sollicitudinem.
                        </p>
                    </div>

                    <!-- What You'll Learn Section -->
                    <div class="mb-12">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Here's What You'll Learn in Our Classes :</h3>

                        <!-- Learning Item 1 -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-3 mb-4">
                                <input type="checkbox" checked class="custom-checkbox mt-1">
                                <h4 class="text-lg font-semibold text-gray-900">Proper finger placement and hand positioning</h4>
                            </div>
                            <div class="ml-8">
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    Learn the fundamental techniques for correct finger placement and hand positioning on the piano. This forms
                                    the foundation for all advanced piano techniques and helps prevent injury while maximizing performance
                                    efficiency. Master proper posture, wrist angle and finger curvature for optimal playing.
                                </p>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-gray-600 leading-relaxed">
                                        Building structured responses & sentence rhythm along structural via posuere voluptatem. Mauris
                                        gravida vehicula orci finibus bibendum consequat suspendet. Nullam cursus effent
                                        incidunt temporal pede lorem lorem ecrm maxgm.
                                    </p>
                                </div>

                                <!-- Skills Grid -->
                                <div class="mt-6">
                                    <h5 class="font-semibold text-gray-900 mb-4">Module :</h5>
                                    <div class="grid md:grid-cols-2 gap-4">
                                        <div class="space-y-3">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Manus non voluptatem</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Donec condictetur leftus</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Arcu molenda</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Porttitor in magna</span>
                                            </div>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Mattis non voluptatem</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Donec condictetur leftus</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Arcu definitive</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 bg-teal-400 rounded-full"></div>
                                                <span class="text-gray-600">Porttitor in magna</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Learning Item 2 -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-3 mb-4">
                                <input type="checkbox" checked class="custom-checkbox mt-1">
                                <h4 class="text-lg font-semibold text-gray-900">Mastering scales, chords, and arpeggios</h4>
                            </div>
                        </div>

                        <!-- Learning Item 3 -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-3 mb-4">
                                <input type="checkbox" checked class="custom-checkbox mt-1">
                                <h4 class="text-lg font-semibold text-gray-900">Learning classical, jazz, or contemporary</h4>
                            </div>
                        </div>

                        <!-- Learning Item 4 -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-3 mb-4">
                                <input type="checkbox" checked class="custom-checkbox mt-1">
                                <h4 class="text-lg font-semibold text-gray-900">Ear training and improvisation skills</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Trial Lesson Form -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Get Started with a Free Trial Lesson!</h3>
                        <p class="text-gray-600 mb-8">Nam in doubt auctor vitam elit at vulputat dictinct magna.</p>

                        {{-- <form action="{{ route('piano.trial') }}" method="POST" class="space-y-6"> --}}
                            @csrf
                            <!-- Full Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="full_name" placeholder="Full Name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:border-teal-400 outline-none transition-colors">
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                <input type="tel" name="phone" placeholder="Phone" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:border-teal-400 outline-none transition-colors">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" placeholder="Email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:border-teal-400 outline-none transition-colors">
                            </div>

                            <!-- Zip Code -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Zip Code</label>
                                <input type="text" name="zip_code" placeholder="Zip Code"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:border-teal-400 outline-none transition-colors">
                            </div>

                            <!-- Country -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                                <select name="country" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 focus:border-teal-400 outline-none transition-colors">
                                    <option value="">Entry Haven</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="FR">France</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                    class="w-full bg-teal-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-teal-300 transition-colors duration-300">
                                Get Started
                            </button>
                        {{-- </form> --}}

                        <!-- Need Help Section -->
                        <div class="mt-8 bg-gray-900 rounded-lg p-6 text-white">
                            <h4 class="font-semibold mb-4">Need more help?</h4>

                            <div class="space-y-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-teal-400 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium">Customer Support</div>
                                        <div class="text-sm text-gray-300">(405) 555-0128</div>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-teal-400 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium">Customer Support</div>
                                        <div class="text-sm text-gray-300">(405) 555-0128</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        // Dropdown functionality - identique à welcome page
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const menu = dropdown.querySelector('.dropdown-menu');

            dropdown.addEventListener('mouseenter', () => {
                menu.style.display = 'block';
            });

            dropdown.addEventListener('mouseleave', () => {
                menu.style.display = 'none';
            });
        });

        // Form handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // La soumission sera gérée par Laravel
                    console.log('Piano lesson trial form submitted');
                });
            }
        });
    </script>
</body>
</html>
