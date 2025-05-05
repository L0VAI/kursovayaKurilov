 
 
 const endDate = new Date('May 7, 2025 00:00:00').getTime();
 function updateCountdown() {
     const now = new Date().getTime();
     const difference = endDate - now;
     if (difference <= 0) {
         document.getElementById('days').textContent = '00';
         document.getElementById('hours').textContent = '00';
         document.getElementById('minutes').textContent = '00';
         document.getElementById('seconds').textContent = '00';
         return;
     }
     const days = Math.floor(difference / (1000 * 60 * 60 * 24));
     const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
     const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
     const seconds = Math.floor((difference % (1000 * 60)) / 1000);
     
     document.getElementById('days').textContent = days.toString().padStart(2, '0');
     document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
     document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
     document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
 }
 updateCountdown();
 setInterval(updateCountdown, 1000);