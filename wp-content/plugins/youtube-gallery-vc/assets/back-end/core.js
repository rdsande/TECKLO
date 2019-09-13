(function($){
	$(document).ready(function(e){
		$('.sample-data-youtube-video-gal').off('.clicksample-data-youtube-video-gal').on('click.clicksample-data-youtube-video-gal', function(){
			var $this = $(this);
			$this.addClass('disable-button');
			$('#loading-import-sample-data').addClass('active-sample');	
			
			console.log('Process...');
			
			var $newParamsRequest = {'addsample':'yes', action:'youtube_gallery_setupsampledata'};
			var $ajaxGetpost = $this.attr('data-url-ajax');
			$.ajax({
				url:		$ajaxGetpost,						
				type: 		'POST',
				data:		$newParamsRequest,
				dataType: 	'html',
				cache:		false,
				success: 	function(data){
					$('#link-to-newpageconfig .tc-information').append(data);
					console.log('Done...');
					setTimeout(function(){
						$('.tc-information').addClass('active-infor');
						$('#loading-import-sample-data').removeClass('active-sample');
					}, 2000);
				},
				error:		function(){
					$this.removeClass('disable-button');
					$('.tb-infor-error').addClass('active-infor');	
					$('#loading-import-sample-data').removeClass('active-sample');	
					console.log('Error...');												
				},
			});	
		});
	});	
}(jQuery));