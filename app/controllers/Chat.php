<?php

class Chat extends Controller
{
  private $db;
  private $chat;

  public function __construct()
  {
    $this->db = new Database;
    $this->chat = $this->model('Chat_model');
    
    // Mulai session jika belum ada
    if (!session_id()) {
      session_start();
    }
  }

  public function index()
  {
    try {
      $data['judul'] = 'Chat Support - ' . APP_NAME;
      $data['messages'] = $this->chat->getMessages();
      
      $this->view('templates/header', $data);
      $this->view('templates/navhome');
      $this->view('chat/index', $data);
      $this->view('templates/footerhome');
      $this->view('templates/footer');
    } catch (Exception $e) {
      // Fallback jika ada error
      $data['judul'] = 'Chat Support - ' . APP_NAME;
      $data['messages'] = [];
      $data['error'] = 'Gagal memuat pesan chat. Silakan coba lagi.';
      
      $this->view('templates/header', $data);
      $this->view('templates/navhome');
      $this->view('chat/index', $data);
      $this->view('templates/footerhome');
      $this->view('templates/footer');
    }
  }

  public function setUserName()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'] ?? '';
      if (!empty($name)) {
        $_SESSION['chat_user_name'] = htmlspecialchars($name);
        echo json_encode(['status' => 'success', 'message' => 'Nama berhasil disimpan']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Nama tidak boleh kosong']);
      }
    }
  }

  public function sendMessage()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'name' => $_SESSION['chat_user_name'] ?? 'Guest',
        'message' => $_POST['message'] ?? '',
        'timestamp' => date('Y-m-d H:i:s')
      ];

      if ($this->chat->sendMessage($data)) {
        echo json_encode(['status' => 'success', 'message' => 'Pesan berhasil dikirim']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengirim pesan']);
      }
    }
  }

  public function getMessages()
  {
    $messages = $this->chat->getMessages();
    echo json_encode($messages);
  }

  // API endpoint untuk n8n webhook
  public function webhook()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $input = json_decode(file_get_contents('php://input'), true);
      
      if (isset($input['message']) && isset($input['name'])) {
        $data = [
          'name' => $input['name'],
          'message' => $input['message'],
          'timestamp' => date('Y-m-d H:i:s'),
          'is_admin' => 1 // Pesan dari admin/n8n
        ];

        if ($this->chat->sendMessage($data)) {
          http_response_code(200);
          echo json_encode(['status' => 'success', 'message' => 'Message received']);
        } else {
          http_response_code(500);
          echo json_encode(['status' => 'error', 'message' => 'Failed to save message']);
        }
      } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
      }
    } else {
      http_response_code(405);
      echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    }
  }
}
