<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
    <link href="https://mastodon.social/@hspacehb" rel="me">
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app" class="flex flex-col min-h-screen">
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Zum Inhalt springen', 'sage') }}
      </a>

      @include('sections.header')

      <div class="grow flex pt-20 flex-wrap justify-center inner-content">
        <main id="main" class="main w-full lg:w-4/5 max-w-4xl p-2">
          @yield('content')
        </main>

        @hasSection('sidebar')
          <aside class="sidebar hidden lg:block w-1/5 max-w-sm p-2">
            <figure class="flex flex-row content-center justify-center items-center">
              <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo" class="container max-w-64">
            </figure>
            @yield('sidebar')
          </aside>
        @endif
      </div>

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
    @vite(['resources/js/theme.js'])
  </body>
</html>
