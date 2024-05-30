function toggleNavigation() {
    var navigation = document.getElementById("navigation");
    navigation.classList.toggle("hidden");
}

document.getElementById("toggle-icon").addEventListener("click", toggleNavigation);

// Ajoutez un gestionnaire d'événements aux icônes de la navigation
document.querySelectorAll('#navigation svg').forEach(function(svg) {
    svg.addEventListener('click', toggleNavigation);
});
