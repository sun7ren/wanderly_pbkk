<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">
    <x-header-welcome/>

    <main class="flex flex-col items-center justify-center max-w-6xl mx-auto px-6 lg:px-8 mt-12 lg:mt-20 gap-12 mb-20">
        <div class="flex flex-col gap-4 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-3 leading-tight text-[#B76A6A] dark:text-gray-300">
                Find <span class="italic text-red-800">time,</span> Make <span class="italic text-red-800">memories</span>.
            </h2>
            <p class="text-lg text-black dark:text-gray-400 lg:max-w-lg mx-auto">
                Plan your hangouts, coordinate schedules, and create unforgettable experiences with Wanderly.
            </p>
        </div>
        <div 
            class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)] bg-[#C4AB9F] dark:bg-white/5 rounded-lg py-4">
            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                @foreach(['image-1.png', 'image-2.png', 'image-3.png', 'image-4.png', 'image-5.png', 'image-6.png', 'image-7.png', 'image-8.png', 'image-9.png'] as $image)
                    <li class="flex-shrink-0 width-50">
                        <img src="{{ asset('images/Carousel-Home/' . $image) }}" class="w-40 h-50 object-cover rounded-lg grayscale">
                    </li>
                    
                @endforeach
            </ul>  
            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll" aria-hidden="true">
                @foreach(['image-1.png', 'image-2.png', 'image-3.png', 'image-4.png', 'image-5.png', 'image-6.png', 'image-7.png', 'image-8.png', 'image-9.png'] as $image)
                    <li class="flex-shrink-0">
                        <img src="{{ asset('images/Carousel-Home/' . $image) }}" class="w-40 h-50 object-cover rounded-lg grayscale">
                    </li>
                @endforeach
            </ul>              
        </div>
    </main>
    <section class="w-full w-screen flex flex-col md:flex-row items-center justify-center bg-[#B76A6A] px-6 md:px-16 py-16 md:py-24 gap-12">
    <div class="flex-1 flex justify-center">
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-200 max-w-sm w-full p-6 relative overflow-hidden">
        <div class="space-y-6">
            <div class="chat chat-start" data-aos="fade-right" data-aos-delay="100">
            <div class="chat-bubble bg-red-400 text-white">
                Let's hangout for lunch this Friday :D
            </div>
            </div>

            <div class="chat chat-end" data-aos="fade-left" data-aos-delay="400">
            <div class="chat-bubble bg-gray-200 text-gray-800">
                Shoot! I can't :< can you do dinner?
            </div>
            </div>

            <div class="chat chat-start" data-aos="fade-right" data-aos-delay="700">
            <div class="chat-bubble bg-red-400 text-white">
                No :/ I can't do dinner..
            </div>
            </div>

            <div class="chat chat-end" data-aos="fade-left" data-aos-delay="1000">
            <div class="chat-bubble bg-gray-200 text-gray-800">
                It's been so longgg since I've seen youu T^T
            </div>
            </div>

            <div class="chat chat-start" data-aos="fade-right" data-aos-delay="1300">
            <div class="chat-bubble bg-red-400 text-white">
                I know!! Ugh our schedules keep clashing :<
            </div>
            </div>
        </div>

        <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-red-400/10 via-transparent to-red-400/10 blur-2xl -z-10"></div>
        </div>
    </div>

    <div class="flex-1 text-white md:pl-10 text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Is this <span class="italic text-red-200"> your </span> <br class="hidden md:block" /> current situation?
        </h1>
        <p class="text-lg md:text-xl mb-8 max-w-md" data-aos="zoom-in">
        Busy schedules, constant rescheduling, and missed connections. it’s tough to stay close with friends. Let’s make hanging out simple again.
        </p>
    </div>
    </section>
    <section class="w-full w-screen flex flex-col md:flex-row items-center justify-center bg-[#D9D6CB] px-6 md:px-16 py-16 md:py-24 gap-12">
        <div class="flex-1 md:pl-10 text-center md:text-right">
            <h1 class="text-4xl text-gray-500 md:text-5xl font-bold mb-6 text-left">
                Worry <span class="italic text-gray-600"> not! </span>
            </h1>
            <p class="text-lg text-gray-600 md:text-xl mb-8 max-w-md text-left" data-aos="fade-right">
            Wanderly allows users to create groups, add members, and input their individual availability.
            The data is then processed to determine overlapping free times, helping the group identify the best schedule for their shared activity. 
            </p>
            <p class="text-lg text-gray-600 md:text-xl mb-8 max-w-md text-left" data-aos="fade-right">It eliminates the common back-and-forth confusion that comes with planning hangouts through chats or messages.</p>
        </div>
        <div class="flex-1 text-white md:pl-10 md:text-right">
            <img src="{{ asset('images/dark-light.svg') }}" alt="Logo" class="h-50">
        </div>
    </section>

<x-footer-home/>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1200,
    easing: 'ease-in-out',
    once: false,
  });
</script>

</body>
</html>
