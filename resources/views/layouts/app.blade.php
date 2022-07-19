<!--★共通レイアウト--->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        
        <!--レスポンシブ対応-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!--タイトルと説明文-->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta description="弓道場MAPは、全国の弓道場を探せるアプリです。">
        
        <!-- Styles(CSSのファイル) -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/dojo.css') }}" rel="stylesheet">
        
        <!--fontawesome-->
        <script src="https://kit.fontawesome.com/34ca28993e.js" crossorigin="anonymous"></script>
        
    </head>
    
    <body>
        <div id="app">
            
            <header>
                @component('components.header')
                @endcomponent
            </header>
            
            <main>
                @yield('content')
            </main>
            
            <footer>
                @component('components.footer')
                @endcomponent
            </footer>
            
            
        </div>
        
        <!-- Scripts（jsやfontawesome使用する際） -->
        <script src="{{ secure_asset('js/app.js') }}"></script>
        <script src="{{ secure_asset('js/dojocreate.js') }}"></script>
    </body>
</html>