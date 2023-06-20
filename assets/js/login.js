$(document).ready(function(){
	$('#form-login').on('submit', function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#form-error').hide().text('');
		var data = new FormData(this);
		fetch('index.php', {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
			body: new URLSearchParams(data).toString(),
		}).then( r => r.json() ).then( json => {
			if( json.success == true ){
				location.reload();
			}
			if( json.error ){
				$('#form-error').text( json.error ).show();
			}
		});
		return false;
	});
	
});
