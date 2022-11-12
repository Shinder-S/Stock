{include file="header.tpl"}

  <div class="card">
    <img id="category" src="{$category[0]->photo}" class="rounded mx-auto d-block" {*class="card-img-top"*} alt="{$category[0]->name}">
  
    <div class="text-center" class="card-body">
      <h5 class="card-title">{$category[0]->name}</h5>
      <p class="card-text">({$category[0]->brand})</p>
      <h6 class="card-title">Drink</h6>
      <p class="card-text">{$category[0]->id_drink} - {$category[0]->Drink} ({$category[0]->BrandDrink})</p>
      <h6 class="card-title">Alcohol Content</h6>
      <p class="card-text">{$category[0]->id_alcohol_content} - {$category[0]->alcohol_content} ({$category[0]->BrandAlcoholContent})</p>
      <a href="Category/list/{$category[0]->alcohol_content}" class="btn btn-primary">Go to {$category[0]->alcohol_content} list</a>
      <a href="Category" class="btn btn-primary">Return to Category</a>
    </div>
  </div>

{include file="footer.tpl"}