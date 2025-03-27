<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Главная страница
    </h1>

    @auth
    <form action="/loguot" method="post">
        @csrf
        <button type="submit">Выйти</button>
    </form>
    @else
    <a href="/register">Регистрация</a>
    <br>
    <a href="/login">Авторизация</a>
    @endauth

</body>
</html>
