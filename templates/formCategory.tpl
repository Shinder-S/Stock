{include file="header.tpl"}

<form action="Category/{if $param === 'add'}add{else}edit/{$id}{/if}" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Name</label>
                <input name="name" {if isset($id)}value="{$category[0]->name}"{/if} type="text" class="form-control w-50" required>
                <label>Author</label>
                <input name="author" {if isset($id)}value="{$category[0]->brand}"{/if} type="text" class="form-control w-50" required>
                <label>Amount</label>
                <input name="amount" {if isset($id)}value="{$category[0]->amount}"{/if} type="text" class="form-control w-50" required>
                <label>Alcohol Content</label>
                <select name="id_alcoholContent" class="form-select mt-2 w-50" aria-label="Default select example" required>
                {foreach from=$alcoholContents item=$alcoholContent}
                    <option value="{$alcoholContent->id_alcoholContent}" {if isset($id)&&(($category[0]->id_alcoholContent)===($alcoholContent->id_alcoholContent))}selected{/if}>{$alcoholContent->name}</option>
                {/foreach}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Photo link</label>
            <input type="file" name="photo" id="imageToUpload">
        </div>
    <button type="submit" class="btn btn-primary mt-2 w-25">Save</button>
</form>
<button type="submit" class="btn btn-primary ms-2 mt-2 w-25 back-list">Back</button>

{include file="footer.tpl"}
