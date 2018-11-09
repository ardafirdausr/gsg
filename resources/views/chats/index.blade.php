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
<style>
img{
	max-width:100%;
}
.inbox_people {
  background: #fff none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}


.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{
  overflow:hidden;
  clear:both;
}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat {
  height: 100%;
  overflow-y: scroll;
}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.msg_history {
  height: 100%;
  overflow-y: auto;
}
</style>
@endsection

