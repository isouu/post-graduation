  // Récupérer les dates de soutenance depuis PHP
  var datesSoutenance = <?php echo json_encode($datesSoutenance); ?>;
    
  // Déterminer la couleur en fonction de la date
  function getColor(date) {
      var now = new Date();
      var soutenanceDate = new Date(date);
      var diffDays = Math.ceil((soutenanceDate.getTime() - now.getTime()) / (1000 * 3600 * 24));

      if (diffDays < 0) {
          return 'passed'; // Date passée
      } else if (diffDays == 0) {
          return 'today'; // Date aujourd'hui
      } else if (diffDays <= 7) {
          return 'near'; // Date très proche
      } else {
          return 'far'; // Date loin  
      }
  }

  // Créer les notifications
  var notificationsDiv = document.getElementById('notifications');
  datesSoutenance.reverse().forEach(function(soutenance) { // pour afficher les notifications les plus récentes en premier.
      var color = getColor(soutenance.date_soutenance);
      var notificationDiv = document.createElement('div');
      var iconSymbol = '';
      switch (color) {
          case 'passed':
              iconSymbol = '&#10004;';
              break;
          case 'today':
              iconSymbol = '&#10003;';
              break;
          case 'near':
              iconSymbol = '&#9888;';
              break;
          case 'far':
              iconSymbol = '&#9888;';
              break;
          default:
              iconSymbol = '&#8505;';
      }
      notificationDiv.innerHTML = '<span class="icon ' + color + '">' + iconSymbol + '</span>' + soutenance.date_soutenance + ': Rendez-vous de soutenance pour le sujet "' + soutenance.sujet + '"';
      notificationDiv.classList.add('notification');
      notificationDiv.classList.add(color);
      notificationsDiv.appendChild(notificationDiv); // Ajouter en tant que dernier enfant
  });