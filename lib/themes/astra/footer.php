<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @package Astra
* @since 1.0.0
*/
 
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<?php astra_content_bottom(); ?>
  </div> <!-- ast-container -->
  </div><!-- #content -->
<?php
  astra_content_after();
 
  astra_footer_before();
 
  astra_footer();
 
  astra_footer_after();
?>
  </div><!-- #page -->
<?php
  astra_body_bottom();
  wp_footer();
?>
 
<!-- 🌟 Chat Widget TGDD Style -->
<style>
#chat-toggle {
  position: fixed;
  bottom: 70px;
  right: 40px;
  width: 90px;
  height: 90px;
  border: unset;
  background: unset;
  z-index: 9999;
  padding: 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: unset;
}
 
#chat-toggle img {
  width: 100%;
  height: 100%;
  border-radius: 50 %;
  object-fit: contain; /* contain tốt hơn nếu ảnh nhỏ */
  animation: robot-bounce 2s infinite;
}
 
@keyframes pulse-inside {
  0% {
    transform: scale(1);
    filter: brightness(1);
  }
  50% {
    transform: scale(1.07);
    filter: brightness(1.25);
  }
  100% {
    transform: scale(1);
    filter: brightness(1);
  }
}

@keyframes robot-bounce {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
    filter: brightness(1);
  }
  50% {
    transform: translateY(-5px) rotate(5deg);
    filter: brightness(1.2);
  }
}
 
 
/* Animation mở */
@keyframes fadeScaleIn {
  0% {
    opacity: 0;
    transform: scale(0.85);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}
 
@keyframes fadeScaleOut {
  0% {
    opacity: 1;
    transform: scale(1);
  }
  100% {
    opacity: 0;
    transform: scale(0.85);
  }
}
 
#chat-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 400px;
  border-radius: 16px;
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  z-index: 9998;
  display: none;
  flex-direction: column;
  background: white;
  font-family: "Helvetica Neue", sans-serif;
  max-height: 500px;
  height: 500px;
}
 
#chat-container.show {
  display: flex !important;
  animation: fadeScaleIn 0.3s ease-out forwards !important;
}

#chat-container.hide {
  animation: fadeScaleOut 0.2s ease-in forwards !important;
}
 
 
#chat-header {
   background: #2196F3;
   color: white;
   padding: 0px 6px;
   font-weight: bold;
   display: flex;
   align-items: center;
   gap: 10px;
}
 
#chat-messages {
  flex: 1; /* ✅ BẮT BUỘC để chiếm hết chiều cao còn lại */
  padding: 16px;
  overflow-y: auto;
  background: #f8f8f8;
  display: flex;
  flex-direction: column;
}
 
.chat-msg {
  display: flex; margin-bottom: 12px; font-size: 14px;
}
.chat-msg.user { justify-content: flex-end; }
.chat-msg.bot { justify-content: flex-start; }
 
.chat-bubble {
  max-width: 70%; padding: 10px 14px; border-radius: 16px;
  line-height: 1.5;
  word-wrap: break-word; /* ✅ bắt buộc xuống dòng khi quá dài */
  white-space: pre-wrap; /* ✅ giữ khoảng trắng & xuống dòng tự nhiên */
  overflow-wrap: break-word; /* fallback tốt hơn cho các trình duyệt */
}
.chat-msg.user .chat-bubble {
  /* background: rgb(104 115 178);  */
  background: #2196F3;
  color: white; 
  border-bottom-right-radius: 4px;
}
.chat-msg.bot .chat-bubble {
  background: #e6e6e6; color: #222; border-bottom-left-radius: 4px;
}
.chat-msg.bot .avatar {
  margin-right: 6px;
  font-size: 18px;
}
 
#chat-input-container {
  display: flex; padding: 10px 12px; border-top: 1px solid #ddd;
  background: white;
}
#chat-input {
  flex: 1;
  padding: 12px 16px;
  border-radius: 9999px;
  border: 1px solid #ccc;
  font-size: 15px;
  outline: none;
  background-color: #f2f2f2;
  transition: border-color 0.3s, background-color 0.3s;
}
#chat-input:focus {
  border-color: #007aff;
  background-color: #fff;
}
  #chat-send {
    /* background: linear-gradient(135deg, #69727d, #4f46e5); */
    background: #2196F3;
    border: none;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 8px;
    margin-top: -2px;
  }

  #chat-send:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 18px rgba(79, 70, 229, 0.4);
  }

  #chat-send:active {
    transform: scale(0.95);
  }

  #chat-send svg {
    width: 20px;
    height: 20px;
    fill: white;
    transition: transform 0.3s ease;
  }

  #chat-send:hover svg {
    transform: rotate(15deg);
  }

 
