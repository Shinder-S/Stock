{include file="header.tpl"}

<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
        {if isset($photo)&&!empty($photo)}
            You can't create or update a record, with that image extension.
        {else}
            You can't create or update a record without a photo.
        {/if}
    </div>
    <p class="mb-0"><button type="button" class="btn btn-outline-danger back-list ms-2">Back</button></p>
</div>

{include file="footer.tpl"}