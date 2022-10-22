{if $assign}
<div class="panel panel-filled panel-c-info">
    <div class="panel-heading">
        The connection is established
    </div>
</div>
{elseif !$assign}
<div class="panel panel-filled panel-c-danger">
    <div class="panel-heading">
        Error to connect 
    </div>
</div>
{/if}
{if isset($db_correct)}
{if $db_correct > 0}
<div class="panel panel-filled panel-c-info">
    <div class="panel-heading">
        Data was added to the database successfully
    </div>
</div>
{else}
<div class="panel panel-filled panel-c-danger">
    <div class="panel-heading">
        There was a problem adding the data ({$db_correct})
    </div>
</div>
{/if}
{/if}

{if $asignados}<a href="../index.php" class="btn btn-w-md btn-success btn-block">Ir al inicio</a>{/if}
