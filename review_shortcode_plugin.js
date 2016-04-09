(function() {
	tinymce.create('tinymce.plugins.Reviews', {

		init : function(ed, url) {

			ed.addCommand('addreviews', function() {

				var rrate = prompt("what do you rating ?"),shortcode;

				if( rrate !== null){
					var rreact = prompt("what is your reaction ?"),shortcode;
					rreact = rreact.toLowerCase();

					shortcode = '[reviews rating="' + rrate + '" reaction="' +rreact+ '"]';
				}

		//		if(rreact !== null) {

				//rrate = rrate.toLowerCase();

					//var rrate = prompt("rate?"), shortcode;
					//var rreact = prompt("emoji?"), shortcode;

					

			//		shortcode = '[review]';

					ed.execCommand('mceInsertContent', 0, shortcode);
				//}
			/**	else
				{
					alert("Invalid type");
				} */
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

})();