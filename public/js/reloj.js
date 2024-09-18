// public/js/reloj.js

function obtenerHoraServidor() {
    fetch('/hora')
        .then(response => response.json())
        .then(data => {
            // Crear un objeto Date en UTC
            const horaUTC = new Date(`1970-01-01T${data.hora_utc}Z`);
            
            // Ajustar la hora a la zona horaria local del navegador
            const horaLocal = new Date(horaUTC.getTime() - (horaUTC.getTimezoneOffset() * 60000));
            
            // Mostrar la hora local en formato de 24 horas (HH:MM:SS)
            document.getElementById('reloj').innerHTML = horaLocal.toTimeString().split(' ')[0];
        })
        .catch(error => console.error('Error al obtener la hora:', error));
}

// Actualizar la hora cada segundo llamando al servidor
setInterval(obtenerHoraServidor, 1000);

// Obtener la hora inmediatamente al cargar la página
obtenerHoraServidor();
