$("#btn-login").on({
    click: function(){
        $.ajax({
            url: "/api/authenticate",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: "POST",
            data: $("form").serializeArray(),
            dataType: "JSON"
        })
        .done(function(response){
            
        })
    }
})

$("#btn-register").on({
    click: function(){
        $.ajax({
            url: "/api/users",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: "POST",
            data: $("form").serializeArray(),
            dataType: "JSON"
        })
        .done(function(response){
            
        })
    }
})

$("#btn-logout").on({
    click: function(){
        $.get("sanctum/csrf-cookie")
        .then(response => {
            $.ajax({
                url: "/api/logout",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: "POST",
                dataType: "JSON"
            })
            .done(function(response){
                
            })   
        })
          
    }
})