#call-modal {
  display: none;
  position: fixed;
  z-index: 10000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.4);
  backdrop-filter: blur(2px);
  align-items: center;
  justify-content: center;
}
 
#call-modal.show {
  display: flex;
  animation: fadeScaleIn 0.3s ease-out;
}
 
.modal-content {
  background-color: #fff;
  padding: 20px 30px;
  border-radius: 12px;
  text-align: center;
  min-width: 260px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
  animation: fadeScaleIn 0.25s ease-out;
}
 
.modal-content h3 {
  margin-top: 0;
  color: #007aff;
}
 
.modal-content p {
  font-size: 20px;
  font-weight: bold;
  margin: 10px 0 0;
}
 
#close-call-modal {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 28px;
  cursor: pointer;
  color: #888;
}
 
#phone-call {
  position: fixed;
  bottom: 220px;
  right: 64px;
  width: 50px;
  height: 50px;
  background: unset;
  border: none;
  z-index: 9996;
  padding: 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  animation: pulse-inside 2s infinite;
}
 
#phone-call img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: contain;
}
 
@keyframes shake {
  0% { transform: rotate(0deg); }
  20% { transform: rotate(-10deg); }
  40% { transform: rotate(10deg); }
  60% { transform: rotate(-8deg); }
  80% { transform: rotate(8deg); }
  100% { transform: rotate(0deg); }
}
 
#phone-call.shake {
  box-shadow: unset;
  /* animation: shake 0.8s ease-in-out infinite; */
}
 
#phone-call::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 50%;
  background: rgb(0 112 255 / 30%);
  /* animation: phone-ripple 2s infinite ease-out; */
  z-index: -1;
}
 
@keyframes phone-ripple {
  0% {
    transform: translate(-50%, -50%) scale(1);
    opacity: 0.6;
  }
  70% {
    transform: translate(-50%, -50%) scale(1.8);
    opacity: 0.2;
  }
  100% {
    transform: translate(-50%, -50%) scale(2);
    opacity: 0;
  }
}

 
.typing-indicator {
  display: inline-flex;
  align-items: center;
  gap: 4px;
}

.typing-indicator span {
  width: 6px;
  height: 6px;
  background-color: #888;
  border-radius: 50%;
  animation: blink 1.4s infinite both;
}

.typing-indicator span:nth-child(2) {
  animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
  animation-delay: 0.4s;
}

@keyframes blink {
  0% { opacity: 0.3; transform: scale(1); }
  20% { opacity: 1; transform: scale(1.2); }
  100% { opacity: 0.3; transform: scale(1); }
}
 
@media (max-width: 768px) {
  #chat-container {
    width: 90%;
    right: 5%;
    bottom: 10px;
    height: 80vh;
    max-height: 80vh;
    border-radius: 12px;
  }
 
  #chat-messages {
    padding: 10px;
    max-height: calc(80vh - 120px);
    font-size: 14px;
  }
 
  #chat-input-container {
    padding: 8px;
  }
 
  #chat-input {
    padding: 10px;
    font-size: 14px;
  }
 
  #chat-send {
    width: 40px;
    height: 40px;
  }
 
  #chat-toggle {
    bottom: 60px;
    right: 20px;
    width: 60px;
    height: 60px;
  }
 
  #phone-call {
    bottom: 140px;
    right: 20px;
    width: 44px;
    height: 44px;
  }
 
  .modal-content {
    width: 90%;
    padding: 16px;
    font-size: 16px;
  }
}
.wrap-phone-border {
    position: fixed;
    bottom: calc(220px - 70px/2 - 10px);
    right: calc( 64px - 70px/2 - 10px);
    width: 70px;
    height: 70px;
    border-radius: 50px;
    border: 1px solid rgb(0 112 255 / 30%);
    background: transparent;
    animation: phone-ripple 3s infinite ease-in;
}

/* Thêm nhãn "Gọi ngay" bên trái */
#phone-call::after {
    content: "Gọi ngay";
    position: absolute;
    left: -38px;
    width: 120px;
    height: 29px;
    background-color: #2196F3;
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    white-space: nowrap;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
  .wrap-phone-border {
    bottom: calc(140px - 60px/2 - 6px);
    right: calc(20px - 60px/2 - 6px);
    width: 60px;
    height: 60px;
  }
}

