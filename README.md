# Simpati Trans Chat System

Sistem chat untuk rental mobil dengan integrasi n8n.

## 🚀 Quick Start

### Windows
```cmd
setup.bat
```

### Linux/Mac
```bash
chmod +x setup.sh
./setup.sh
```

### Manual
```bash
docker-compose up -d --build
```

## 🌐 Access

- **Application**: http://localhost:8080
- **Chat System**: http://localhost:8080/chat

## 🗄️ Database

- **Host**: localhost:3306
- **Database**: simpati_trans
- **Username**: simpati_user
- **Password**: simpati_password

## 📋 Commands

```bash
# Start
docker-compose up -d

# Stop
docker-compose down

# View logs
docker-compose logs -f

# Rebuild
docker-compose up -d --build
```

## 🔧 n8n Integration

Webhook URL: `http://localhost:8080/chat/webhook`

POST JSON:
```json
{
  "name": "Admin",
  "message": "Pesan dari n8n"
}
```
