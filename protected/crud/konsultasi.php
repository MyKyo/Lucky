<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Konsultasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="chat-container">
        <h2>Konsultasi Chat</h2>
        <div class="chat-box" id="chatBox">
            <!-- Pesan akan muncul di sini -->
        </div>
        <input type="text" id="chatInput" class="chat-input" placeholder="Tulis pesan...">
        <br> <br>
        <button class="button" onclick="sendMessage()">Kirim</button>
    </div>

    <script>
    // JavaScript untuk menangani chat
    function sendMessage() {
        const chatInput = document.getElementById('chatInput');
        const chatBox = document.getElementById('chatBox');
        const message = chatInput.value.trim();

        if (message) {
            // Tambahkan pesan pengguna ke chatBox
            const userMessage = document.createElement('div');
            userMessage.className = 'message user';
            userMessage.innerText = message;
            chatBox.appendChild(userMessage);

            // Simulasi balasan admin (bisa diganti dengan backend handling)
            const adminMessage = document.createElement('div');
            adminMessage.className = 'message admin';
            adminMessage.innerText = 'Admin: Terima kasih, pesan Anda telah diterima.';
            chatBox.appendChild(adminMessage);

            // Scroll ke bagian bawah chat
            chatBox.scrollTop = chatBox.scrollHeight;

            // Bersihkan input
            chatInput.value = '';
        }
    }
    </script>
</body>

</html>