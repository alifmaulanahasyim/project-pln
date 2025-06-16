<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='img/favicon.ico' rel='shortcut icon'>
</head>
<body class="bg-gray-100">
    <x-header title="Welcome to PLN"/>
    <x-isi :visionMission="$visionMission" />  <!-- Pass the $visionMission variable to the component -->
    <x-footer />
</body>
</html>
