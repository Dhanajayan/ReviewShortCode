(function() {
	tinymce.create('tinymce.plugins.reviews', {
		init : function(ed, url) {
			ed.addButton('reviews', {
				title : 'Reviews',
				image: url+'/review-icon.png',
				onclick : function() {

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : "Reviews",
				author : 'Dhananjayan',
				authorurl : 'http://dhananjayan.me',
				infourl : '',
				version : "1.0"
			};
		}
		
	});

		tinymce.PluginManager.add('Reviews', tinymce.plugins.reviews);

})();