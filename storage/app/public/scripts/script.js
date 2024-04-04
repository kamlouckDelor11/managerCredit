// scripts global

// LOADER
document.onreadystatechange = function () {
    // On vérifie si la page a fini de charger
    if (document.readyState === "complete") {
      // Si la page a fini de charger, on masque le loader
      hideLoader();
    }
  };
  
  function hideLoader() {
    // On cache le loader en modifiant le style
    document.querySelector('.loader').style.display = 'none';
  }
// ****************************************************************************************


// femer les message d'erreur

$('.hidde-error-message').on('click', function () {
    let child = document.querySelector('p#error-message-contain-spent-item').children;
    let result = Object.values(child);
    result.forEach(element =>{
        element.remove();
    })

    $('.contain-message-error').removeClass('active');
})