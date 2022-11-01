{include file="header.tpl"}

<h1 class="font-heading">Showing {$count} Drinks</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$drinks item=$drink}
      <tr>
        <a class="link" href='AlcoholContent/list/{$drink->name}' hidden>{$drink->id_drink}</a>
      </tr>
      <tr class="list">
        <td>{$drink->Name}</td>
        <td>{$drink->Brand}</td>
        <td>{$drink->Amount}</td>
        {if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
          <td class="d-flex p-2">
            <a href='Drink/form/edit/{$drink->id_drink}' type='button' class='btn btn-success me-1'><img src="./img/edit.png" alt="Logo" width="25" height="25"></a>    
            <a href='Drink/confirm-delete/{$drink->id_drink}' type='button' class='btn btn-danger'><img src="./img/delete.png" alt="Logo" width="25" height="25"></a>
          </td>
        {/if}
        
      </tr>
    {/foreach}
  </tbody>
</table>

<button type="submit" class="btn btn-info back-list">Back</button>

<a href='' type='button' class='btn btn-info '>Home</a>

{if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
  <a href='drink/form/add' type='button' class='btn btn-info float-end me-3'>Add</a>
{/if}

{include file="footer.tpl"}
