{include file="header.tpl"}

{if isset($alcoholContents[0]->DrinkName)}
  <h1 class="font-heading">Showing {$count} Alcohol Content from {$alcoholContents[0]->DrinkName} Drink</h1>
{else}
  <h1 class="font-heading">Showing all description of Alcohol Contents</h1>
{/if}


<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$alcoholContents item=$alcoholContent}
      <tr>
        <a class="link" href='Category/list/{$alcoholContent->name}' hidden>{$drink->id_alcohol_content}</a>
      </tr>
        <tr class="list">
            <td>{$alcoholContent->name}</td>
            <td>{$alcoholContent->brand}</td>
            <td>{$alcoholContent->id_drink}</td>
            <td float-end>
              {if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
                <a href='AlcoholContent/form/edit/{$alcoholContent->id_alcohol_content}' type='button' class='btn btn-success'><img src="./img/edit.png" alt="Logo" width="25" height="25"></a>    
                <a href='AlcoholContent/confirm-delete/{$alcoholContent->id_alcohol_content}' type='button' class='btn btn-danger'><img src="./img/delete.png" alt="Logo" width="25" height="25"></a>
              {/if}
            </td>
        </tr>
    {/foreach}
  </tbody>
</table>

<a type="submit" class="btn btn-info mt-2 back-list">Back</a>

<a href='' type='button' class='btn btn-info mt-2'>Home</a>

{if isset($smarty.session.IS_LOGGED)&&($smarty.session.IS_LOGGED)}
  <a href='Subclass/form/add' type='button' class='btn btn-info mt-2 float-end me-5'>Add</a>
{/if}

{include file="footer.tpl"}