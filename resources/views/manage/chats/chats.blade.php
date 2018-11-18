@extends('layouts.admin')

@section('panel')
<div>
  <h3 class="h5">Chats</h3>
  <div class="row chat-container" >
    <div class="col-md-5 guest-list-container" id="guest-list">
      @if(count($guestChats) > 0)
        @foreach($guestChats as $guestChat)
        <div class="chat-list" id="{{$guestChat->from}}" onclick="selectChat(this)">
          <div class="chat-people">
            <div class="chat-img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="avt"> </div>
            <div class="chat-ib">
              <div>
                {{$guestChat->from}}
                <div class="unread" count="0">0</div>
                <span class="chat_date">{{date('d M', strtotime($guestChat->sent_at))}}</span>
              </div>
              <p>{{$guestChat->message}}<span>{{date('H:i', strtotime($guestChat->sent_at))}}</span></p>
            </div>
          </div>
        </div>
        @endforeach
      @else
        <div class="h-100 w-100" id="no-guest">
          <span class="text-muted">Tidak Ada Pesan Masuk</span>
        </div>
      @endif
    </div>
    <div class="mesgs col-md-7">
      <div class="msg_history" id="msg_history">
        <div class="h-100 w-100 noting">
          <span>Tidak Ada Pesan Terpilih</span>
        </div>
      </div>
      <div class="type-container">
        <div class="input-container">
          <textarea
            type="text"
            name="message"
            id="chat-message"
            class="form-control chat-message"
            row="3"
						maxlength="255"
            placeholder="Tulis Pesan"
            ></textarea>
          <button id="chat-send-image" class="chat-send-message" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.623 52.623" style="enable-background:new 0 0 52.623 52.623;" xml:space="preserve"><path d="M14.371,52.623c-3.535,0-6.849-1.368-9.332-3.852s-3.852-5.797-3.852-9.332c0-3.534,1.368-6.848,3.852-9.331L32.333,2.814  c3.905-3.903,9.973-3.728,14.114,0.413c4.141,4.141,4.319,10.208,0.414,14.114L21.22,42.982c-2.407,2.407-6.327,2.411-8.738,0  c-2.409-2.41-2.408-6.33,0-8.738l17.369-17.369c0.586-0.586,1.535-0.586,2.121,0c0.586,0.586,0.586,1.535,0,2.121L14.603,36.365  c-1.239,1.239-1.239,3.256,0,4.496c1.241,1.239,3.257,1.237,4.496,0L44.74,15.22c2.695-2.696,2.518-6.94-0.414-9.872  s-7.176-3.109-9.872-0.413L7.16,32.229c-1.917,1.917-2.973,4.478-2.973,7.21c0,2.733,1.056,5.294,2.973,7.211  s4.478,2.973,7.211,2.973c2.732,0,5.293-1.056,7.21-2.973l27.294-27.294c0.586-0.586,1.535-0.586,2.121,0s0.586,1.535,0,2.121  L23.702,48.771C21.219,51.254,17.905,52.623,14.371,52.623z"/></svg>
          </button>
          <button id="chat-send-message" class="chat-send-message" type="button" onclick="sendMessage()">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 535.5 535.5" style="enable-background:new 0 0 535.5 535.5;" xml:space="preserve"> <g><g id="send"><polygon points="0,497.25 535.5,267.75 0,38.25 0,216.75 382.5,267.75 0,318.75 		"/></g></g></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

    function getUserListReceiveTemplate(chat){
      return `
      <div class="chat-list" id="${chat.from}" onclick="selectChat(this)">
        ${getUserListContentReceiveTemplate(chat, 1)}
      </div>
      `;
    }

    function getUserListContentReceiveTemplate(chat, unread){
      return `
        <div class="chat-people">
          <div class="chat-img">
            <img src="https://ptetutorials.com/images/user-profile.png" alt="avt">
          </div>
          <div class="chat-ib">
            <div>
              ${chat.from}
              <div class="unread badge badge-pill badge-primary" count="${unread || 0}">${unread || 0}</div>
              <span class="chat_date">${dayjs(chat.sent_at).format('D MMM')}</span>
            </div>
            <p>${chat.message}<span>${dayjs(chat.sent_at).format('HH:mm')}</span></p>
          </div>
        </div>
      `;
    }

    function getUserListContentSendTemplate(chat){
      return `
        <div class="chat-people">
          <div class="chat-img">
            <img src="https://ptetutorials.com/images/user-profile.png" alt="avt">
          </div>
          <div class="chat-ib">
            <div>
              ${chat.to}
              <div class="unread badge badge-pill badge-primary" count="0">0</div>
              <span class="chat_date">${dayjs(chat.sent_at).format('D MMM')}</span>
            </div>
            <p>${chat.message}<span>${dayjs(chat.sent_at).format('HH:mm')}</span></p>
          </div>
        </div>
      `;
    }

    function getIncomingChatTemplate(chat){
      return `
        <div class="incoming_msg" id="message-${chat.id}" style="display: none">
          <div class="incoming_msg_img">
            <img src="https://ptetutorials.com/images/user-profile.png" alt="avt">
          </div>
          <div class="received_msg">
            <div class="received_withd_msg">
              <p>${chat.message}</p>
              <span class="time_date">${dayjs(chat.sent_at).format('D MMM | HH:mm')}</span></div>
          </div>
        </div>
      `;
    }

    function getOutgoingChatTemplate(chat){
      return `
        <div class="outgoing_msg" id="message-${chat.id}" style="display: none">
          <div class="sent_msg">
            <p>${chat.message}</p>
            <span class="time_date">${
              !!chat.sent_at ? dayjs(chat.sent_at).format('D MMM | HH:mm')
                             : '<svg width="14px" height="14px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve"><g><path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30 S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/><path d="M30,6c-0.552,0-1,0.447-1,1v23H14c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1V7C31,6.447,30.552,6,30,6z"/></g></svg>'
            }
            </span>
          </div>
        </div>
      `;
    }

    function loader(){
      return `
        <div class="spinner" id="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
      `;
    }

    function selectChat(element){
      var selected = $(element);
      var unreadElement = selected.find('.unread');
      $('.chat-list').removeClass('active_chat');
      $(selected).addClass('active_chat');
      $('#msg_history').html('');
      var senderEmail = selected.attr('id');
      $.ajax({
        url: '/manage/chats/' + senderEmail,
        method: 'get',
        beforeSend: function(){
          $('#msg_history').append(loader());
        },
        success: function(chats){
          chats.map(function(chat, idx){
            if(chat.from == senderEmail){
              $('#msg_history').prepend(getIncomingChatTemplate(chat));
            }
            else{
              $('#msg_history').prepend(getOutgoingChatTemplate(chat));
            }
            $('#message-' + chat.id).fadeIn(80 * idx);
          });
          unreadElement.attr('count', 0);
          unreadElement.html(unreadElement.attr('count'));
          unreadElement.css('visibility', 'hidden');
          $("#msg_history")[0].scrollTop = $("#msg_history")[0].scrollHeight;
        },
        error: function(error){
          console.log(error)
        },
        complete: function(){
          $('#spinner').detach();
        }
      });
    }

    function sendMessage(){
      event.preventDefault();
      var emailGuest = $('.active_chat').attr('id');
      var tempId = new Date().getTime();
      var message = $('#chat-message').val();
      var chat = { message: message, id: tempId };
      var userListElement = document.getElementById(emailGuest);
      $('#msg_history').append(getOutgoingChatTemplate(chat));
      $('#message-' + chat.id).fadeIn(200);
      $("#msg_history").animate({ scrollTop: document.getElementById('msg_history').scrollHeight }, "slow");
      $('#chat-message').val('');
      $.ajax({
        url: '/chats/send',
        method: 'POST',
        data: {
          'to': emailGuest,
          'message': message,
        },
        success: function(chat){
          $(userListElement).html(getUserListContentSendTemplate(chat));
          $('#message-' + tempId).replaceWith(getOutgoingChatTemplate(chat));
          $('#message-' + chat.id).fadeIn(200);
        },
        error: function(e){
          alert('error');
          console.log(e);
        }
      });
    }

    Echo.channel('chat.{{Session::get("email")}}')
      .listen('.sendChat', function(data){
        var chat = data.chat;
        var sender = chat.from;
        var senderId = '#' + sender;
        var activeHistory = $('.active_chat').attr('id');
        var senderElement = document.getElementById(sender);
        $('#no-guest').html('');
        if(senderElement){
          var unreadElement = $(senderElement.getElementsByClassName('unread')[0]);
          var unreadCount = Number(unreadElement.attr('count'));
          $(senderElement).html(getUserListContentReceiveTemplate(chat));
          if(activeHistory == sender){
            $('#msg_history').append(getIncomingChatTemplate(chat));
            $('#message-' + chat.id).fadeIn(200);
          }
          else{
            unreadElement = $(senderElement.getElementsByClassName('unread')[0]);
            unreadElement.attr('count', unreadCount + 1);
            unreadElement.html(unreadElement.attr('count'));
            unreadElement.css('visibility', 'visible');
          }
          $("#msg_history").animate({ scrollTop: document.getElementById('msg_history').scrollHeight }, "slow");
          return;
        }
        else{
          $('#guest-list').prepend(getUserListReceiveTemplate(chat));
          senderElement = document.getElementById(sender);
          var unreadElement = senderElement.getElementsByClassName('unread')[0];
          unreadElement = $(unreadElement);
          unreadElement.css('visibility', 'visible');
        }
    });

