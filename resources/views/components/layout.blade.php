<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Registration</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 dark:bg-slate-800">

    <x-navbar />

    @if (session('status'))
    <div class="p-4 mb-4 mt-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{session('status')}}</span> 
      </div>
    @endif


    <div class="max-w-6xl mx-auto">
        {{$slot}}
    </div>

    @vite('resources/js/app.js')
</body>
</html>
