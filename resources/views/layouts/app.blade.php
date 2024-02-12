<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:x-transition="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate(true) !!}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-G0TL352WKG"></script>
    <script defer>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-G0TL352WKG');
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    @vite('resources/css/app.css')
    @stack('cdn')
    @stack('style')
    @laravelPWA
    <script defer type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=61457a1f13073f0019a43554&product=sticky-share-buttons'
        async='async'></script>
</head>

<body class="overscroll-none bg-white dark:bg-black">

    <div class="sharethis-sticky-share-buttons"></div>

    <header class="body-font fixed top-0 z-50 w-full bg-gray-100 text-gray-600 dark:bg-gray-900">
        <div x-data="{ open: false }" class="container mx-auto flex flex-col flex-wrap items-center py-2 md:flex-row">
            <div class="title-font flex items-center font-medium text-gray-900 md:mb-0">
                <a href="https://www.chengkangzai.com">
                    <img src="{{ asset('favicon.ico') }}" alt="Go to Profile Page" class="w-8" loading="lazy"
                        width="32" height="32" />
                </a>
                <a href="{{ route('pandemic.index') }}">
                    <span class="ml-3 text-xl dark:text-white">{{ __('COVID Dashboard') }}</span>
                </a>
                <button @click="open = !open" aria-label="Toggle Drop Down"
                    class="focus:shadow-outline absolute right-2 rounded-lg text-black focus:outline-none dark:text-white md:hidden">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6 text-black dark:text-white">
                        <path x-show="!open" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z">
                        </path>
                        <path x-show="open" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="hidden flex-grow flex-col pb-4 dark:text-white md:flex md:flex-row md:justify-end md:pb-0">
                <a href="{{ route('pandemic.index') }}"
                    class="focus:shadow-outline text-bold @if (request()->is('pandemic')) ) bg-gray-50 dark:bg-gray-800 font-bold @endif cursor-pointer rounded-lg px-2 py-2 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('pandemic.state') }}"
                    class="focus:shadow-outline text-bold @if (request()->is('pandemic/state')) ) bg-gray-50 dark:bg-gray-800 font-bold @endif cursor-pointer rounded-lg px-2 py-2 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ __('State View') }}
                </a>
                <a href="{{ route('pandemic.clusters') }}"
                    class="focus:shadow-outline text-bold @if (request()->is('pandemic/clusters')) ) bg-gray-50 dark:bg-gray-800 font-bold @endif cursor-pointer rounded-lg px-2 py-2 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ __('Clusters') }}
                </a>
                <a href="{{ route('pandemic.vaccination') }}"
                    class="focus:shadow-outline text-bold @if (request()->is('pandemic/vaccination')) ) bg-gray-50 dark:bg-gray-800 font-bold @endif cursor-pointer rounded-lg px-2 py-2 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ __('Vaccination') }}
                </a>
                <a href="{{ filament()->getLoginUrl() }}"
                   class="focus:shadow-outline text-bold cursor-pointer rounded-lg px-2 py-2 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ __('View Backend') }}
                </a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" aria-label="Drop Down trigger"
                        class="text-bold text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-2 py-2 text-left text-black hover:bg-gray-200 hover:text-black hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:bg-transparent dark:text-white dark:hover:bg-gray-600 dark:hover:text-white dark:focus:bg-gray-600 dark:focus:text-white md:mt-0 md:ml-4 md:inline md:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ __('Select Language') }}</span>
                        <svg viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="mt-1 ml-1 inline h-4 w-4 transform fill-current text-black transition-transform duration-200 dark:text-white md:-mt-1">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="rounded-md bg-white px-2 py-2 shadow dark:bg-gray-800">
                            <a class="@if (app()->getLocale() == 'en') bg-gray-200 dark:bg-gray-600 @endif focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:bg-transparent dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:bg-gray-600 dark:focus:text-white md:mt-0"
                                href="{{ route('setLocale', 'en') }}">English</a>
                            <a class="@if (app()->getLocale() == 'zh') bg-gray-200 dark:bg-gray-600 @endif focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:bg-transparent dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:bg-gray-600 dark:focus:text-white md:mt-0"
                                href="{{ route('setLocale', 'zh') }}">简体中文</a>
                            <a class="@if (app()->getLocale() == 'ms') bg-gray-200 dark:bg-gray-600 @endif focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none dark:bg-transparent dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:bg-gray-600 dark:focus:text-white md:mt-0"
                                href="{{ route('setLocale', 'ms') }}">Bahasa Malaysia</a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto mt-16 w-full bg-white text-center dark:bg-black">
        @yield('content')
    </main>

    @yield('footer')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        Toastify({
            text: '{{__('This project stopped updating data in 2024-02-14, if you think this project is useful and want to continue this project, please contact me')}}',
            duration: 5000,
            gravity: "top",
            style:{
              "max-width": "420px",
            },
            offset: {
                x: 30,
                y: 44,
            },
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    </script>
    @stack('script')
</body>

</html>
