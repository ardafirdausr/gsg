<div class="chat-panel-container">
	<div id="chat-panel-main" class="chat-panel-main">
		<div class="chat-container">
			<div class="message-history">
				<div id="chat-messages" class="chat-messages">
					<div class="incoming-message">
						<img src="https://ptetutorials.com/images/user-profile.png" alt="admin">
						<div class="received-message">
							<p>Hallo. Ada Yang Bisa Saya Bantu ? </p>
							<span class="time-date">{{date('d M | h:i')}}</span></div>
					</div>
				</div>
			</div>
			<div class="type-message">
				<div class="input-container">
					<textarea
						class="form-control chat-message"
						row="3"
						maxlength="255"
						name="chat-message"
						id="chat-message"
						required></textarea>
					<button id="chat-send-message" class="chat-send-button" type="button">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 535.5 535.5" style="enable-background:new 0 0 535.5 535.5;" xml:space="preserve"> <g><g id="send"><polygon points="0,497.25 535.5,267.75 0,38.25 0,216.75 382.5,267.75 0,318.75 		"/></g></g></svg>
					</button>
					<button id="chat-send-image" class="chat-send-button" type="button">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.623 52.623" style="enable-background:new 0 0 52.623 52.623;" xml:space="preserve"><path d="M14.371,52.623c-3.535,0-6.849-1.368-9.332-3.852s-3.852-5.797-3.852-9.332c0-3.534,1.368-6.848,3.852-9.331L32.333,2.814  c3.905-3.903,9.973-3.728,14.114,0.413c4.141,4.141,4.319,10.208,0.414,14.114L21.22,42.982c-2.407,2.407-6.327,2.411-8.738,0  c-2.409-2.41-2.408-6.33,0-8.738l17.369-17.369c0.586-0.586,1.535-0.586,2.121,0c0.586,0.586,0.586,1.535,0,2.121L14.603,36.365  c-1.239,1.239-1.239,3.256,0,4.496c1.241,1.239,3.257,1.237,4.496,0L44.74,15.22c2.695-2.696,2.518-6.94-0.414-9.872  s-7.176-3.109-9.872-0.413L7.16,32.229c-1.917,1.917-2.973,4.478-2.973,7.21c0,2.733,1.056,5.294,2.973,7.211  s4.478,2.973,7.211,2.973c2.732,0,5.293-1.056,7.21-2.973l27.294-27.294c0.586-0.586,1.535-0.586,2.121,0s0.586,1.535,0,2.121  L23.702,48.771C21.219,51.254,17.905,52.623,14.371,52.623z"/></svg>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div id="chat-panel-identification" class="chat-panel-identification">
		<form>
			<p class="text-center"><small><b>Sebelum Memulai Chat, Masukkan Identitas Anda</b></small></p>
			<div class="form-group">
				<small><label for="chat-email">Email</label></small>
				<input type="email" class="form-control form-control-sm" id="chat-email" placeholder="Masukkan Email">
			</div>
			<div class="form-group">
				<small><label for="chat-name">Nama</label></small>
				<input type="text" class="form-control form-control-sm" id="chat-name" placeholder="Masukkan Nama Anda">
			</div>
			<button id="btn-user-chat-identification" type="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
	</div>
	<div id="chat-panel-button" class="chat-panel-button">
		<svg viewBox="0 0 28 32"><path d="M28,32 C28,32 23.2863266,30.1450667 19.4727818,28.6592 L3.43749107,28.6592 C1.53921989,28.6592 0,27.0272 0,25.0144 L0,3.6448 C0,1.632 1.53921989,0 3.43749107,0 L24.5615088,0 C26.45978,0 27.9989999,1.632 27.9989999,3.6448 L27.9989999,22.0490667 L28,22.0490667 L28,32 Z M23.8614088,20.0181333 C23.5309223,19.6105242 22.9540812,19.5633836 22.5692242,19.9125333 C22.5392199,19.9392 19.5537934,22.5941333 13.9989999,22.5941333 C8.51321617,22.5941333 5.48178311,19.9584 5.4277754,19.9104 C5.04295119,19.5629428 4.46760991,19.6105095 4.13759108,20.0170667 C3.97913051,20.2124916 3.9004494,20.4673395 3.91904357,20.7249415 C3.93763774,20.9825435 4.05196575,21.2215447 4.23660523,21.3888 C4.37862552,21.5168 7.77411059,24.5386667 13.9989999,24.5386667 C20.2248893,24.5386667 23.6203743,21.5168 23.7623946,21.3888 C23.9467342,21.2215726 24.0608642,20.9827905 24.0794539,20.7254507 C24.0980436,20.4681109 24.0195551,20.2135019 23.8614088,20.0181333 Z"></path></svg>
	</div>
