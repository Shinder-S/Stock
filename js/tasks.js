"use strict"

document.querySelector("#form-stock").addEventListener('submit', addDrink);


function getDrinks(){
    fetch("api/drinks")
    .then(response => response.json())
    .then(drinks => {
        app.drinks= drinks;
    })
    .catch(error => console.log(error));
}

function addDrink(e){
    e.preventDefault();
    let data = {
        name: document.querySelector("input[name=name]").value,
        brand: document.querySelector("input[name=brand]").value,
        amount: document.querySelector("input[name=amount]").value,
        ended: document.querySelector("input[name=ended]").cheked
    }

    fetch('api/drinks', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response => {
        getDrinks();
    })
    .catch(error => console.log(error));
}

getDrinks();