<div class="container" >
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th>Name</th>
        <th>Brand</th>
        <th>Amount</th>
      </tr>
      {foreach from=$drinks item=drink}
      <tr>
        <td>{$drink['name']['brand']}</td>
        <td><button type="button" class="editDrink btn btn-success"  data-drinkid="{$drink['id_drink']}">Edit</button></td>
        <td><button type="button" class="deleteDrink btn btn-warning" data-drinkid="{$drink['id_drink']}">Delete</button></td>
      </tr>
      {/foreach}
    </table>
    <button type="button" class="addDrink btn btn-primary">Add</button>
  </div>
</div>
