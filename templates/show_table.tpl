{include file="header.tpl"}

    {foreach from=$list_drink item=drink}
    {if $drink-> ended eq 1}
        <strike><li>{$drink->title}: {$drink->description}</li></strike>
    {else}
        <li>{$drink->title}: {$drink->description} - <a href='ended/{$drink->id}'>End</a> - <a href='delete/{$drink->id}'>Delete</a></li>
    {/if}

    {/foreach}

    <form action="insert" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="number" name="stock"  max="10">
        <input type="checkbox" name="ended" id="ended">
        <input type="file" name="image" id="">
        <input type="submit" value="insert">
    </form>

    </body>
</html>