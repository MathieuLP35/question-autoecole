let nb_proposition_default = 2; // Nombre de proposition par défaut

let nb_proposition = document.getElementById('nb_proposition'); // Nombre de proposition
let propositions = document.getElementById('propositions'); // Div contenant les propositions

if(nb_proposition && propositions) {

    // Ajout des propositions à la div propositions
    let i = 1;

    nb_proposition.value = nb_proposition_default
    propositions.innerHTML = '';

    while (i <= nb_proposition_default) {
        propositions.innerHTML += 
        '<label for="reponse_'+i+'">Réponse '+i+'</label>'+
        '<div class="form-item">'+
            '<input name="reponse_'+i+'" type="text" class="admin-question"><input type="checkbox" name="reponse_'+i+'_valid" class="valider">'+
        '</div>';
        i++;
    }

    // Ont ajoute à propositions les propositions de réponse
    function addProposition() {
        let nb_proposition = document.getElementById('nb_proposition'); // Nombre de proposition
        let propositions = document.getElementById('propositions'); // Div contenant les propositions

        // Ajout des propositions à la div propositions
        let i = 1;

        if (nb_proposition.value < nb_proposition_default) {
            nb_proposition.innerHTML = nb_proposition_default;
            nb_proposition.value = nb_proposition_default;
            alert('Il faut au moins '+nb_proposition_default+' propositions de réponse pour créer une question !');
        }

        propositions.innerHTML = '';
        while (i <= nb_proposition.value) {
            propositions.innerHTML += 
            '<label for="reponse_'+i+'">Réponse '+i+'</label>'+
            '<div class="form-item">'+
                '<input name="reponse_'+i+'" type="text" class="admin-question"><input type="checkbox" name="reponse_'+i+'_valid" class="valider">'+
            '</div>';
            i++;
        }
    }

    nb_proposition.addEventListener('change', function() {
        addProposition();
    });
}