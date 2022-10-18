{include file="header.tpl"}

<body>
<form class="p-3 mt-3" action="sessionStart" method="post">
    <div class="form-field d-flex align-items-center">
        <span class="far fa-user"></span>
        <input type="text" name="user" placeholder="User">
    </div>
    <div class="form-field d-flex align-items-center">
        <span class="fas fa-key"></span>
        <input type="password" name="pass" placeholder="Password">
    </div>
    <button class="btn btn-dark" value="login">Login</button>
</form>
</body>
</html>
{include file="footer.tpl"}