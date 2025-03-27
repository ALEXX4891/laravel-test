<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Регистрация
    </h1>
    <a href="/">Главная</a>
    <br>
    <a href="/login">Авторизация</a>
    <br>
    <form action="/register" method="POST">
        <!-- добавим scrf token: -->
        @csrf

        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}"><br>
        @error('name')
        <p style="color:red;">{{ $message }}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}"><br>
        @error('email')
        <p style="color:red;">{{ $message }}</p>
        @enderror


        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password"><br>
        @error('password')
        <p style="color:red;">{{ $message }}</p>
        @enderror


        <label for="password_confirmation">Подтвердите пароль:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>
        @error('password_confirmation')
        <p style="color:red;">{{ $message }}</p>
        @enderror


        <input type="submit" value="Зарегистрироваться">
    </form>
    </form>

</body>
</html>