#chat-header span {
  margin-left: 10px
}

.avatar {
  display: flex;
  align-items: end;
  margin-left: 4px;
  margin-bottom: -4px;
}

#phone-call {
  outline: none !important;
}

#phone-call:focus {
  outline: none !important;
  box-shadow: none !important;
}

a:focus,
button:focus {
  outline: none !important;
  box-shadow: none !important;
}

#chat-voice {
  background: #ff5722;
  border: none;
  border-radius: 50%;
  padding: 10px;
  margin-left: 8px;
  cursor: pointer;
  color: white;
  font-size: 18px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

#chat-voice:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 18px rgba(255, 87, 34, 0.4);
}

#chat-voice:active {
  transform: scale(0.95);
}

#chat-voice.listening {
  background: #e53935; /* đỏ */
  animation: pulse 1s infinite;
}

@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(229, 57, 53, 0.6); }
  70% { box-shadow: 0 0 0 12px rgba(229, 57, 53, 0); }
  100% { box-shadow: 0 0 0 0 rgba(229, 57, 53, 0); }
}

#chat-upload {
  background: #4caf50;
  border: none;
  border-radius: 50%;
  padding: 10px;
  margin-left: 8px;
  cursor: pointer;
  color: white;
  font-size: 18px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

#chat-upload:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 18px rgba(76, 175, 80, 0.4);
}

#chat-upload:active {
  transform: scale(0.95);
}

#chat-user-info {
  flex: 1;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  animation: fadeScaleIn 0.3s ease-out;
}

#chat-user-info h3 {
  margin-bottom: 10px;
  color: #2196F3;
}

#chat-user-info p {
  margin-bottom: 15px;
  color: #555;
}

#chat-user-info input {
  width: 100%;
  padding: 12px;
  margin: 6px 0;
  border: 1px solid #ccc;
  border-radius: 8px;
  outline: none;
  font-size: 15px;
  transition: border-color 0.2s ease;
}

#chat-user-info input:focus {
  border-color: #2196F3;
}

#chat-user-info .btn-group {
  display: flex;
  gap: 10px;
  margin-top: 12px;
}

#chat-user-info button {
  flex: 1;
  padding: 10px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  transition: all 0.2s ease;
}

#start-chat {
  background: #2196F3;
  color: white;
}

#start-chat:hover {
  background: #1976D2;
}

#skip-chat {
  background: #ddd;
  color: #333;
}

#skip-chat:hover {
  background: #bbb;
}

#loading-user {
  margin-top: 12px;
  font-size: 14px;
  color: #666;
}

.hidden {
  display: none !important;
}

button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  pointer-events: none;
}

.wave-hand {
  display: inline-block;
  transform-origin: 70% 70%;
  animation: wave-animation 2s infinite;
}

@keyframes wave-animation {
  0% { transform: rotate(0deg); }
  10% { transform: rotate(14deg); }
  20% { transform: rotate(-8deg); }
  30% { transform: rotate(14deg); }
  40% { transform: rotate(-4deg); }
  50% { transform: rotate(10deg); }
  60% { transform: rotate(0deg); }
  100% { transform: rotate(0deg); }
}

</style>
 
<!-- Nút mở chat -->
<button id="chat-toggle" aria-label="Mở trợ lý">
  <img src="https://worldcare-dev.s3.us-west-1.amazonaws.com/medhub/2b642b4a-fb97-413a-9f9d-46d5926b7d2b.png" alt="chatbot" />
</button>
 
<!-- Chatbox -->
<div id="chat-container">
  <div id="chat-header">
    <span>
    <img src="https://worldcare-dev.s3.us-west-1.amazonaws.com/medhub/2b642b4a-fb97-413a-9f9d-46d5926b7d2b.png" alt="Bot" width="20" height="20" style="margin-right:5px">
    Trợ lý ảo WorldElevator</span>
    <button id="chat-close" title="Đóng" style="margin-left:auto; background:none; border:none; font-size:20px; color:white; cursor:pointer;">−</button>
  </div>

<!-- Form nhập thông tin trước khi chat -->
<div id="chat-user-info">
  <div class="form-step">
    <h3><span class="wave-hand">👋</span> Chào bạn</h3>
    <p>Vui lòng nhập thông tin để bắt đầu trò chuyện</p>
    <input type="text" id="user-name" placeholder="Họ và tên" required />
    <input type="tel" id="user-phone" placeholder="Số điện thoại" required />
    <div class="btn-group">
      <button id="start-chat">Bắt đầu chat</button>
      <button id="skip-chat">Bỏ qua</button>
    </div>
    <div id="loading-user" class="loading hidden">⏳ Đang xử lý...</div>
  </div>
