@extends('layouts.admin')

@section('panel')
<body>
		<h3 class="h5">Chat</h3>
		<div class="row">
			<div class="col-md-5">
				<div>
					<div class="chat_list active_chat">
						<div class="chat_people">
							<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
							<div class="chat_ib">
								<h5>Agus Waluyo<span class="chat_date">01 Nov</span></h5>
								<p>Belum selesai bang</p>
							</div>
						</div>
					</div>
					@for($i = 0; $i < 4; $i++)
					<div class="chat_list">
						<div class="chat_people">
							<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
							<div class="chat_ib">
								<h5>Budi Tabudi <span class="chat_date">31 Oct</span></h5>
								<p>Makan Bang</p>
							</div>
						</div>
				</div>
					@endfor
				</div>
			</div>
			<div class="mesgs col-md-7">
				<div class="msg_history">
					<div class="incoming_msg">
						<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="received_msg">
							<div class="received_withd_msg">
								<p>Bang bantu ngerjain dong</p>
								<span class="time_date"> 10:00 AM    |    01 Nov</span></div>
						</div>
					</div>
					<div class="outgoing_msg">
						<div class="sent_msg">
						<p>Moh hehe</p>
						<span class="time_date"> 10:20 AM    |    01 Nov</span> </div>
					</div>
				</div>
				<div class="type_msg">
					<div class="input_msg_write">
						<input type="text" class="write_msg" placeholder="Tulis Pesan" />
						<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
		</div>
@endsection

