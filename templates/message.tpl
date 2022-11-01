{include file="header.tpl"}

<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
  {if isset($id)&&!empty($id)}
    You have sucesfully edit the last {$name} register
  {else}
    You have sucesfully add new register for {$name}
  {/if}
  </div>
</div>

<p class="mb-0"><button type="button" class="btn btn-outline-success back-2-list w-25 mt-2">Back</button></p>

{include file="footer.tpl"}