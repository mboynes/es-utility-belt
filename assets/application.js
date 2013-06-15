$(function(){
	$('#view_wrapper').on('click','input:submit',function(e){
		e.preventDefault();
		$form = $(this).parents('form');
		button = ($(this).attr('name') ? '&' + $(this).attr('name') + '=' + $(this).val() : '');
		$.post(PATH+'ajax.php', $form.serialize()+button, function(data){
			if('<html>'==data.body.substr(0,6))
				$('#'+$form.data('response')+'').html(data.body.replace(/<\/?html>/,'')).fadeIn();
			else
				$('#'+$form.data('response')+'').html('<pre class="well">'+data.body+'</pre>').fadeIn();
			if ( data.request_history )
				$('#request_history').html( data.request_history );
		}, 'json').fail(function(jqXHR) {
			$('#'+$form.data('response')+'').html('<pre class="well">'+jqXHR.responseText+'</pre>').fadeIn();
		});
	});
	$('#view_wrapper').on('click','.reload',function(e){
		e.preventDefault();
		page = $(this).data('page');
		$('#'+page).remove();
		get_hash(page);
	});
	$("#response").ajaxError(function(e, jqxhr, settings, exception) {
		$('#response').html('<pre class="well">'+exception+' ('+jqxhr.status+")\n"+jqxhr.responseText+'</pre>').fadeIn();
	});
	$('#change_view').click(function(e) {
		e.preventDefault();
		$('#view_wrapper').toggleClass('row');
		$('.view-container').toggleClass('span6');
		if ($('textarea.span12').length)
			$('textarea.span12').removeClass('span12').addClass('span6');
		else
			$('textarea.span6').removeClass('span6').addClass('span12');
	});

	get_hash();

	$('#request_history').on('click', '.history', function(e) {
		e.preventDefault();
		var id = $(this).data('id');
		if ( req_history && req_history[id] ) {
			$('#request_url').val( req_history[id].url );
			$('#request_body').val( req_history[id].body );
		}
	});

	$( '.show_toggle' ).click(function(event) {
		event.preventDefault();
		$this = $( this );
		$el = $( $this.attr( 'href' ) );
		if ( $el.is( ':visible' ) ) {
			$el.slideUp();
			$this.html( $this.html().replace( 'Hide ', 'Show ' ) );
			$this.find( '.caret' ).removeClass( 'caret-up' );
		} else {
			$el.slideDown();
			$this.html( $this.html().replace( 'Show ', 'Hide ' ) );
			$this.find( '.caret' ).addClass( 'caret-up' );
		}
	});
});
var hash;
function get_hash(h) {
	if (!h || typeof h != 'string') {
		// hash = e.newURL.split('#').pop();
		hash = window.location.hash.substr(1);
		if (!hash) hash = 'home';
	}
	else {
		hash = h;
		if (window.location.hash != '#' + hash ) {
			window.location.hash = '#' + hash;
			return;
		}
	}
	$('#view_wrapper > div').hide();
	if ($('#'+hash).length) {
		$('#'+hash).fadeIn('fast');
	}
	else {
		$.get(PATH+'index.php?page='+hash, function(data){
			$('#view_wrapper').append(data);
		});
	}
	$('.active').removeClass('active');
	$('a[href="#'+hash+'"]').parent().addClass('active');
}
window.onhashchange = get_hash;
