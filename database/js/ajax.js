$(".database").submit(function(ev) {
    ev.preventDefault();
    $.post("index.php", $(this).serialize(), function(data){
        console.log(data);
        $(".errors").html(data).hide().show("slow");
    });
});