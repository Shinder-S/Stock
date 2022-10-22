{include file="header.tpl"}

<form action='view/{$drink->id}' method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" value="{$drink->name}">
    <input type="text" name="brand" placeholder="Brand" value="{$drink->brand}">
    <input type="number" name="amount" value="{$drink->amount}">
    <select name="id_category">
    {foreach from=$list_categories item=category}
        <option value="{$category->id_category}" {if $category->id_category == $drink->id}selected{/if}>{$category->category}</option>
    {/foreach}
    </select>
    <button type="submit" class="btn btn-dark">Update</button>
</form>

{include file="footer.tpl"}