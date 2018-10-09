function Media(options, data){

	this.defaults = {
		item: '.item',
		modal: '#myModal',
		multiselect: false,
		media: '.section',
		type: false,
		id: false
	};
	this.html = null;
	this.frame = false;

	this.options = {
		item: options.item || this.defaults.item,
		modal: options.modal || this.defaults.modal,
		multiselect: options.multiselect || this.defaults.multiselect,
		url: options.url,
		media: options.media || this.defaults.media,
		type: options.type || this.defaults.type,
		id: options.id || this.defaults.id
	};

	this.run = function(opp = {init: function(){}}){
		var options = this.options;
		this.opp = opp;
		var that = this;
		$.ajax({
			url: options.url,
			data: { id: options.id, type: options.type  }
		}).done(function(data){
			that.html = data;
			that.open();
		}).fail(function(data){
			
		});
	};

	this.open = function(){
		var options = this.options;
		$(options.modal).modal().html(this.html);
		this.select(options);
		this.confirm(options, this.opp.init);
	}

	this.select = function(options) {
		$(options.media).find('.item').click(function(){
			if ($(this).hasClass('selected')) {
				$(this).toggleClass('selected');
				return;
			}
			if (!options.multiselect) {
				$(options.media).find('.selected').removeClass('selected');
			}

			$(this).addClass('selected');
		});	
	}

	this.confirm = function(options, init){
		var that = this;
		$('[rel="confirm"]').click(function(){

			if ($(options.media).find('.selected').length){
				var data = [];
				$(options.media).find('.selected').each(function(index){
					data.push($(this).data('attr'));
				});
			}
			that.html = $(options.modal).html();
			init(data);
		})
	}

	this.run(data);
}