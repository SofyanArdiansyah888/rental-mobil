<!-- Modal untuk input nama -->
<div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="nameModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="nameModalLabel">
          <i class="fas fa-user"></i> Masukkan Nama Anda
        </h5>
      </div>
      <div class="modal-body">
        <p>Sebelum memulai chat, silakan masukkan nama Anda terlebih dahulu.</p>
        <form id="name-form">
          <div class="mb-3">
            <label for="user-name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="user-name" name="name" placeholder="Masukkan nama Anda" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save-name-btn">
          <i class="fas fa-check"></i> Simpan & Mulai Chat
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Chat Container -->
<div class="chat-container">
  <div class="chat-wrapper">
    <div class="chat-header">
      <div class="chat-title">
        <i class="fas fa-comments"></i>
        <span>Chat Support</span>
      </div>
      <div class="chat-subtitle">Hubungi kami untuk bantuan dan informasi</div>
      <div class="user-info" id="user-info" style="display: none;">
        <i class="fas fa-user-circle"></i>
        <span id="current-user-name"></span>
      </div>
    </div>
    
    <div class="chat-body">
      <!-- Chat Messages Area -->
      <div id="chat-messages" class="chat-messages">
        <?php if (isset($data['error'])): ?>
          <div class="alert alert-warning text-center">
            <i class="fas fa-exclamation-triangle"></i>
            <?php echo $data['error']; ?>
          </div>
        <?php endif; ?>
        
        <?php if (!empty($data['messages'])): ?>
          <?php foreach ($data['messages'] as $message): ?>
            <div class="message <?php echo $message['is_admin'] ? 'admin-message' : 'user-message'; ?>">
              <div class="message-content">
                <div class="message-header">
                  <strong><?php echo htmlspecialchars($message['name']); ?></strong>
                  <small class="text-muted"><?php echo date('H:i', strtotime($message['timestamp'])); ?></small>
                </div>
                <div class="message-text">
                  <?php echo nl2br(htmlspecialchars($message['message'])); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="text-center text-muted py-4">
            <i class="fas fa-comment-dots fa-3x mb-3"></i>
            <p>Belum ada pesan. Mulai percakapan dengan kami!</p>
          </div>
        <?php endif; ?>
      </div>
      
      <!-- Chat Input Area -->
      <div class="chat-input">
        <form id="chat-form">
          <div class="input-group">
            <input type="text" class="form-control" id="message" name="message" placeholder="Ketik pesan Anda..." required>
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
/* Chat Container */
.chat-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  padding-top: 60px; /* Account for navbar */
}

.chat-wrapper {
  width: 90%;
  max-width: 800px;
  height: 80vh;
  background: white;
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

/* Chat Header */
.chat-header {
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
  color: white;
  padding: 20px;
  text-align: center;
  position: relative;
}

.chat-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 5px;
}

.chat-title i {
  margin-right: 10px;
}

.chat-subtitle {
  font-size: 14px;
  opacity: 0.9;
}

.user-info {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 14px;
  background: rgba(255,255,255,0.2);
  padding: 8px 15px;
  border-radius: 20px;
}

.user-info i {
  margin-right: 5px;
}

/* Chat Body */
.chat-body {
  flex: 1;
  display: flex;
  flex-direction: column;
  height: calc(100% - 140px);
}

.chat-messages {
  flex: 1;
  overflow-y: auto;
  padding: 20px;
  background: #f8f9fa;
  background-image: 
    radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.1) 0%, transparent 50%);
}

.message {
  margin-bottom: 15px;
  display: flex;
  animation: slideIn 0.3s ease-out;
}

.user-message {
  justify-content: flex-end;
}

.admin-message {
  justify-content: flex-start;
}

.message-content {
  max-width: 70%;
  padding: 12px 18px;
  border-radius: 20px;
  position: relative;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.user-message .message-content {
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
  color: white;
  border-bottom-right-radius: 5px;
}

.admin-message .message-content {
  background: white;
  color: #333;
  border: 1px solid #e9ecef;
  border-bottom-left-radius: 5px;
}

.message-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 5px;
  font-size: 12px;
}

.user-message .message-header {
  color: rgba(255, 255, 255, 0.8);
}

.admin-message .message-header {
  color: #6c757d;
}

.message-text {
  word-wrap: break-word;
  line-height: 1.4;
}

/* Chat Input */
.chat-input {
  padding: 20px;
  background: white;
  border-top: 1px solid #e9ecef;
}

.chat-input .input-group {
  border-radius: 25px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.chat-input .form-control {
  border: none;
  padding: 15px 20px;
  font-size: 14px;
}

.chat-input .form-control:focus {
  box-shadow: none;
  border-color: transparent;
}

.chat-input .btn {
  border-radius: 0;
  padding: 15px 20px;
  border: none;
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

.chat-input .btn:hover {
  background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
}

/* Scrollbar styling */
.chat-messages::-webkit-scrollbar {
  width: 6px;
}

.chat-messages::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 3px;
}

.chat-messages::-webkit-scrollbar-thumb {
  background: #c1c1c1;
  border-radius: 3px;
}

.chat-messages::-webkit-scrollbar-thumb:hover {
  background: #a8a8a8;
}

/* Animation for new messages */
@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 768px) {
  .chat-container {
    padding: 10px;
  }
  
  .chat-wrapper {
    width: 100%;
    height: 90vh;
    border-radius: 15px;
  }
  
  .message-content {
    max-width: 85%;
  }
  
  .chat-header {
    padding: 15px;
  }
  
  .chat-title {
    font-size: 20px;
  }
  
  .user-info {
    position: static;
    margin-top: 10px;
    display: inline-block;
  }
}

