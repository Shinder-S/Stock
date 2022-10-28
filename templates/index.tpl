<!DOCTYPE html>
<html>
  <head>
    <base href="//localhost/proyecto/Web2/">
    <meta charset="utf-8">
    <link href="styles/css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <title>FutApp</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Menu</span>
                </button>
                <a class="navbar-brand home" href="">DrinkApp</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar2">
                <ul class="nav navbar-nav navbar-right ">
                    {if $user['credential']>1}
                    <li><a>User : {$user['id']}</a></li>
                    {/if}
                    {if $user['credential']==1}
                    <li><a href="" class="login">login</a></li>
                    {else}
                    <li><a href="" class="exit">Exit</a></li>
                  {/if}
                    <li><a href="" class="drinks">Drinks</a></li>
                    <li><a href="" class="description">Description</a></li>
                    {if $user['credential']>1}
                    <li><a href="" class="addDrink">addDrink</a></li>
                    {/if}
                    {if $user['credential']>1}
                    <li><a href="" class="addDrink">addDrink</a></li>
                    {/if}
                    {if $user['credential']==2}
                    <li><li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin<span class="caret"></span>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                        <li><a href="" class="adminDrinks">Drinks</a></li>
                        <li><a href="" class="adminDescription">Description</a></li>
                        <li><a href="" class="adminUsers">Users</a></li>
                      </ul>
                    </li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
  </body>
  <script src="styles/js/jquery.js"></script>
  <script src="styles/js/bootstrap.min.js"></script>
  <script src="http://momentjs.com/downloads/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.1.3/mustache.js"></script>
  <script src="js/movimientos.js"> </script>
</html>
