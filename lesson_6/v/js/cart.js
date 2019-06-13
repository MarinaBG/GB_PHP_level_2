let Api = {
	load: 'c/C_Cart.php?method=get',
	add: 'c/C_Cart.php?method=add',
	clear: 'c/C_Cart.php?method=clear'
};
class Cart {
	constructor() {
		this.request(Api.load);
		this.setEvents();
	}
	onAdd(event){
		event.preventDefault();
		let id = parseInt($(event.currentTarget).attr('data-id'));
		let category = $(event.currentTarget).attr('category');

		if (id) {
			this.request(Api.add, {id: id, quantity: 1, category: category});
		}
	}
	onRemove(event){
		event.preventDefault();
		let id = parseInt($(event.currentTarget).attr('data-id'));

		if (id) {
			this.request(Api.remove, {id: id});
		}
	}
	onClear() {
		event.preventDefault();
		this.request(Api.clear);		
	}
	setEvents() {
		$('.btn-add').on('click', this.onAdd.bind(this));
		$('.btn-clear').on('click', this.onClear.bind(this));
	}
	process(url, response){
		if (response) {
			switch (url) {
				case Api.load:
				case Api.add:
				case Api.clear:
					$('.cart_items_count').html(response[0]);
					$('.total_price').html(response[1]);
					break;
			}
		}
	}
	request(url, data) {
		$.get({
			url: url,
			data: data,
			dataType: 'json',
			context: this,
			success: function(response) {
				this.process(url, response);
			},
			error: function(error){
				if (url == Api.load) {
					console.log(error.responseText);
				}
				else {
					console.log(error.responseText);
				}
			}
		});
	}
};

$(document).ready(function(){
	window.cart = new Cart();
});