</div>

  <div id="chat-messages"></div>
  <div id="chat-input-container">
    <input type="text" id="chat-input" placeholder="Nhập tin nhắn..."/>
   
  <button id="chat-send" title="Gửi">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M2 21l21-9L2 3v7l15 2-15 2v7z"></path>
  </svg>
</button>
 <button id="chat-voice" title="Nói chuyện">🎤</button>
  </div>
</div>
 
<!-- Icon gọi điện -->
<div class="wrap-phone">
  <div class="wrap-phone-border"></div>
<button id="phone-call" class="shake" aria-label="Gọi ngay">
  <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="Gọi điện" />
</button>
</div>
 
 
<!-- Modal hiện số điện thoại -->
<div id="call-modal">
  <div class="modal-content">
    <span id="close-call-modal">&times;</span>
    <!-- <h3>📞 Gọi ngay</h3> -->
    <p><a href="tel:0945360527" style="text-decoration: none; color: inherit;">📞 0945 360 527</a></p>
  </div>
</div>
 
<script>
const toggle = document.getElementById("chat-toggle");
const container = document.getElementById("chat-container");
const messages = document.getElementById("chat-messages");
const input = document.getElementById("chat-input");
const sendBtn = document.getElementById("chat-send");
const closeBtn = document.getElementById("chat-close");
const phoneBtn = document.getElementById("phone-call");
  const callModal = document.getElementById("call-modal");
  const closeCallModal = document.getElementById("close-call-modal");
 

toggle.onclick = () => {
  toggle.style.display = "none";
  container.classList.remove("hide");
  container.style.display = "flex";
  container.classList.add("show");
 
  // Chỉ gửi câu chào 1 lần khi mở
  // if (!container.dataset.greeted) {
  //   appendMsg("bot", "Xin chào! Tôi có thể giúp gì cho bạn?");
  //   container.dataset.greeted = "true";
  // }

};
 
closeBtn.onclick = () => {
  container.classList.remove("show");
  container.classList.add("hide");
  setTimeout(() => {
    container.style.display = "none";
    toggle.style.display = "";
  }, 200);
};
 
phoneBtn.onclick = () => {
    callModal.classList.add("show");
  };
 
  closeCallModal.onclick = () => {
    callModal.classList.remove("show");
  };
 
  window.onclick = (e) => {
    if (e.target === callModal) {
      callModal.classList.remove("show");
    }
  };
 
 
input.addEventListener("keypress", e => {
  if (e.key === "Enter") sendMessage();
});
sendBtn.onclick = sendMessage;
 
function appendMsg(type, text, isTyping = false) {
  const msg = document.createElement("div");
  msg.className = `chat-msg ${type}`;
  
  const bubble = document.createElement("div");
  bubble.className = "chat-bubble";

  if (isTyping) {
    bubble.classList.add("typing-indicator");
    bubble.innerHTML = `<span></span><span></span><span></span>`;
  } else {
    bubble.innerText = text;
  }

  // 👉 Thêm avatar cho cả user và bot
  const wrap = document.createElement("div");
  wrap.className = "avatar";

  if (type === "bot") {
    // wrap.textContent = "🤖";
wrap.innerHTML = `
  <img src="https://worldcare-dev.s3.us-west-1.amazonaws.com/medhub/2b642b4a-fb97-413a-9f9d-46d5926b7d2b.png" alt="Bot" width="20" height="20">

`;
    msg.appendChild(wrap);
    msg.appendChild(bubble);
  } else if (type === "user") {

    // wrap.textContent = "👤"; // hoặc dùng ảnh
    msg.appendChild(bubble);
    msg.appendChild(wrap);
  }

  messages.appendChild(msg);
  messages.scrollTop = messages.scrollHeight;
  return msg;
}
 
async function sendMessage() {
  const message = input.value.trim();
  if (!message) return;
 
  appendMsg("user", message);
  input.value = "";
  const loading = appendMsg("bot", "", true);
 
  try {
    const res = await fetch(`https://5ol.1n8n.vn/webhook/86ed5d0f-82b9-4962-a971-638828c0c390?input=${encodeURIComponent(message)}`);
    const data = await res.text();
    loading.remove();

    // Nếu API trả 200 nhưng nội dung rỗng
    if (!data.trim()) {
      data = "Cảm ơn bạn đã phản hồi!";
    }

    appendMsg("bot", data);
  } catch {
    loading.remove();
    appendMsg("bot", "❌ Lỗi kết nối.");
  }
}

