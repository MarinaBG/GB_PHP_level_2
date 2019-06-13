class ProductBlock {
    constructor(){
        this.showMore = document.querySelector('.show_more');
        this.count = parseInt(this.showMore.getAttribute('count'));
        this.itemInDB = 0;
        this.setEventListener();
    }
    request(url, data) {
        $.ajax({
            method: "POST",
            url: url,
            dataType: 'json',
            data: data,
            context: this,
            error: function (request, status, error) {
                console.log(error);
            },
        }).done(function(response) {
            if (response) {
                document.querySelector('div.items').innerHTML+=response[0];
                this.changeCount(response[1]);
                this.checkIsDisable(response[2]);
                if (window.cart) {
                    window.cart.setEvents();
                }
            } else {
                console.log(error);
            }
        });
    }
    setEventListener(){
        let self = this;

        self.showMore.addEventListener("click", function(event) {        
            self.request("c/C_Show_more_products.php", "count="+self.count);            
        });        
    }
    changeCount(len) {
        let self = this;
        self.count+=len;
        self.showMore.setAttribute('count', self.count);
    }
    checkIsDisable(response) {
        let self = this;
        if (response == 0) {
            self.showMore.setAttribute("style", "display:none");
        }
    }
    
    // displayMessage(){
    //     $('#dialog').dialog({
    //         width: 400,
    //         height: 220,
    //         modal: true,
    //         autoOpen: false,
    //         buttons: {
    //             OK: function(){
    //                 $(this).dialog('close');
    //             }
    //         }
    //     });
    //     $('#dialog').dialog('open');
    // }
}

let productBlock = new ProductBlock();