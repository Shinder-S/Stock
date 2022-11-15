{include file="header.tpl"}

<form action="Category/{if $param === 'add'}add{else}edit/{$id}{/if}" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Name</label>
                <input name="name" {if isset($id)}value="{$category[0]->name}"{/if} type="text" class="form-control w-50" required>
                <label>Amount</label>
                <input name="amount" {if isset($id)}value="{$category[0]->amount}"{/if} type="number" class="form-control w-50" required>
            </div>
        </div>
        <div class="form-group">
            <label>Drop your photo</label>
            <input type="file" name="photo" id="imageToUpload">
        </div>
    <button type="submit" class="btn btn-primary mt-2 w-25">Save</button>
</form>
<button type="submit" class="btn btn-primary ms-2 mt-2 w-25 back-list">Back</button>

{include file="footer.tpl"}
