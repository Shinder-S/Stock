<!DOCTYPE html>
<html lang="en">
<head>
    <base href='{BASE_URL}' >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <ul class="navbar-nav">
        <img src="./img/on-the-rocks.jpg" alt="logo" width="150" height="80">
        <li class="nav-item dropdown">
            <a class="nav-link" href=" ">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Options</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Drink">Drink</a></li>
                <li><a class="dropdown-item" href="AlcoholContent">AlcoholContent</a></li>
                <li><a class="dropdown-item" href="Category">Category</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="descriptions">Descriptions</a>
        </li>
    </ul>
    {if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
        <button class="btn btn-dark" type="submit"><a class="nav-link active" href="logout">Logout</a></button>
    {else}
        <button class="btn btn-dark" type="submit"><a class="nav-link active" href="login">Login</a></button>
    {/if}
</nav>
