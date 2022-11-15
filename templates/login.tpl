{include file="header.tpl"}

<div class="mt-5 w-50 mx-auto login-wrapper">
    <form action="validate" method="POST" class="form">
        <h2>Login</h2>
        <div class="input-group">
            <input type="email" name="email" id="loginUser" required>
            <label for="loginUser">Email</label>
        </div>
        <div class="input-group">
            <input type="password" name="password" id="loginPassword" required>
            <label for="loginPassword">Password</label>
        </div>
        {if $error} 
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}
        <input type="submit" value="Enter" class="submit-btn">
    </form>
</div>

{include file="footer.tpl"}