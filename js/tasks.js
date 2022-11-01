"use strict"

let list = document.querySelectorAll('list');
let links = document.querySelectorAll('.link');

for(let i = 0; i < list.length; i++){
    list[i].addEventListener('click', function(e){
        let window = links[i].href;
        window.location.href = window;
    });
}

let back_btn = document.querySelectorAll('.list-back');
for(let i = 0; i < back_btn.length; i++){
    back_btn[i].addEventListener('click', function(e){
        history.back();
    });
}

let back_btn_two = document.querySelectorAll('.list-two-back');
for(let i = 0; i < back_btn_two.length; i++){
    back_btn_two[i].addEventListener('click', function(e){
        history.go(-2);
    });
}