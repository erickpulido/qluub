$.ajax({
    url: "/api/products",
    method: "GET",
    dataType: "JSON"  
})
.done(function(response){
    let products = response.data
    
    $.each(products, function(key, item){
        $("#products-container").append(
            `
            <div class="col-sm pb-4 pt-4">
                <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">${item.name}</h5>
                    <p class="card-text">${item.details}</p>
                    <a href="#" class="btn btn-primary btn-sm">Añadir al carrito</a>
                </div>
                </div>
            </div>
            `
        )        
    })
})


