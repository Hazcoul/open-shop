require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";

window.delConfirm = function(formId){
    Swal.fire({
        title: 'Etes-vous sûr de vouloir supprimer ?',
        text: "Si vous supprimez ce produit, vous ne serez plus en mesure de le recuperer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer!',
        cancelButtonText:'Annuler'

      }).then((result) => {
        if (result.isConfirmed) {
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        document.getElementById(formId).submit()
        }
      })
}