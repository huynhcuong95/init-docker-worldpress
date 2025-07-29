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
  width: 80px;
  height: 80px;
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
  /* background-color: #fff; để lỡ có viền trắng sẽ hòa vào */
  animation: pulse-inside 2s infinite;
  /* box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2); */
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
  animation: fadeScaleIn 0.3s ease-out forwards;
}

#chat-container.hide {
  animation: fadeScaleOut 0.2s ease-in forwards;
}


#chat-header {
   background: #333;
   color: white;
   padding: 0px 6px;
   font-weight: bold;
   display: flex;
   align-items: center;
   gap: 10px;
}

#chat-messages {
  padding: 16px; max-height: 400px; overflow-y: auto; background: #f8f8f8;
  overflow-y: auto;
  flex: 1;
}

.chat-msg {
  display: flex; margin-bottom: 12px; font-size: 14px;
}
.chat-msg.user { justify-content: flex-end; }
.chat-msg.bot { justify-content: flex-start; }

.chat-bubble {
  max-width: 70%; padding: 10px 14px; border-radius: 16px;
  line-height: 1.5; word-wrap: break-word;
}
.chat-msg.user .chat-bubble {
  background: #007aff; color: white; border-bottom-right-radius: 4px;
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
  flex: 1; padding: 10px 14px; border-radius: 20px;
  border: 1px solid #ccc; font-size: 14px;
  outline: none;
}
#chat-send {
  background: #007aff;
  border: none;
  margin-left: 8px;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
}

#chat-send svg {
  width: 20px;
  height: 20px;
  fill: white;
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
  bottom: 200px;
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
  animation: shake 0.8s ease-in-out infinite;
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
  animation: phone-ripple 2s infinite ease-out;
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

.wrap-phone-border {
    position: fixed;
    bottom: 156px;
    right: 20px;
    width: 70px;
    height: 70px;
    border-radius: 50px;
    border: 1px solid rgb(0 112 255 / 30%);
    background: transparent;
    animation: phone-ripple 3s infinite ease-in;
}

.typing-indicator {
  animation: blinkText 1s infinite;
  color: inherit; /* giữ nguyên màu chữ */
}

@keyframes blinkText {
  0%, 100% { opacity: 1; }
  50%      { opacity: 0.3; }
}

</style>

<!-- Nút mở chat -->
<button id="chat-toggle" aria-label="Mở trợ lý">
  <img src="https://cdn-icons-png.flaticon.com/512/4712/4712100.png" alt="chatbot" />
</button>


<!-- Chatbox -->
<div id="chat-container">
  <div id="chat-header">
    <span>🤖 WorldElevator</span>
    <button id="chat-close" title="Đóng" style="margin-left:auto; background:none; border:none; font-size:20px; color:white; cursor:pointer;">−</button>
  </div>
  <div id="chat-messages"></div>
  <div id="chat-input-container">
    <input type="text" id="chat-input" placeholder="Nhập tin nhắn..."/>
    <button id="chat-send" title="Gửi">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path fill="white" d="M2 21l21-9L2 3v7l15 2-15 2z"/>
      </svg>
  </button>
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
    <h3>📞 Gọi ngay</h3>
    <p>0945 360 527</p>
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
  if (!container.dataset.greeted) {
    appendMsg("bot", "Xin chào! Tôi có thể giúp gì cho bạn?");
    container.dataset.greeted = "true";
  }
};

closeBtn.onclick = () => {
  container.classList.remove("show");
  container.classList.add("hide");
  setTimeout(() => {
    container.style.display = "none";
    toggle.style.display = "flex";
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
  bubble.innerText = "Đang trả lời...";
} else {
  bubble.innerText = text;
}

  if (type === "bot") {
    const wrap = document.createElement("div");
    wrap.className = "avatar";
    wrap.textContent = "🤖";
    msg.appendChild(wrap);
  }

  msg.appendChild(bubble);
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
    appendMsg("bot", data);
  } catch {
    loading.remove();
    appendMsg("bot", "❌ Lỗi kết nối.");
  }
}
</script>
<!-- 🌟 Chat Widget End -->



</body>
</html>