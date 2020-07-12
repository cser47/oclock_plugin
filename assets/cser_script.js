"use strict";

// fonction utilisée pour la gestion des onglets de l'interface du back-office


// on écoute si la page est chargée
window.addEventListener("load", function () {

    // store tabs variables
    var tabs = document.querySelectorAll("ul.nav-tabs > li");
    // on ajoute des écouteurs aux onglets pour savoir s'ils sont cliqués
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", switchTab);
    }

    // cette fonction modifie les classes des onglets actifs pour modifier leur apparence/visibilité pour l'utilisateur
    function switchTab(event) {
        event.preventDefault();

        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        var clickedTab = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.getAttribute("href");

        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");

    }

});
