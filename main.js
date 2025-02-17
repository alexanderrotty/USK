const { app, BrowserWindow } = require('electron');
const path = require('path');
const { exec } = require('child_process');

let mainWindow;
let phpServer;

function createWindow() {
  // Jalankan server PHP
  phpServer = exec(`php -S localhost:8000 -t ${path.join(__dirname, 'antrian_rumah_sakit')}`);

  phpServer.stdout.on('data', (data) => {
    console.log(`PHP Server: ${data}`);
  });

  phpServer.stderr.on('data', (data) => {
    console.error(`PHP Server Error: ${data}`);
  });

  phpServer.on('close', (code) => {
    console.log(`PHP Server exited with code ${code}`);
  });

  // Buat jendela browser
  mainWindow = new BrowserWindow({
    width: 800,
    height: 600,
    webPreferences: {
      nodeIntegration: false,
      contextIsolation: true,
      preload: path.join(__dirname, 'preload.js'),
    },
  });

  // Muat aplikasi PHP
  mainWindow.loadURL('http://localhost:8000');

  // Buka DevTools (opsional)
  // mainWindow.webContents.openDevTools();
}

app.whenReady().then(() => {
  createWindow();

  app.on('activate', () => {
    if (BrowserWindow.getAllWindows().length === 0) {
      createWindow();
    }
  });
});

app.on('window-all-closed', () => {
  if (process.platform !== 'darwin') {
    // Hentikan server PHP saat aplikasi ditutup
    if (phpServer) {
      phpServer.kill();
    }
    app.quit();
  }
});