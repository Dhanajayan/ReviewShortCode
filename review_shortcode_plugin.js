(function($) {

	var passed_data = reviews_data;
	var php_version = passed_data.php_version;


	tinymce.create('tinymce.plugins.Reviews', {

		init : function(ed, url) {

		/**	ed.addCommand('addreviews', function() {

				var rrate = prompt("what do you rating ?"),shortcode;

				if( rrate !== null){
					var rreact = prompt("what is your reaction? wow,bad,meh."),shortcode;
					rreact = rreact.toLowerCase();

					shortcode = '[reviews rating="' + rrate + '" reaction="' +rreact+ '"]';
				
					ed.execCommand('mceInsertContent', 0, shortcode);
				}else
				{
					alert("Invalid type");
				} 
			}); */

			ed.addCommand( 'addreviews', function() {

				ed.windowManager.open(

				{
					title: "Reviews Creator",
					file: url + '/review_dialog.html',
					width: 500,
					height: 600,
					inline: 1
				},

				{
					editor: ed,
					jquery: $,
					php_version: php_version
				}

				);
			});

			
			ed.addButton('addreviews', {
				title : 'Add Reviews',
				cmd : 'addreviews',
				image: url+'/pic.png'
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
				infourl : 'http://dhananjayan.me',
				version : "1.0"
			};
		}
		
	});

		tinymce.PluginManager.add('reviews', tinymce.plugins.Reviews);

})(jQuery);