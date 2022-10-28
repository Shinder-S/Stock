<div class="container">
    <div class="table-container">
        <table class="table table-row">
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Amount</th>
        </tr>
        {foreach from=$drinks item=drink}
        <tr>
            <td>{$drink['drink_1']}</td>
            <td>{$drink['drink_2']}</td>
            <td>{$drink['drink_3']}</td>
            <td>{$drink['drink_4']}</td>
            <td>{$drink['id']}</td>
            <td><button type="button" class="editDrink btn btn-success"  data-drinkid="{$drink['id']}">Edit</button></td>
            <td><button type="button" class="deleteDrink btn btn-warning" data-drinkid="{$drink['id']}">Delete</button></td>
        </tr>
        {/foreach}
        </table>
        <button type="button" class="add btn btn-primary">Add</button>
    </div>
</div>