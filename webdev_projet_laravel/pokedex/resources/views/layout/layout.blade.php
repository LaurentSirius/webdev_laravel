<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Pokedex</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background-color: #c8cedb;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: "Open Sans", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            font-variation-settings: "wdth" 100;
        }

        main {
            flex: 1; /* occupe l'espace restant */
            padding: 5rem 1rem 3rem; /* espace pour header + footer */
            background-color: #ecf0f1;
        }

        .flex {
            display: flex;
        }

        .flex--center {
            justify-content: center;
            align-items: center;
        }

        .column {
            flex-direction: column;
        }
    </style>
</head>
    <body>
{{--        <x-header />--}}

        <main>
            @yield('content')
        </main>

{{--        <x-footer />--}}
    </body>
</html>
