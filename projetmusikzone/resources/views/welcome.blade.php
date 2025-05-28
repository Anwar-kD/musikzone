<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MelodyMentor - Learn Music from Professional Instructors</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Tailwind CSS via CDN pour assurer le chargement -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            /* Configuration Tailwind */
            @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Instrument Sans', sans-serif;
            }

            /* Arrière-plan hero avec gradient et pattern de violon */
            .hero-background {
                background: linear-gradient(135deg,
                    rgba(15, 23, 42, 0.95) 0%,
                    rgba(51, 65, 85, 0.9) 25%,
                    rgba(120, 53, 15, 0.85) 50%,
                    rgba(146, 64, 14, 0.8) 75%,
                    rgba(180, 83, 9, 0.75) 100%
                );
                position: relative;
                min-height: 100vh;
            }

            .hero-background::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image:
                    radial-gradient(circle at 25% 25%, rgba(52, 211, 153, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 75% 75%, rgba(245, 158, 11, 0.1) 0%, transparent 50%);
                z-index: 1;
            }

            .hero-content {
                position: relative;
                z-index: 10;
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

            /* Navigation dropdowns */
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

            /* Styles pour assurer la visibilité */
            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            }

            /* Badge glassmorphism */
            .glass-badge {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            /* Animations pour la section Who We Are */
            .image-container {
                transition: all 0.6s ease-in-out;
                transform: translateX(-30px);
                opacity: 0;
            }

            .image-container.animate-in {
                transform: translateX(0);
                opacity: 1;
            }

            .image-container img {
                transition: transform 0.4s ease-in-out;
            }

            .image-container:hover img {
                transform: scale(1.05);
            }

            .badge-25 {
                transition: all 0.5s ease-in-out;
                transform: scale(0.8) rotate(-10deg);
                opacity: 0;
            }

            .badge-25.animate-in {
                transform: scale(1) rotate(0deg);
                opacity: 1;
                animation: bounce-in 0.8s ease-out 0.3s forwards;
            }

            @keyframes bounce-in {
                0% { transform: scale(1) rotate(0deg); }
                50% { transform: scale(1.1) rotate(5deg); }
                100% { transform: scale(1) rotate(0deg); }
            }

            /* Animation pour le contenu texte */
            .content-animate {
                transition: all 0.6s ease-in-out;
                transform: translateX(30px);
                opacity: 0;
            }

            .content-animate.animate-in {
                transform: translateX(0);
                opacity: 1;
            }

            /* Animation des features avec délai */
            .feature-item {
                transition: all 0.4s ease-in-out;
                transform: translateY(20px);
                opacity: 0;
            }

            .feature-item.animate-in {
                transform: translateY(0);
                opacity: 1;
            }

            .feature-item:nth-child(1) { transition-delay: 0.1s; }
            .feature-item:nth-child(2) { transition-delay: 0.2s; }
            .feature-item:nth-child(3) { transition-delay: 0.3s; }

            /* Animations pour la section Passion */
            .guitar-container {
                transition: all 0.8s ease-in-out;
                transform: scale(0.8) rotateY(20deg);
                opacity: 0;
            }

            .guitar-container.animate-in {
                transform: scale(1) rotateY(0deg);
                opacity: 1;
            }

            .guitar-container img {
                transition: transform 0.4s ease-in-out;
                filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
            }

            .guitar-container:hover img {
                transform: scale(1.05) rotateZ(2deg);
            }

            /* Services animations */
            .service-item {
                transition: all 0.6s ease-in-out;
                opacity: 0;
            }

            .service-item[data-animate="service-left"] {
                transform: translateX(-50px);
            }

            .service-item[data-animate="service-right"] {
                transform: translateX(50px);
            }

            .service-item.animate-in {
                transform: translateX(0);
                opacity: 1;
            }

            .service-item:hover {
                transform: translateX(0) translateY(-5px);
            }

            .service-item:hover .w-12 {
                transform: scale(1.1) rotate(5deg);
                box-shadow: 0 5px 15px rgba(52, 211, 153, 0.4);
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
                            <a href="{{ route('piano') }}" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Piano Lessons</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-teal-100 transition-colors">Guitar Lessons</a>
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

        <!-- Section Hero -->
        <main class="hero-background">
            <div class="hero-content min-h-screen flex items-center justify-center py-20 px-4 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <!-- Badge Exclusive Class -->
                    <div class="inline-block glass-badge rounded-full px-6 py-2 mb-8 animate-fade-in-up">
                        <span class="text-teal-400 text-sm font-medium uppercase tracking-wide">Exclusive Class</span>
                    </div>

                    <!-- Titre principal -->
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-8 animate-fade-in-up delay-100 text-shadow leading-tight">
                        Inspiring<br>
                        Musicians, One<br>
                        <span class="text-teal-400">Lesson Away.</span>
                    </h1>

                    <!-- Sous-titre -->
                    <p class="text-lg md:text-xl text-white mb-12 max-w-2xl mx-auto opacity-90 animate-fade-in-up delay-200 text-shadow">
                        Learn Music from Professional Instructors at MelodyMentor
                    </p>

                    <!-- Bouton d'action principal -->
                    <div class="mb-16 animate-fade-in-up delay-300">
                        <button class="bg-teal-400 text-gray-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-teal-300 hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-teal-300 shadow-lg">
                            Start Learning Today
                        </button>
                    </div>

                    <!-- Statistiques -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-8 sm:gap-16 animate-fade-in-up delay-300">
                        <div class="text-center text-white">
                            <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">500+</div>
                            <div class="text-sm md:text-base opacity-80">Happy Students</div>
                        </div>
                        <div class="hidden sm:block w-px h-12 bg-white opacity-30"></div>
                        <div class="text-center text-white">
                            <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">50+</div>
                            <div class="text-sm md:text-base opacity-80">Expert Instructors</div>
                        </div>
                        <div class="hidden sm:block w-px h-12 bg-white opacity-30"></div>
                        <div class="text-center text-white">
                            <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">15+</div>
                            <div class="text-sm md:text-base opacity-80">Instruments</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Section Who We Are -->
        <section class="py-16 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                    <!-- Image et badge -->
                    <div class="relative image-container" data-animate="left">
                        <!-- Badge 25+ Years -->
                        <div class="absolute -top-8 -left-8 w-32 h-32 bg-teal-400 rounded-full flex flex-col items-center justify-center text-white font-bold z-10 badge-25" data-animate="badge">
                            <span class="text-3xl font-extrabold">25+</span>
                            <span class="text-xs text-center leading-tight">YEARS OF<br>EXPERIENCE</span>
                        </div>

                        <!-- Image des étudiants -->
                        <div class="relative rounded-2xl overflow-hidden shadow-xl">
                            <img
                                src="https://img.freepik.com/premium-photo/music-teacher-taking-selfie-with-students_249974-20003.jpg"
                                alt="Students learning music together"
                                class="w-full h-96 lg:h-[500px] object-cover"
                            >
                            <!-- Overlay subtil -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>

                    <!-- Contenu texte -->
                    <div class="lg:pl-8 content-animate" data-animate="right">
                        <!-- Titre de section -->
                        <div class="mb-6">
                            <span class="text-teal-400 font-semibold text-sm uppercase tracking-wide">WHO WE ARE</span>
                        </div>

                        <!-- Titre principal -->
                        <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                            Our Journey to Inspire and Empower Aspiring Musicians
                        </h2>

                        <!-- Citation avec bordure -->
                        <div class="border-l-4 border-teal-400 pl-6 mb-8">
                            <p class="text-lg lg:text-xl text-gray-700 italic font-medium">
                                Morbi eget pellentesque vestibulum mauris etiam sagittis letius consequat sapien
                            </p>
                        </div>

                        <!-- Paragraphe descriptif -->
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            Aliquam pellentesque quam aenean bibendum mollis per. Duis non rhoncus vulputate maximus enim ornare. Diam eu id rutrum lobortis netus neque integer venenatis letius libero a.
                        </p>

                        <!-- Grille des fonctionnalités -->
                        <div class="grid sm:grid-cols-2 gap-4 mb-8">
                            <!-- Colonne gauche -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3 feature-item" data-animate="feature">
                                    <div class="w-6 h-6 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">Flexible Lesson Duration</span>
                                </div>

                                <div class="flex items-center space-x-3 feature-item" data-animate="feature">
                                    <div class="w-6 h-6 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">One-on-One Sessions</span>
                                </div>

                                <div class="flex items-center space-x-3 feature-item" data-animate="feature">
                                    <div class="w-6 h-6 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">Online & In-Person</span>
                                </div>
                            </div>

                            <!-- Colonne droite -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3 feature-item" data-animate="feature">
                                    <div class="w-6 h-6 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">Progress Tracking</span>
                                </div>

                                <div class="flex items-center space-x-3 feature-item" data-animate="feature">
                                    <div class="w-6 h-6 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">Trial Lesson Offered</span>
                                </div>

                                <div class="flex items-center space-x-3 feature-item" data-animate="feature">
                                    <div class="w-6 h-6 bg-teal-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 font-medium">Free Consultation</span>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <button class="bg-teal-400 text-gray-900 px-8 py-3 rounded-full font-semibold hover:bg-teal-300 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-teal-300">
                                Discover more
                            </button>

                            <button class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center hover:bg-teal-300 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-teal-300 group">
                                <svg class="w-5 h-5 text-gray-900 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Discover the Passion -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <!-- Titre principal -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 leading-tight">
                        Discover the Passion and Mission<br>
                        Behind MelodyMentor.
                    </h2>
                </div>

                <!-- Contenu principal avec guitare au centre -->
                <div class="relative">
                    <!-- Guitare centrale -->
                    <div class="flex justify-center mb-8 lg:mb-0">
                        <div class="guitar-container" data-animate="guitar">
                            <img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIPpcvexRGHjm27VPnnxQQpogAM3rTzTS4rcLL0u4UTuVoBgMjhQ3-V4t_rC5Ct1H2Xg4&usqp=CAU"
                                alt="Acoustic Guitar"
                                class="w-64 h-96 lg:w-80 lg:h-[500px] object-contain"
                            >
                        </div>
                    </div>

                    <!-- Services autour de la guitare -->
                    <div class="lg:absolute lg:inset-0 lg:flex lg:items-center lg:justify-between">
                        <!-- Colonne gauche -->
                        <div class="lg:w-1/3 space-y-8 lg:space-y-12">
                            <!-- Private Music Lessons -->
                            <div class="service-item flex items-start space-x-4 lg:justify-end lg:text-right" data-animate="service-left">
                                <div class="lg:order-2">
                                    <div class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center mb-3 lg:ml-auto">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="lg:order-1 flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Private Music Lessons</h3>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Auctor elementum etiam congue gravida posuere nostra inceptos scelerisque mus consequat imperdiet.
                                    </p>
                                </div>
                            </div>

                            <!-- Online Music Classes -->
                            <div class="service-item flex items-start space-x-4 lg:justify-end lg:text-right" data-animate="service-left">
                                <div class="lg:order-2">
                                    <div class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center mb-3 lg:ml-auto">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="lg:order-1 flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Online Music Classes</h3>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Auctor elementum etiam congue gravida posuere nostra inceptos scelerisque mus consequat imperdiet.
                                    </p>
                                </div>
                            </div>

                            <!-- Performance Coaching -->
                            <div class="service-item flex items-start space-x-4 lg:justify-end lg:text-right" data-animate="service-left">
                                <div class="lg:order-2">
                                    <div class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center mb-3 lg:ml-auto">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="lg:order-1 flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Performance Coaching</h3>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Auctor elementum etiam congue gravida posuere nostra inceptos scelerisque mus consequat imperdiet.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite -->
                        <div class="lg:w-1/3 space-y-8 lg:space-y-12 mt-8 lg:mt-0">
                            <!-- Music Theory Classes -->
                            <div class="service-item flex items-start space-x-4" data-animate="service-right">
                                <div class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center mb-3 flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Music Theory Classes</h3>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Auctor elementum etiam congue gravida posuere nostra inceptos scelerisque mus consequat imperdiet.
                                    </p>
                                </div>
                            </div>

                            <!-- Practice Sessions Support -->
                            <div class="service-item flex items-start space-x-4" data-animate="service-right">
                                <div class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center mb-3 flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Practice Sessions Support</h3>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Auctor elementum etiam congue gravida posuere nostra inceptos scelerisque mus consequat imperdiet.
                                    </p>
                                </div>
                            </div>

                            <!-- Seasonal Music Camps -->
                            <div class="service-item flex items-start space-x-4" data-animate="service-right">
                                <div class="w-12 h-12 bg-teal-400 rounded-full flex items-center justify-center mb-3 flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Seasonal Music Camps</h3>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Auctor elementum etiam congue gravida posuere nostra inceptos scelerisque mus consequat imperdiet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- Footer -->
        <footer class="bg-gray-900 text-white py-16 relative">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <!-- Contenu principal du footer -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                    <!-- Logo et description -->
                    <div class="lg:col-span-2">
                        <!-- Logo -->
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-10 h-10 bg-teal-400 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-white">melodymentor</span>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-400 leading-relaxed mb-6 max-w-md">
                            Penatibus natoque cursus scelerisque tristique ut commodo porta. Aptent sociosqu pharetra curabitur praesent dolor.
                        </p>

                        <!-- Réseaux sociaux -->
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-teal-400 transition-colors duration-300 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-teal-400 transition-colors duration-300 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-teal-400 transition-colors duration-300 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 23.994 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.017 0z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-teal-400 transition-colors duration-300 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Colonne Lessons -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-6">Lessons</h3>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Online Class</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Adult Program</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Pre-School</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Teenagers</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Song Writing</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Home Band</a></li>
                        </ul>
                    </div>

                    <!-- Colonne Support -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-6">Support</h3>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Help Center</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Send Ticket</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">FAQ</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Contact us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Forum Community</a></li>
                        </ul>
                    </div>

                    <!-- Colonne Company -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-6">Company</h3>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">About us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Leadership</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Careers</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Article & News</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Legal Notices</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Ligne de séparation -->
                <div class="border-t border-gray-800 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <!-- Copyright -->
                        <div class="text-gray-400 text-sm mb-4 md:mb-0">
                            Copyright © 2025 musikZone. All rights reserved. Powered by <span class="text-teal-400">MaxCreative</span>.
                        </div>

                        <!-- Liens légaux -->
                        <div class="flex space-x-6 text-sm">
                            <a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Term of services</a>
                            <span class="text-gray-600">•</span>
                            <a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Privacy Policy</a>
                            <span class="text-gray-600">•</span>
                            <a href="#" class="text-gray-400 hover:text-teal-400 transition-colors duration-300">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arrière-plan avec pattern musical -->
            <div class="absolute inset-0 pointer-events-none opacity-5">
                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100">
                    <defs>
                        <pattern id="musical-notes" patternUnits="userSpaceOnUse" width="20" height="20">
                            <circle cx="5" cy="15" r="1.5"/>
                            <circle cx="15" cy="8" r="1.5"/>
                            <path d="M6.5 15 L6.5 5 M16.5 8 L16.5 18" stroke="currentColor" stroke-width="0.5"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#musical-notes)"/>
                </svg>
            </div>
        </footer>

        <!-- JavaScript -->
        <script>
            // Assurer que les animations se déclenchent au chargement
            document.addEventListener('DOMContentLoaded', function() {
                // Forcer l'affichage des éléments animés
                const animatedElements = document.querySelectorAll('.animate-fade-in-up');
                animatedElements.forEach((element, index) => {
                    setTimeout(() => {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            });

            // Gestion des dropdowns
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                const menu = dropdown.querySelector('.dropdown-menu');

                dropdown.addEventListener('mouseenter', () => {
                    menu.style.display = 'block';
                });

                dropdown.addEventListener('mouseleave', () => {
                    menu.style.display = 'none';
                });
            });

            // Animation de la section Who We Are au scroll
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const animationType = element.getAttribute('data-animate');

                        switch(animationType) {
                            case 'left':
                                element.classList.add('animate-in');
                                break;
                            case 'right':
                                setTimeout(() => {
                                    element.classList.add('animate-in');
                                }, 200);
                                break;
                            case 'badge':
                                setTimeout(() => {
                                    element.classList.add('animate-in');
                                }, 400);
                                break;
                            case 'feature':
                                setTimeout(() => {
                                    element.classList.add('animate-in');
                                }, 600);
                                break;
                        }
                    }
                });
            }, observerOptions);

            // Observer tous les éléments avec data-animate
            document.querySelectorAll('[data-animate]').forEach(el => {
                observer.observe(el);
            });

            // Animation spéciale pour la section Passion
            const passionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const animationType = element.getAttribute('data-animate');

                        switch(animationType) {
                            case 'guitar':
                                setTimeout(() => {
                                    element.classList.add('animate-in');
                                }, 100);
                                break;
                            case 'service-left':
                                setTimeout(() => {
                                    element.classList.add('animate-in');
                                }, Math.random() * 400 + 200);
                                break;
                            case 'service-right':
                                setTimeout(() => {
                                    element.classList.add('animate-in');
                                }, Math.random() * 400 + 300);
                                break;
                        }
                    }
                });
            }, {
                threshold: 0.3,
                rootMargin: '0px 0px -100px 0px'
            });

            // Observer les éléments de la section Passion
            document.querySelectorAll('[data-animate="guitar"], [data-animate="service-left"], [data-animate="service-right"]').forEach(el => {
                passionObserver.observe(el);
            });
        </script>
    </body>
</html>
