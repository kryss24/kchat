function effectuerRequeteAjax(url, methode, donnees, callback) {
    var xhr = new XMLHttpRequest();
    // Définition de la fonction de rappel pour gérer la réponse de la requête AJAX
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          callback(xhr.responseText);
        } else {
          console.error('Une erreur s\'est produite : ' + xhr.status);
        }
      }
    };
    xhr.open(methode, url, true);
    if (methode === 'POST') {
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    xhr.send(donnees);
  }