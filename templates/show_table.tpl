{include file="header.tpl"}
<ul class="list-group">
{foreach from=$list_drinks item=drink}
    <li class="list-group-item">{$drink->name}: {$drink->brand} - <a href='update/{$drink->id}'>Edit</a> - <a href='delete/{$drink->id}'>Delete</a></li>
{/foreach}
</ul>

<form action="insert" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="brand" placeholder="Brand">
    <input type="number" name="amount" placeholder="Amount">
    <select name="id_category">
    {foreach from=$list_categories item=category}
        <option value="{$category->id_category}">{$category->id_category}</option>
    {/foreach}
    </select>
    <button type="submit">Create New</button>
</form>
{include file="footer.tpl"}