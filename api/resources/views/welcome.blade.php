<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- form to enter 2 value and sum them, then print the resutl --}}
    <form action="/add" method="POST">
        @csrf
        <input type="text" name="num1" placeholder="Enter first number">
        <input type="text" name="num2" placeholder="Enter second number">
        <button type="submit">Sum</button>
    </form>

    {{-- print all the result --}}
    
    
</body>
</html>