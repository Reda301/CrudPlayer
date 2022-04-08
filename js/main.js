// Get input element
let filterInput = document.getElementById('filterInput');
// Add event listener
filterInput.addEventListener('keyup', filterNames);

function filterNames() {
    // Get value of input
    let filterValue = document.getElementById('filterInput').value.toUpperCase();

    // Get names ul
    let ul = document.getElementById('names');

    // Get li from ul
    let li = ul.querySelectorAll('li.collection-item');

    // Tant que i est inférieur à la logueutr li on incrémente +1
    for (let i = 0; i < li.length; i++) {
        let a = li[i].getElementsByTagName('a')[0]; // On veut obtenir le lien actuel donc on met 0


        // permet de saisir tout ce qui se trouve à l'interieur des li
        // si c'est plus grand que -1, alors ça correspond à l'une des lettre dans la liste
        if (a.innerHTML.toUpperCase().indexOf(filterValue) > -1) {
            li[i].style.display = '';
        } else {
            li[i].style.display = 'none';
        }

    }

}