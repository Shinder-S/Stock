{include file="header.tpl"}

{if isset($categories[0]->AlcoholContentName)}
  <h1 class="font-heading">Showing {$count} Categories from {$categories[0]->AlcoholContentName} Drink</h1>
{else}
  <h1 class="font-heading">Showing all Categories</h1>
{/if}

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Alcohol Content</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$categories item=$category}
        <tr>
          <a class="link" href='Category/show/{$category->id_category}' hidden>{$drink->id_alcohol_content}</a>
        </tr>
        <tr class="list">
            <td>{$category->name}</td>
            <td>{$category->amount}</td>
            <td>{$category->id_alcohol_content}</td>
            <td>{$category->photo}</td>
            <td>
              {if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
                <a href='Category/form/edit/{$category->id_category}' type='button' class='btn btn-success'><img src="./img/edit.png" alt="Logo" width="25" height="25"></a>    
                <a href='Category/confirm-delete/{$category->id_category}' type='button' class='btn btn-danger'><img src="./img/delete.png" alt="Logo" width="25" height="25"></a>
              {/if}
            </td>
        </tr>
    {/foreach}
  </tbody>
</table>

<button type="submit" class="btn btn-info mt-2 back-list">Back</button>

<a href='' type='button' class='btn btn-info mt-2'>Home</a>

{if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
  <a href='Category/form/add' type='button' class='btn btn-info mt-2 float-end me-5'>Add</a>
{/if}

{include file="footer.tpl"}