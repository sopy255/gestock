$(".deleteItem").click(function (e) {
    event.preventDefault();
    if(confirm('vouler vous vraiment suprimer cet element ?')){
        window.location = $(e.target).parent()[0].href;
    }
});