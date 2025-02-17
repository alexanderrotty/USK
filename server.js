const { exec } = require('child_process');
const path = require('path');

// Jalankan server PHP
const phpServer = exec(`php -S localhost:8000 -t ${path.join(__dirname, 'antrian_rumah_sakit')}`);

phpServer.stdout.on('data', (data) => {
  console.log(`PHP Server: ${data}`);
});

phpServer.stderr.on('data', (data) => {
  console.error(`PHP Server Error: ${data}`);
});

phpServer.on('close', (code) => {
  console.log(`PHP Server exited with code ${code}`);
});