</div>
<style>
	.chat-panel-container{
		/* display: flex;
		width: 350px;
		height: 500px;
		flex-direction: column;
		justify-content: flex-end;
		align-items: flex-end;
		position: fixed;
		right: 20px;
		bottom: 20px;
		z-index: 1; */
	}
	.chat-panel-button{
		position: fixed;
		right: 20px;
		bottom: 20px;
		width: 60px;
		height: 60px;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #5831cc;
		border-radius: 50%;
		cursor: pointer;
		z-index: 1;
	}
	.chat-panel-button > svg {
		width: 40%;
		fill: white;
	}
	.chat-panel-identification{
		position: fixed;
		right: 20px;
		bottom: 80px;
		display: none;
		width: 350px;
		padding: 16px;
		background-color: #fff;
		margin-bottom: 20px;
		border-radius: 4px;
		z-index: 1;
	}
	.chat-panel-main{
		display: none;
		position: fixed;
		right: 20px;
		bottom: 80px;
		margin-bottom: 20px;
		width: 350px;
		height: 400px;
		flex-grow: 1;
		background-color: #fff;
		border-radius: 4px;
		z-index: 1;
	}
	.chat-container{
		width: 100%;
		height: 100%;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: stretch;
	}
	.message-history{
		widows: 100%;
		height: auto;
		flex-grow: 1;
		overflow-y: scroll;
		display: flex;
		flex-direction: column;
		padding: 16px 0px 16px 16px;
	}
	.incoming-message{
		display: flex;
		height: auto;
		width: 100%;
		justify-content: flex-start;
		align-items: flex-start;
		margin: 13px 0;
	}
	.incoming-message > img{
		width: 40px;
	}
	.received-message {
		display: inline-block;
		padding: 0 10px 0 10px;
		height: auto;
		vertical-align: top;
		max-width: 65%;
	}
	.received-message p {
		background: #ebebeb none repeat scroll 0 0;
		border-radius: 3px;
		color: #646464;
		font-size: 14px;
		margin: 0;
		padding: 5px 10px 5px 12px;
		width: 100%;
		height: 100%;
	}
	.outgoing-message{
		display: flex;
		justify-content: flex-end;
		align-items: flex-end;
		margin: 13px 0;
		width: 100%;
	}
	.sent-message {
		display: inline-block;
		padding: 0 10px 0 10px;
		vertical-align: top;
		max-width: 65%;
	}
	.sent-message p {
		background: #05728f none repeat scroll 0 0;
		border-radius: 3px;
		font-size: 14px;
		margin: 0;
		color:#fff;
		padding: 5px 10px 5px 12px;
		width:100%;
	}
	.time-date {
		color: #747474;
		display: block;
		font-size: 12px;
		margin: 8px 0 0;
	}
	.chat-date{
		color: #747474;
		display: block;
		text-align: center;
		font-size: 12px;
		margin: 8px 0 0;
	}
	.chat-message{
		font-size: 14px;
		resize: none;
	}
	.input-container{
		padding: 8px 8px 20px 8px;
	}
	.input-container input {
		background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
		border: medium none;
		color: #4c4c4c;
		font-size: 15px;
		width: 100%;
	}

	.type-message {
		border-top: 1px solid #c4c4c4;
		position: relative;
	}
	.chat-send-button {
		/* background: #05728f none repeat scroll 0 0; */
		background-color: transparent;
		float: right;
		background: #fff;
		cursor: pointer;
		width: 30px;
		height: 30px;
		border: none;
	}
	.chat-send-button > svg{
		fill: #05728f;
		width: 20px;
	}

</style>
<script>

	$('#chat-send-message').on('click', function(){
		event.preventDefault();
		var message = $('#chat-message').val();
		$('#chat-messages').append(`
			<div class="outgoing-message">
				<div class="sent-message">
					<p>${message}</p>
					<span class="time-date">{{date('d M | h:i')}}</span>
				</div>
			</div>
		`);
		$('#chat-message').val('');
		$.ajax({
			url: '{{route("send-chat")}}',
			method: 'POST',
			data: {
				'name': "{{Session::get('name')}}",
				'from': "{{Session::get('email')}}",
				'to': 'admin@mail.com',
				'message': message,
			},
			success: function(s){
				alert(s);
			},
			error: function(e){
				alert('error');
				console.log(e);
			}
		});
	});

	$('#chat-panel-button').on('click', function(){
		// var cookies = getCookies();
		// if(cookies['chat-email'] && cookies['chat-name']){
		if(localStorage.getItem('chat-connect')){
			$('#chat-panel-main').fadeToggle(200);
			return;
		}
		$('#chat-panel-identification').fadeToggle(200);
	});

	$('#btn-user-chat-identification').on('click', function(){
		event.preventDefault();
		$.ajax({
			url: '{{route("guest.chat-connect")}}',
			method: 'POST',
			data: {
				'name': $('#chat-name').val(),
				'email': $('#chat-email').val()
			},
			success: function(s){
				localStorage.setItem('chat-connect', 'true');
				$('#chat-panel-button').click();
				$('#chat-panel-identification').fadeOut(200);
			},
			error: function(e){
				alert('error');
				console.log(e);
			}
		});
	});

	Echo.private('chat.{{Session::get("email")}}')
		.listen('.sendChat', function(chat){
			alert(chat.message);
		});

	function getCookies(){
		var pairs = document.cookie.split(";");
		var cookies = {};
		for (var i=0; i < pairs.length; i++){
			var pair = pairs[i].split("=");
			cookies[(pair[0]+'').trim()] = unescape(pair[1]);
		}
		return cookies;
	}

	function setCookie(name, value, days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = "; " + name + "=" + (value || "") + expires + "; path=/";
	}

</script>