/* Modal Styles */
.modal {
  z-index: 10000;
}

.modal-backdrop {
  z-index: 9999;
}

/* Loading animation */
.typing-indicator {
  display: flex;
  align-items: center;
  padding: 10px 15px;
  background: white;
  border-radius: 20px;
  margin-bottom: 15px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.typing-indicator span {
  height: 8px;
  width: 8px;
  background: #007bff;
  border-radius: 50%;
  display: inline-block;
  margin-right: 5px;
  animation: typing 1.4s infinite ease-in-out;
}

.typing-indicator span:nth-child(2) {
  animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
  animation-delay: 0.4s;
}

@keyframes typing {
  0%, 60%, 100% {
    transform: translateY(0);
  }
  30% {
    transform: translateY(-10px);
  }
}
</style>

<script>
// Clear any existing intervals
if (window.chatInterval) {
  clearInterval(window.chatInterval);
  window.chatInterval = null;
}

document.addEventListener('DOMContentLoaded', function() {
  const chatForm = document.getElementById('chat-form');
  const chatMessages = document.getElementById('chat-messages');
  const messageInput = document.getElementById('message');
  const nameForm = document.getElementById('name-form');
  const nameModal = document.getElementById('nameModal');
  const saveNameBtn = document.getElementById('save-name-btn');
  const userInfo = document.getElementById('user-info');
  const currentUserName = document.getElementById('current-user-name');

  // Cek apakah user sudah punya nama di session
  const userName = getCookie('chat_user_name');
  if (userName) {
    showUserInfo(userName);
  } else {
    // Tampilkan modal untuk input nama
    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
      const modal = new bootstrap.Modal(nameModal);
      modal.show();
    } else {
      // Fallback jika Bootstrap tidak tersedia
      nameModal.style.display = 'block';
      nameModal.classList.add('show');
    }
  }

  // Handle save name
  saveNameBtn.addEventListener('click', function() {
    const name = document.getElementById('user-name').value.trim();
    if (name) {
      // Simpan nama ke session via AJAX
      const formData = new FormData();
      formData.append('name', name);
      
      fetch('<?php echo BASEURL; ?>/chat/setUserName', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          setCookie('chat_user_name', name, 7); // Simpan di cookie juga
          showUserInfo(name);
          // Hide modal
          if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const modal = bootstrap.Modal.getInstance(nameModal);
            if (modal) modal.hide();
          } else {
            nameModal.style.display = 'none';
            nameModal.classList.remove('show');
          }
          loadMessages();
        } else {
          alert('Gagal menyimpan nama: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan nama');
      });
    } else {
      alert('Nama tidak boleh kosong');
    }
  });

  // Handle enter key pada input nama
  document.getElementById('user-name').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      saveNameBtn.click();
    }
  });

  function showUserInfo(name) {
    currentUserName.textContent = name;
    userInfo.style.display = 'block';
  }

  // Auto scroll to bottom
  function scrollToBottom() {
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  // Load messages
  function loadMessages() {
    console.log('Loading messages...');
    fetch('<?php echo BASEURL; ?>/chat/getMessages')
      .then(response => response.json())
      .then(messages => {
        chatMessages.innerHTML = '';
        messages.forEach(message => {
          const messageDiv = document.createElement('div');
          messageDiv.className = `message ${message.is_admin ? 'admin-message' : 'user-message'}`;
          messageDiv.innerHTML = `
            <div class="message-content">
              <div class="message-header">
                <strong>${message.name}</strong>
                <small class="text-muted">${new Date(message.timestamp).toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</small>
              </div>
              <div class="message-text">${message.message.replace(/\n/g, '<br>')}</div>
            </div>
          `;
          chatMessages.appendChild(messageDiv);
        });
        scrollToBottom();
      })
      .catch(error => console.error('Error loading messages:', error));
  }

  // Send message function
  function sendMessage() {
    const message = messageInput.value.trim();
    if (!message) return;
    
    console.log('Sending message:', message);
    
    const formData = new FormData();
    formData.append('message', message);
    
    fetch('<?php echo BASEURL; ?>/chat/sendMessage', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        messageInput.value = '';
        loadMessages();
      } else {
        alert('Gagal mengirim pesan: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat mengirim pesan');
    });
  }

  // Send message on form submit
  chatForm.addEventListener('submit', function(e) {
    e.preventDefault();
    sendMessage();
  });

  // Send message on enter key
  messageInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      sendMessage();
    }
  });

  // Load messages on page load
  if (userName) {
    loadMessages();
  }
  
  // Scroll to bottom on page load
  scrollToBottom();
  
  // Debug: Check for any running intervals
  console.log('Chat script loaded. No auto-refresh enabled.');
});

// Additional cleanup on page unload
window.addEventListener('beforeunload', function() {
  if (window.chatInterval) {
    clearInterval(window.chatInterval);
    window.chatInterval = null;
  }
});

// Cookie helper functions
function setCookie(name, value, days) {
  const expires = new Date();
  expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
  document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
}

function getCookie(name) {
  const nameEQ = name + "=";
  const ca = document.cookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}
</script>
