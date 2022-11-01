{include file="header.tpl"}

<form class="p-3 mt-3" action="validate" method="post">
<img src="img/profile.jpg" width="150" height="80">
    <div class="form-field d-flex align-items-center">
        <span class="far fa-user"></span>
        <input type="email" name="email" id="loginUser" required>
        <label for="loginUser">Email</label>
        </div>
        <div class="form-field d-flex align-items-center">
        <span class="fas fa-key"></span>
        <input type="password" name="password" id="loginPassword" required>
        <label for="loginPassword">Password</label>
    </div>
    {if $error}
        <div class="alert alert-danger mt3">
            {$error}
        </div>
    {/if}
    <input type="submit" class="submit btn-dark" value="Enter">
</form>
</html>
{include file="footer.tpl"}