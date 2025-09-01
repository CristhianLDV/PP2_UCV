<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Inventario - I.E. San Lorenzo Cruceta</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 50%, #1e40af 100%);
            min-height: 100vh;
        }
        
        .glass {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .fade-in {
            animation: fadeIn 1s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hover-scale {
            transition: transform 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        .feature-card {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="glass fixed w-full z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">I.E. San Lorenzo</h1>
                    <p class="text-xs text-white/70">Sistema de Inventario</p>
                </div>
            </div>
            
            <!-- Auth Links -->
            <div class="flex items-center space-x-4">
                <a href="/admin/login" class="text-white/80 hover:text-white transition-colors px-4 py-2 rounded-lg hover:bg-white/10">
                    Iniciar Sesión
                </a>
                <a href="/admin/login" class="bg-white text-blue-600 font-semibold px-6 py-2 rounded-lg hover:bg-gray-100 transition-colors hover-scale">
                    Acceder al Panel
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="fade-in">
                    <h2 class="text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        Laboratorio de Cómputo
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                            I.E. San Lorenzo
                        </span>
                    </h2>
                    <p class="text-xl text-white/90 mb-4 leading-relaxed">
                        Sistema de gestión y control de inventario especializado para el laboratorio de cómputo de la 
                        <strong>Institución Educativa San Lorenzo - Cruceta</strong>.
                    </p>
                    <p class="text-lg text-white/80 mb-8 leading-relaxed">
                        Mantén un registro preciso de cada equipo, su estado y ubicación para garantizar el mejor 
                        servicio educativo a nuestros estudiantes.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/admin/login" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold px-8 py-4 rounded-lg hover:shadow-lg transition-all hover-scale text-center">
                            Comenzar Ahora
                        </a>
                        <a href="#features" class="glass text-white font-semibold px-8 py-4 rounded-lg hover:bg-white/20 transition-all text-center">
                            Ver Características
                        </a>
                    </div>
                </div>
                
                <!-- Right Content - Floating Elements -->
                <div class="relative">
                    <div class="glass rounded-2xl p-8 floating">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-white/80">Equipos del Laboratorio</span>
                                <span class="text-2xl font-bold text-white">35</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-400 to-blue-500 h-2 rounded-full w-4/5"></div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 pt-4">
                                <div class="text-center">
                                    <div class="text-green-400 font-bold text-lg">29</div>
                                    <div class="text-white/60 text-sm">Operativos</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-yellow-400 font-bold text-lg">4</div>
                                    <div class="text-white/60 text-sm">Mantenimiento</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-red-400 font-bold text-lg">2</div>
                                    <div class="text-white/60 text-sm">Reparación</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-white mb-4">Funcionalidades del Sistema</h3>
                <p class="text-xl text-white/80 max-w-2xl mx-auto">
                    Herramientas especializadas para la gestión eficiente del laboratorio de cómputo de nuestra institución
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="glass rounded-xl p-8 feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Control de Equipos</h4>
                    <p class="text-white/80">
                        Registro completo de computadoras, monitores, teclados y periféricos con códigos únicos y especificaciones detalladas.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="glass rounded-xl p-8 feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Ubicación por Laboratorio</h4>
                    <p class="text-white/80">
                        Mapeo preciso de cada equipo en el laboratorio, mesa por mesa, para facilitar su localización y control.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="glass rounded-xl p-8 feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Mantenimiento Programado</h4>
                    <p class="text-white/80">
                        Calendario automático de mantenimientos preventivos y correctivos con alertas oportunas.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="glass rounded-xl p-8 feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Reportes Educativos</h4>
                    <p class="text-white/80">
                        Informes específicos para la dirección académica sobre disponibilidad de equipos y necesidades del laboratorio.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="glass rounded-xl p-8 feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Control Docente</h4>
                    <p class="text-white/80">
                        Sistema de permisos para profesores y personal técnico con registro de responsabilidades y accesos.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="glass rounded-xl p-8 feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Adaptación Institucional</h4>
                    <p class="text-white/80">
                        Sistema flexible que se adapta a las políticas y normativas específicas de la I.E. San Lorenzo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="glass rounded-2xl p-12">
                <h3 class="text-4xl font-bold text-white mb-6">
                    ¿Listo para modernizar nuestro laboratorio?
                </h3>
                <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
                    Únete al sistema de gestión que permitirá a la I.E. San Lorenzo - Cruceta mantener un control 
                    eficiente y profesional de todos los equipos del laboratorio de cómputo.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/admin/login" class="bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold px-8 py-4 rounded-lg hover:shadow-lg transition-all hover-scale">
                        Acceder al Sistema
                    </a>
                    <a href="#features" class="text-white font-semibold px-8 py-4 rounded-lg border border-white/30 hover:bg-white/10 transition-all">
                        Conocer Más
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-6 border-t border-white/10">
        <div class="max-w-7xl mx-auto text-center">
            <div class="flex items-center justify-center space-x-3 mb-6">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-white">I.E. San Lorenzo - Cruceta</span>
            </div>
            <p class="text-white/60 mb-6">
                Sistema de gestión de inventario del laboratorio de cómputo
            </p>
            <div class="flex justify-center space-x-6 text-sm text-white/60">
                <a href="#" class="hover:text-white transition-colors">Manual de Usuario</a>
                <a href="#" class="hover:text-white transition-colors">Soporte Técnico</a>
                <a href="#" class="hover:text-white transition-colors">Contacto</a>
                <a href="#" class="hover:text-white transition-colors">Dirección</a>
            </div>
            <p class="text-white/40 text-sm mt-6">
                © 2025 Institución Educativa San Lorenzo - Cruceta. Sistema de Inventario de Laboratorio.
            </p>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Add scroll effect to navigation
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.style.background = 'rgba(255, 255, 255, 0.15)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.1)';
            }
        });
    </script>
</body>
</html>