const voiceBtn = document.getElementById("chat-voice");

// Ban đầu disable 2 nút
sendBtn.disabled = true;
voiceBtn.disabled = true;

function enableChatButtons() {
  sendBtn.disabled = false;
  voiceBtn.disabled = false;
}

let recognition;
let silenceTimer;
let isProcessing = false; // ✅ tránh gửi 2 lần

if ("webkitSpeechRecognition" in window || "SpeechRecognition" in window) {
  const SpeechRecognition =
    window.SpeechRecognition || window.webkitSpeechRecognition;

  recognition = new SpeechRecognition();
  recognition.lang = "vi-VN";
  recognition.continuous = true;
  recognition.interimResults = true;

  recognition.onstart = () => {
    appendMsg("bot", "🎙️ Tôi đang lắng nghe...");
    voiceBtn.classList.add("listening");
    isProcessing = false;
  };

  recognition.onresult = (event) => {
    let transcript = "";
    for (let i = event.resultIndex; i < event.results.length; i++) {
      transcript += event.results[i][0].transcript;
    }
    transcript = transcript.trim();

    // luôn show text tạm vào input
    input.value = transcript;

    // reset timer mỗi lần có tiếng nói
    clearTimeout(silenceTimer);
    silenceTimer = setTimeout(() => {
      stopVoiceInput(transcript);
    }, 3000);
  };

  recognition.onerror = () => {
    appendMsg("bot", "❌ Không nghe rõ, thử lại nhé.");
    voiceBtn.classList.remove("listening");
    isProcessing = false;
  };

  recognition.onend = () => {
    voiceBtn.classList.remove("listening");
  };

  function stopVoiceInput(finalText) {
    if (isProcessing) return; // ✅ ngăn gửi 2 lần
    isProcessing = true;

    recognition.stop();
    voiceBtn.classList.remove("listening");

    if (finalText) {
      input.value = finalText;
      sendMessage(); // ✅ chỉ gửi 1 lần khi kết thúc 3s im lặng
      input.value = "";
    }
  }

  voiceBtn.onclick = () => {
  if (voiceBtn.classList.contains("listening")) {
    // Người dùng bấm để hủy khi đang nghe
    clearTimeout(silenceTimer);   // ❌ hủy timer 3s
    recognition.stop();
    voiceBtn.classList.remove("listening");
    isProcessing = false;
  } else {
    recognition.start();
  }
  };
} else {
  voiceBtn.style.display = "none";
}

document.addEventListener("DOMContentLoaded", () => {
  const startBtn = document.getElementById("start-chat");
  const skipBtn = document.getElementById("skip-chat");
  const userInfoDiv = document.getElementById("chat-user-info");
  const chatMessages = document.getElementById("chat-messages");
  // const loadingUser = document.getElementById("loading-user");
  
  let userData = null;

  chatMessages.style.display = "none";

  startBtn.onclick = async (e) => {
    e.preventDefault(); // ❌ Ngăn reload page nếu trong form
    const name = document.getElementById("user-name").value.trim();
    const phone = document.getElementById("user-phone").value.trim();

    if (!name || !phone) { alert("Vui lòng nhập đầy đủ thông tin!"); return; }

    // loadingUser.classList.remove("hidden");

    try {
      const res = await fetch("https://api.congtyso.com/api/v1/data-customer", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, phoneNumber:phone , typeBusiness:'THANG-MAY', resourceCustomer:'web'  })
      });

      if (res.ok) {
        userData = { name, phone };
        userInfoDiv.style.display = "none";
        chatMessages.style.display = "flex"; // ✅ đổi block → flex nếu container dùng flex
        enableChatButtons();
        appendMsg("bot", `Xin chào ${name}! Bạn có thể bắt đầu chat ngay bây giờ 🎉`);
      } else { alert("Không thể lưu thông tin. Vui lòng thử lại!"); }
    } catch (err) {
      console.error(err);
      alert("Lỗi kết nối server!");
    } finally {
      alert("Lỗi kết nối server!");
     }
  };

  skipBtn.onclick = (e) => {
    e.preventDefault();
    userInfoDiv.style.display = "none";
    chatMessages.style.display = "flex";
    appendMsg("bot", "Xin chào! Bạn có thể bắt đầu chat ngay.");
    enableChatButtons();
  };
});

</script>
<!-- 🌟 Chat Widget End -->
 
 
 
</body>
</html>
