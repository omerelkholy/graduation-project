<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saree3 - Fast Delivery Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aclonica&family=Aubrey&family=Birthstone&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lexend+Deca:wght@100..900&family=Merienda:wght@300..900&family=Micro+5&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Outfit:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IE+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Silkscreen:wght@400;700&family=Tiny5&display=swap"
        rel="stylesheet">
</head>
<body class="bg-[#18181b] text-white flex flex-col items-center justify-center min-h-screen">
<!-- Navigation -->
<nav class="w-full bg-[#202022]/80 backdrop-blur-md fixed top-0 z-50 py-4">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Saree3 Logo" class="h-10 mr-4">
        </div>
        <div class="hidden md:flex space-x-8">
            <a href="#" class="hover:text-[#10b981] transition duration-300">Home</a>
            <a href="#services" class="hover:text-[#10b981] transition duration-300">Services</a>
            <a href="#how-it-works" class="hover:text-[#10b981] transition duration-300">How It Works</a>
            <a href="#testimonials" class="hover:text-[#10b981] transition duration-300">Testimonials</a>
            <a href="#contact" class="hover:text-[#10b981] transition duration-300">Contact</a>
        </div>
        <div class="md:hidden">
            <button class="text-white hover:text-[#10b981]">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
</nav>

<div class="container mx-auto px-4 mt-24">
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4 items-center justify-center md:text-left mt-20">
        <div class="md:col-span-3 flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Saree3 Logo" class="w-auto h-40 md:h-52 animate-bounceSlow">
        </div>
        <div class="md:col-span-3">
            <!-- Slogan -->
            <h1 class="text-4xl font-bold mt-4 text-center md:text-left text-white animate-fadeIn">
                <span class="text-[#10b981]">Saree3</span> Delivery
            </h1>
            <p class="text-2xl font-semibold mt-2 text-center md:text-left text-[#10b981] animate-fadeIn delay-200">
                Slow is Just Our Logo, Fast is Our Promise!
            </p>
            <p class="mt-4 text-gray-300 animate-fadeIn delay-300">Experience lightning-fast deliveries that will leave you wondering if we've discovered teleportation!</p>
            <!-- Buttons -->
            <div class="mt-6 flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                <button>
                    <a href="{{ route('login') }}" class="btn">
                    <span>
                        Login
                    </span>
                    </a>
                </button>
                <button>
                    <a href="{{ route('register') }}"
                       class="btn">
                    <span>
                    Register
                    </span>
                    </a>
                </button>
                <button>
                    <a href="{{ url('/admin') }}"
                       class="btn">
                    <span>
                    Admin Panel
                    </span>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section id="about" class="mt-24 px-8 text-center max-w-7xl w-full">
    <div class="grid grid-cols-1 md:grid-cols-6 gap-8 items-center text-center md:text-left">
        <div class="md:col-span-3 text-center md:text-left">
            <h2 class="text-3xl font-bold text-[#10b981] animate-fadeIn">Why Choose Saree3?</h2>
            <p class="mt-4 text-lg animate-fadeIn">Because waiting forever for deliveries is so last century! We promise
                you the speed of a cheetah (but in shipping) and the reliability of your grandma's best recipes.</p>
            <ul class="mt-6 space-y-3 text-left">
                <li class="flex items-center"><i class="fa-solid fa-check text-[#10b981] mr-3"></i> Lightning-fast delivery times</li>
                <li class="flex items-center"><i class="fa-solid fa-check text-[#10b981] mr-3"></i> Real-time package tracking</li>
                <li class="flex items-center"><i class="fa-solid fa-check text-[#10b981] mr-3"></i> Exceptional customer service</li>
                <li class="flex items-center"><i class="fa-solid fa-check text-[#10b981] mr-3"></i> 100% satisfaction guarantee</li>
            </ul>
        </div>
        <div class="md:col-span-3 relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-[#10b981] to-[#064e3b] rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative">
                <img src="{{ asset('images/fast_snail.png') }}" alt="Saree3 Snail"
                     class="mx-auto mt-6 rounded-lg w-3/4 animate-forwardSlow">
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="mt-24 px-8 py-12 bg-[#202022] w-full">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-[#10b981] text-center mb-12">Our Premium Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-[#18181b] p-6 rounded-lg shadow-lg transform hover:-translate-y-2 transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 rounded-full bg-[#10b981]/20 flex items-center justify-center">
                        <i class="fas fa-shipping-fast text-[#10b981] text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-center text-[#10b981] mb-3">Same-Day Delivery</h3>
                <p class="text-gray-300 text-center">Order before noon and receive your package on the same day. Available in select cities.</p>
            </div>

            <!-- Service 2 -->
            <div class="bg-[#18181b] p-6 rounded-lg shadow-lg transform hover:-translate-y-2 transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 rounded-full bg-[#10b981]/20 flex items-center justify-center">
                        <i class="fas fa-store text-[#10b981] text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-center text-[#10b981] mb-3">Merchant Solutions</h3>
                <p class="text-gray-300 text-center">Enhance your business with our reliable and quick delivery services for your customers.</p>
            </div>

            <!-- Service 3 -->
            <div class="bg-[#18181b] p-6 rounded-lg shadow-lg transform hover:-translate-y-2 transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 rounded-full bg-[#10b981]/20 flex items-center justify-center">
                        <i class="fas fa-globe text-[#10b981] text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-center text-[#10b981] mb-3">International Shipping</h3>
                <p class="text-gray-300 text-center">Send packages worldwide with our fast and reliable international delivery service.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="mt-16 px-8 max-w-7xl mx-auto py-12">
    <h2 class="text-3xl font-bold text-[#10b981] text-center mb-12">How It Works</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Step 1 -->
        <div class="relative">
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#10b981] flex items-center justify-center text-white text-2xl font-bold z-10">1</div>
                <div class="h-full w-1 bg-[#10b981] absolute top-16 left-1/2 transform -translate-x-1/2 md:hidden"></div>
            </div>
            <h3 class="text-xl font-semibold text-center mt-4 text-[#10b981]">Place Your Order</h3>
            <p class="text-center mt-2">Register on our platform and submit your delivery request with all the details.</p>
        </div>

        <!-- Step 2 -->
        <div class="relative">
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#10b981] flex items-center justify-center text-white text-2xl font-bold z-10">2</div>
                <div class="h-full w-1 bg-[#10b981] absolute top-16 left-1/2 transform -translate-x-1/2 md:hidden"></div>
            </div>
            <h3 class="text-xl font-semibold text-center mt-4 text-[#10b981]">Pickup</h3>
            <p class="text-center mt-2">Our courier will arrive at the pickup location within the scheduled time frame.</p>
        </div>

        <!-- Step 3 -->
        <div class="relative">
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#10b981] flex items-center justify-center text-white text-2xl font-bold z-10">3</div>
                <div class="h-full w-1 bg-[#10b981] absolute top-16 left-1/2 transform -translate-x-1/2 md:hidden"></div>
            </div>
            <h3 class="text-xl font-semibold text-center mt-4 text-[#10b981]">Tracking</h3>
            <p class="text-center mt-2">Track your package in real-time through our app or website.</p>
        </div>

        <!-- Step 4 -->
        <div class="relative">
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#10b981] flex items-center justify-center text-white text-2xl font-bold z-10">4</div>
            </div>
            <h3 class="text-xl font-semibold text-center mt-4 text-[#10b981]">Delivery</h3>
            <p class="text-center mt-2">Receive your package at the destination faster than you expected!</p>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="mt-24 px-8 py-12 bg-[#202022] w-full">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-[#10b981] text-center mb-12">Our Impact</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-[#10b981] mb-2 counter">500K+</div>
                <p class="text-gray-300">Successful Deliveries</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-[#10b981] mb-2 counter">98%</div>
                <p class="text-gray-300">On-Time Delivery Rate</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-[#10b981] mb-2 counter">50+</div>
                <p class="text-gray-300">Cities Covered</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-[#10b981] mb-2 counter">10K+</div>
                <p class="text-gray-300">Happy Customers</p>
            </div>
        </div>
    </div>
</section>

<!-- Customer Testimonials -->
<section id="testimonials" class="mt-24 px-8 text-center max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-[#10b981]">What Our Customers Say</h2>
    <div class="cards mt-10 grid grid-cols-1 md:grid-cols-4 gap-20 items-center text-center md:text-left">
        <div class="card">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Ahmed</p>
                        <p>Hover and see!</p>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">I'm shocked!</p>
                        <p class="italic">I blinked, and my package was already here! Are they using teleportation?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Sara</p>
                        <p>Hover and see!</p>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">That was quick!</p>
                        <p class="italic">Finally, a delivery service that doesn’t make me wait a century!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Saif</p>
                        <p>Hover and see!</p>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">Best shipping ever!</p>
                        <p class="italic">I couldn't believe I can have my order that quick</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Hamoksha</p>
                        <p>Hover and see!</p>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">So Amazed by speed!</p>
                        <p class="italic">I'm a merchant and that was the quickest time to deliver an order</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download App Section -->
<section class="mt-24 px-8 py-12 bg-[#202022] w-full">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-3xl font-bold text-[#10b981] mb-4">Download Our Mobile App</h2>
            <p class="text-gray-300 mb-6">Track deliveries, request pickups, and manage your shipments on the go with our easy-to-use mobile application.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#" class="flex items-center justify-center gap-2 bg-black px-6 py-3 rounded-lg hover:bg-gray-900 transition">
                    <i class="fab fa-apple text-2xl"></i>
                    <div class="text-left">
                        <p class="text-xs">Download on the</p>
                        <p class="text-lg font-semibold">App Store</p>
                    </div>
                </a>
                <a href="#" class="flex items-center justify-center gap-2 bg-black px-6 py-3 rounded-lg hover:bg-gray-900 transition">
                    <i class="fab fa-google-play text-2xl"></i>
                    <div class="text-left">
                        <p class="text-xs">Get it on</p>
                        <p class="text-lg font-semibold">Google Play</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="relative w-64 h-96 bg-[#10b981]/10 rounded-3xl p-3 border-4 border-[#10b981]/30">
                <div class="absolute top-2 left-1/2 transform -translate-x-1/2 w-16 h-2 bg-[#10b981]/50 rounded-full"></div>
                <div class="w-full h-full bg-[#18181b] rounded-2xl flex items-center justify-center overflow-hidden">
                    <div class="text-center">
                        <div class="text-[#10b981] text-6xl mb-4"><i class="fas fa-mobile-alt"></i></div>
                        <p class="text-[#10b981] font-bold">Saree3 App</p>
                        <p class="text-sm text-gray-400 mt-2">Fast Delivery at Your Fingertips</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tracking Section -->
<section id="tracking" class="mt-24 px-8 max-w-7xl mx-auto py-12">
    <div class="bg-[#202022]/70 rounded-xl p-8 backdrop-blur-sm border border-[#10b981]/20">
        <h2 class="text-3xl font-bold text-[#10b981] text-center mb-8">Track Your Package</h2>
        <div class="flex flex-col md:flex-row gap-4 max-w-2xl mx-auto">
            <input type="text" placeholder="Enter Your Tracking Number" class="px-4 py-3 rounded-lg text-black flex-grow">
            <button class="px-8 py-3 bg-[#10b981] text-white rounded-lg hover:bg-[#0f9170] transition">Track Now</button>
        </div>
        <p class="text-center mt-4 text-gray-400">Enter your tracking number to get real-time updates on your delivery</p>
    </div>
</section>

<!-- FAQs Section -->
<section class="mt-24 px-8 max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-[#10b981] text-center mb-12">Frequently Asked Questions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- FAQ 1 -->
        <div class="bg-[#202022] p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-[#10b981] mb-3">How fast is Saree3 delivery?</h3>
            <p class="text-gray-300">Depending on the service you choose and your location, Saree3 delivers packages as fast as within the same day or within 24 hours for standard delivery.</p>
        </div>

        <!-- FAQ 2 -->
        <div class="bg-[#202022] p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-[#10b981] mb-3">What areas do you cover?</h3>
            <p class="text-gray-300">We currently operate in over 50 major cities nationwide, with international shipping available to select countries.</p>
        </div>

        <!-- FAQ 3 -->
        <div class="bg-[#202022] p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-[#10b981] mb-3">How do I schedule a pickup?</h3>
            <p class="text-gray-300">You can schedule a pickup through our website, mobile app, or by calling our customer service. We recommend booking at least 2 hours in advance.</p>
        </div>

        <!-- FAQ 4 -->
        <div class="bg-[#202022] p-6 rounded-lg">
            <h3 class="text-xl font-semibold text-[#10b981] mb-3">What if my package is lost or damaged?</h3>
            <p class="text-gray-300">We offer a 100% satisfaction guarantee. If your package is lost or damaged, please contact our customer service within 48 hours, and we'll resolve the issue promptly.</p>
        </div>
    </div>
    <div class="text-center mt-8">
        <button class="px-8 py-3 border-2 border-[#10b981] text-[#10b981] rounded-lg hover:bg-[#10b981] hover:text-white transition">View All FAQs</button>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="mt-24 px-8 py-12 bg-[#202022] w-full">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-[#10b981] text-center mb-12">Get In Touch</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-xl font-semibold text-[#10b981] mb-4">Contact Information</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="text-[#10b981] mt-1"><i class="fas fa-map-marker-alt"></i></div>
                        <p>123 Speed Avenue, Fast City, ITI, Menoufia</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="text-[#10b981] mt-1"><i class="fas fa-phone-alt"></i></div>
                        <p>+20 1023172089</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="text-[#10b981] mt-1"><i class="fas fa-envelope"></i></div>
                        <p>support@saree3.com</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="text-[#10b981] mt-1"><i class="fas fa-clock"></i></div>
                        <p>Sunday - Thursday 8:00 AM - 8:00 PM<br>Saturday: 9:00 AM - 5:00 PM<br>Friday: Closed</p>
                    </div>
                </div>
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-[#10b981] mb-4">Follow Us</h3>
                    <div class="flex gap-4">
                        <a href="https://www.youtube.com/shorts/eB8riDrceVg" target="_blank" class="w-10 h-10 rounded-full bg-[#18181b] flex items-center justify-center hover:bg-[#10b981]/20 transition">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="https://www.youtube.com/shorts/6name2TWN-A" target="_blank" class="w-10 h-10 rounded-full bg-[#18181b] flex items-center justify-center hover:bg-[#10b981]/20 transition">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="w-10 h-10 rounded-full bg-[#18181b] flex items-center justify-center hover:bg-[#10b981]/20 transition">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="https://discord.gg/GyAWjMqr" target="_blank" class="w-10 h-10 rounded-full bg-[#18181b] flex items-center justify-center hover:bg-[#10b981]/20 transition">
                            <i class="fa-brands fa-discord"></i>
                        </a>
                        <a href="https://www.youtube.com/shorts/isRx40p7doI" target="_blank" class="w-10 h-10 rounded-full bg-[#18181b] flex items-center justify-center hover:bg-[#10b981]/20 transition">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-[#10b981] mb-4">Send Us a Message</h3>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" placeholder="Your Name" class="w-full px-4 py-2 rounded-lg text-black">
                        </div>
                        <div>
                            <input type="email" placeholder="Your Email" class="w-full px-4 py-2 rounded-lg text-black">
                        </div>
                    </div>
                    <div>
                        <input type="text" placeholder="Subject" class="w-full px-4 py-2 rounded-lg text-black">
                    </div>
                    <div>
                        <textarea placeholder="Your Message" rows="4" class="w-full px-4 py-2 rounded-lg text-black"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="w-full px-4 py-3 bg-[#10b981] text-white rounded-lg hover:bg-[#0f9170] transition">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="mt-24 bg-[#202022] text-white py-12 text-center w-full">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-left mb-12">
            <div>
                <h3 class="text-xl font-semibold text-[#10b981] mb-4">About Saree3</h3>
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Saree3 Logo" class="h-12 mr-3">
                </div>
                <p class="text-gray-300">Saree3 is the leading delivery service provider committed to revolutionizing shipping with unprecedented speed and reliability.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-[#10b981] mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">Home</a></li>
                    <li><a href="#services" class="text-gray-300 hover:text-[#10b981] transition">Services</a></li>
                    <li><a href="#tracking" class="text-gray-300 hover:text-[#10b981] transition">Track Order</a></li>
                    <li><a href="#contact" class="text-gray-300 hover:text-[#10b981] transition">Contact Us</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">Careers</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-[#10b981] mb-4">Services</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">Same-Day Delivery</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">Express Shipping</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">International Delivery</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">Business Solutions</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-[#10b981] transition">Special Handling</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-[#10b981] mb-4">Track Your Order</h3>
                <div class="mb-4">
                    <input type="text" placeholder="Enter Tracking Number" class="px-4 py-2 rounded-lg text-black w-full mb-2">
                    <button class="px-4 py-2 bg-[#10b981] text-white rounded-lg w-full hover:bg-[#0f9170] transition">Track</button>
                </div>
                <p class="text-gray-300 text-sm">Enter your tracking number to get instant updates on your package location.</p>
            </div>
        </div>
        <div class="pt-8 border-t border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p>&copy; 2025 Saree3. Powered by speed, humor, and a little bit of magic.</p>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-300 hover:text-[#10b981] transition">Privacy Policy</a>
                    <a href="#" class="text-gray-300 hover:text-[#10b981] transition">Terms of Service</a>
                    <a href="#" class="text-gray-300 hover:text-[#10b981] transition">FAQ</a>
                </div>
            </div>
            <p class="mt-4 text-sm italic text-gray-400">Warning: Our speed may cause extreme excitement! Proceed with caution.</p>
        </div>
    </div>
</footer>

<!-- Back to top button -->
<button id="back-to-top" class="fixed bottom-8 right-8 bg-[#10b981] text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition opacity-0 invisible">
    <i class="fas fa-arrow-up"></i>
</button>

<style>
    * {
        font-family: "Poppins", serif;
        scroll-behavior: smooth;
    }

    /*animation*/
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .animate-fadeIn {
        animation: fadeIn 1.5s ease-in-out;
    }

    .delay-200 {
        animation-delay: 200ms;
    }

    .delay-300 {
        animation-delay: 300ms;
    }

    @keyframes bounceSlow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes forwardSlow {
        0%, 100% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(-40px);
        }
    }

    .animate-forwardSlow {
        animation: forwardSlow 3s infinite ease-in-out;
    }

    .animate-bounceSlow {
        animation: bounceSlow 3s infinite ease-in-out;
    }

    /*end of animation*/

    /*Card Styling*/
    .flip-card {
        background-color: transparent;
        width: 200px;
        height: 264px;
        perspective: 1000px;
    }

    .title {
        font-size: 1.5em;
        font-weight: 900;
        text-align: center;
        margin: 0;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 1s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
        box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border: 1px solid #10b981;
        border-radius: 1rem;
    }

    .flip-card-front {
        background: linear-gradient(120deg, #0f766e 30%, #10b981 60%,
        #059669 80%, #064e3b 100%);
        color: white;
    }

    .flip-card-back {
        background: linear-gradient(120deg, #064e3b 20%, #059669 50%,
        #10b981 80%, #0f766e 100%);
        color: white;
        transform: rotateY(180deg);
    }

    .fa-brands {
        font-size: 30px;
        transition: all 500ms;
    }

    .fa-facebook:hover {
        color: #0866ff;
    }

    .fa-twitter:hover {
        color: #24a4f2;
    }

    .fa-youtube:hover {
        color: #fe080a;
    }

    .fa-whatsapp:hover {
        color: #2cd46b;
    }

    .fa-discord:hover {
        color: #5865f2;
    }

    /* From Uiverse.io by TISEPSE */
    .btn {
        position: relative;
        display: inline-block;
        padding: 10px 30px;
        border: 2px solid #fefefe;
        color: #fefefe;
        text-decoration: none;
        font-weight: 600;
        font-size: 18px;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 6px;
        left: -2px;
        width: calc(100% + 4px);
        height: calc(100% - 12px);
        background-color: #18181b;
        transition: 0.3s ease-in-out;
        transform: scaleY(1);
    }

    .btn:hover::before {
        transform: scaleY(0);
    }

    .btn::after {
        content: '';
        position: absolute;
        left: 6px;
        top: -2px;
        height: calc(100% + 4px);
        width: calc(100% - 12px);
        background-color: #18181b;
        transition: 0.3s ease-in-out;
        transform: scaleX(1);
        transition-delay: 0.5s;
    }

    .btn:hover::after {
        transform: scaleX(0);
    }

    .btn span {
        position: relative;
        z-index: 3;
    }

    button {
        background-color: transparent;
        text-decoration: none;
        border: none;
    }

    /* Counter Animation */
    .counter {
        display: inline-block;
        position: relative;
    }

    /* Back to top button */
    #back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }

    /* Mobile nav menu */
    .mobile-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 80%;
        max-width: 300px;
        height: 100vh;
        background-color: #202022;
        z-index: 100;
        transition: right 0.3s ease;
    }

    .mobile-menu.open {
        right: 0;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 99;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease;
    }

    .overlay.active {
        opacity: 1;
        visibility: visible;
    }
</style>

<script>
    // Back to top functionality
    const backToTopButton = document.getElementById('back-to-top');

    window.addEventListener('scroll', () => {
        if(window.scrollY > 300) {
            backToTopButton.classList.add('visible');
            backToTopButton.classList.remove('opacity-0', 'invisible');
        } else {
            backToTopButton.classList.remove('visible');
            backToTopButton.classList.add('opacity-0', 'invisible');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Counter animation on scroll
    const counters = document.querySelectorAll('.counter');
    const options = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                const counter = entry.target;
                counter.style.opacity = '1';
            }
        });
    }, options);

    counters.forEach(counter => {
        observer.observe(counter);
    });
</script>
</body>
</html>
