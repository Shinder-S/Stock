{include file="header.tpl"}

<form action="AlcoholContent/{if $param === 'add'}add{else}edit/{$id}{/if}" method="POST" class="my-4">
    <div class="col-9">
        <div class="form-group">
            <label>Name</label>
            <input name="name" {if isset($id)}value="{$alcohol_content[0]->name}"{/if} type="text" class="form-control w-50" required>
            <label>Brand</label>
            <input name="brand" {if isset($id)}value="{$alcohol_content[0]->brand}"{/if} type="text" class="form-control w-50" required>
            <label>Drinks</label>
            <select name="id_drink" class="form-select w-50" aria-label="Default select example" required>
                {foreach from=$drinks item=$drink}
                    <option value="{$drink->id_drink}" {if isset($id)&&(($alcohol_content[0]->id_drink)===($drink->id_drink))}selected{/if}>{$drink->name}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2 w-25">Save</button>
    <a type='button' class='btn btn-primary mt-2 w-25 back-list'>Back</a>
    
</form>

{include file="footer.tpl"}
