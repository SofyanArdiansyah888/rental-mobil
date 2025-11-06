<?php

class Chat_model
{
  private $table = 'chat_messages';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function sendMessage($data)
  {
    $query = "INSERT INTO " . $this->table . " (name, message, timestamp, is_admin) VALUES (:name, :message, :timestamp, :is_admin)";
    
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('message', $data['message']);
    $this->db->bind('timestamp', $data['timestamp']);
    $this->db->bind('is_admin', $data['is_admin'] ?? 0);
    
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function getMessages()
  {
    try {
      $query = "SELECT * FROM " . $this->table . " ORDER BY timestamp ASC";
      $this->db->query($query);
      return $this->db->resultSet();
    } catch (Exception $e) {
      // Return empty array jika ada error
      return [];
    }
  }

  public function getMessagesByLimit($limit = 50)
  {
    $query = "SELECT * FROM " . $this->table . " ORDER BY timestamp DESC LIMIT :limit";
    $this->db->query($query);
    $this->db->bind('limit', $limit);
    return $this->db->resultSet();
  }

  public function deleteMessage($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