</script>
<style>
.chat-container{
  height: 400px;
  padding: 20px 0;
}
.guest-list-container{
  height: 100%;
  overflow-y: auto;
  border-right: 1px solid #c4c4c4;
}
img{
	max-width:100%;
}
.inbox_people {
  background: #fff none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.chat-ib div{
  font-size:15px;
  color:#464646;
  margin:0 0 2px 0;
}
.chat-ib div span{
  font-size:13px;
  float:right;
}
.chat-ib p{
  font-size:14px;
  color:#989898;
  margin:auto
}
.chat-ib p span{
  font-size:13px; float:right;
}
.chat-img {
  float: left;
  width: 11%;
}
.chat-ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}
.chat-people{
  overflow:hidden;
  clear:both;
}
.chat-list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
  cursor: pointer;
  transition: top 0.5s ease;
  animation: slide-up 0.4s ease;
}
.inbox_chat {
  height: 100%;
  overflow-y: scroll;
}
.active_chat{
  background:#ebebeb;
}
.incoming_msg{
  margin: 13px 0;
}
.incoming_msg_img {
  display: inline-block;
  margin:13px 0 13px;
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
.received_withd_msg {
  max-width: 60%;
  min-width: 25%;
}
.mesgs {
  /* float: left; */
  /* padding: 30px 15px 0 25px; */
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
.outgoing_msg{
  overflow:hidden;
  margin:13px 0 13px;
}
.sent_msg {
  margin-right: 8px;
  float: right;
  width: 46%;
}
.input-container{
  margin: 10px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}
.chat-message {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  flex-grow: 1;
  resize: none;
}
.type-container {
  border-top: 1px solid #c4c4c4;
  position: relative;
  }
.chat-send-message {
  /* background: #05728f none repeat scroll 0 0; */
  /* border-radius: 50%;  */
  /* color: #fff; */
  border: medium none;
  background-color: transparent;
  cursor: pointer;
  font-size: 17px;
  /* position: absolute;
  right: 0; */
  width: 33px;
}
.chat-send-message svg{
  fill: #05728f;
}
.msg_history {
  height: 100%;
  overflow-y: auto;
}
.noting span{
  position: relative;
  float: left;
  top: 50%;
  left: 50%;
 transform: translate(-50%, -50%);
  color: #a6a6a6;
  font-size: 16px;
}
.unread{
  visibility: hidden;
  display: inline-block;
  /* background-color: #007bff;
  width: 20px;
  height: 20px;
  line-height: 20px;
  border-radius: 50%; */
  font-size: 10px !important;
  color: #fff !important;
  text-align: center;
}
::-webkit-scrollbar-button{
	display: none;
}
::-webkit-scrollbar-thumb{
	color: #c1c1c1;
	opacity: 0.8;
}
::-webkit-scrollbar-track{
	color: #f1f1f1;
	opacity: 0.5;
}
.spinner {
  margin: 100px auto 0;
  width: 70px;
  text-align: center;
}
.spinner > div {
  width: 14px;
  height: 14px;
  background-color: #007bff;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}
.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}
@keyframes sk-bouncedelay {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% {
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}
@keyframes slide-up {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection

