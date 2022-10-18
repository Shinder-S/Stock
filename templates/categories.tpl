{include file="header.tpl"}

<body>
<form action='update/{$drink->id}' method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="brand" placeholder="Brand">
    <input type="number" name="amount" placeholder="Amount">
    <select name="id_category">
    {foreach from=$list_categories item=category}
        <option value="{$category->id_category}">{$category->category}</option>
    {/foreach}
    </select>
    <button type="submit">Edit One</button>
</form>
{include file="footer.tpl"}