/**
* ouverture et fermeture des formulaires
*/

const show_contain_add_coment = document.getElementById('add_coment');

const contain_add_coment = document.getElementsByClassName('content-form-recouvery-upaid');
const close_contain_add_coment = document.getElementsByClassName('close-content-coment-folder');

if (show_contain_add_coment) {
    show_contain_add_coment.addEventListener('click', ()=>{
        contain_add_coment[0].classList.add('active');
    });

    close_contain_add_coment[0].addEventListener('click', ()=>{
        contain_add_coment[0].classList.remove('active');
        document.querySelector("#coment").value = '';
    })
    
}



const show_comment = document.getElementById('read_comment');
const contain_show_comment = document.getElementsByClassName('show-comment-container');
const close_contain_show_comment = document.getElementsByClassName('close-contain-show-comment');

show_comment.addEventListener('click', ()=>{
    contain_show_comment[0].classList.add('active');
});

close_contain_show_comment[0].addEventListener('click', ()=>{
    contain_show_comment[0].classList.remove('active');
})

// ===============================script opinion =======================================
const show_contain_add_opinion = document.getElementById('add_opinion');

const contain_add_opinion = document.getElementsByClassName('content-opinion-folder');
const close_contain_add_opinion = document.getElementsByClassName('close-content-opinion-folder');

if (show_contain_add_opinion) {
    show_contain_add_opinion.addEventListener('click', ()=>{
        contain_add_opinion[0].classList.add('active');
    });

    close_contain_add_opinion[0].addEventListener('click', ()=>{
        contain_add_opinion[0].classList.remove('active');
        document.querySelector("#opinion").value = '';
    })
}



const show_opinion = document.getElementById('read_opinion');
const contain_show_opinion = document.getElementsByClassName('show-opinion-container');
const close_contain_show_opinion = document.getElementsByClassName('close-contain-show-opinion');

if (show_opinion) {
    show_opinion.addEventListener('click', ()=>{
        contain_show_opinion[0].classList.add('active');
    });

    close_contain_show_opinion[0].addEventListener('click', ()=>{
        contain_show_opinion[0].classList.remove('active');
    })

}



// ===================================sript gerer le dossier=======================================
const show_contain_manager_folder = document.getElementById('manager_folder');
const contain_manager_folder = document.getElementsByClassName('container-manager-folder');
const close_contain_manager_folder = document.getElementsByClassName('close-container-manager-folder');

if (show_contain_manager_folder) {
    show_contain_manager_folder.addEventListener('click', ()=>{
        contain_manager_folder[0].classList.add('active');
    });

    close_contain_manager_folder[0].addEventListener('click', ()=>{
        contain_manager_folder[0].classList.remove('active');
    })

}
// ===================================sript gestion impayés=======================================
/**
 * script interface bouton gestion impaye
 * 
 */
const show_contain_manager_upaid = document.getElementById('manager_upaid');
const contain_manager_upaid = document.getElementsByClassName('container-manager-upaid');
const close_contain_manager_upaid = document.getElementsByClassName('close-container-manager-upaid');

if (show_contain_manager_upaid) {
    show_contain_manager_upaid.addEventListener('click', ()=>{
        contain_manager_upaid[0].classList.add('active');
    });

    close_contain_manager_upaid[0].addEventListener('click', ()=>{
        contain_manager_upaid[0].classList.remove('active');
    })

}
/**
 * script declaration impaye
 * 
 */
const show_contain_declation_upaid = document.getElementById('delaration_upaid');
const contain_declation_upaid = document.getElementsByClassName('content-upaid-declaration');
const close_contain_declaration_upaid = document.getElementsByClassName('close-content-upaid-declaration');

if (show_contain_declation_upaid) {
    show_contain_declation_upaid.addEventListener('click', ()=>{
        contain_declation_upaid[0].classList.add('active');
    });

    close_contain_declaration_upaid[0].addEventListener('click', ()=>{
        contain_declation_upaid[0].classList.remove('active');
        $('#form-upaid-declaration')[0].reset();
    })

    $(document).on('input', '#amount-upaid', function (e) {
        let reg = /^[0-9]*$/;
        let valid = e.target.value;
        if (reg.test(valid) == false) {
            document.querySelector('#amount-upaid').value='';               
        }
    })
}




// ==========================================script modifier statut====================================================
const show_contain_change_status_folder = document.getElementById('change_status');
const contain_change_status_folder = document.getElementsByClassName('content-change-status-folder');
const close_contain_change_status_folder = document.getElementsByClassName('close-content-change-status-folder');

if (show_contain_change_status_folder) {
    show_contain_change_status_folder.addEventListener('click', ()=>{
        contain_change_status_folder[0].classList.add('active');
    });

    close_contain_change_status_folder[0].addEventListener('click', ()=>{
        contain_change_status_folder[0].classList.remove('active');
        $('#change-status-folder')[0].reset();
    })
}



// ========================================debloquer le dossier============================================================
const show_contain_approuve_folder = document.getElementById('approve_folder');
const contain_approuve_folder = document.getElementsByClassName('contain-approuve-credit');
const close_contain_approuve_folder = document.getElementsByClassName('close-contain-approuve-credit');

if (show_contain_approuve_folder) {
    show_contain_approuve_folder.addEventListener('click', ()=>{
        contain_approuve_folder[0].classList.add('active');
    });

    close_contain_approuve_folder[0].addEventListener('click', ()=>{
        contain_approuve_folder[0].classList.remove('active');
        $('#form-approuve-credit')[0].reset();
    })
}

// ========================================script caution ============================================================

/**
 * script consultation caution
 * 
 */

const show_contain_caution = document.getElementById('read_caution');
const contain_caution = document.getElementsByClassName('show-caution-container');
const close_contain_caution = document.getElementsByClassName('close-contain-show-caution');

if (show_contain_caution) {
    show_contain_caution.addEventListener('click', ()=>{
        contain_caution[0].classList.add('active');
    });

    close_contain_caution[0].addEventListener('click', ()=>{
        contain_caution[0].classList.remove('active');
    })
}

/**
 * script ajout caution
 * 
 */

const show_form_add_caution = document.getElementById('add_caution');
const contain_caution_form = document.getElementsByClassName('contain-add-caution');
const close_contain_caution_form = document.getElementsByClassName('close-contain-add-caution');

if (show_form_add_caution) {
    show_form_add_caution.addEventListener('click', ()=>{
        contain_caution_form[0].classList.add('active');
    });

    close_contain_caution_form[0].addEventListener('click', ()=>{
        contain_caution_form[0].classList.remove('active');
    })
}

// ======================================script garantie===========================
/**
 * script consultation garantie
 * 
 */

const show_contain_garantie = document.getElementById('read_warantie');
const contain_garantie = document.getElementsByClassName('show-garantie-container');
const close_contain_garantie = document.getElementsByClassName('close-contain-show-garantie');

if (show_contain_garantie) {
    show_contain_garantie.addEventListener('click', ()=>{
        contain_garantie[0].classList.add('active');
    });

    close_contain_garantie[0].addEventListener('click', ()=>{
        contain_garantie[0].classList.remove('active');
    })
}
/**
 * script ajout garantie
 * 
 */

const show_form_add_garantie = document.getElementById('add_warantie');
const contain_garantie_form = document.getElementsByClassName('content-form-add-garantie');
const close_contain_garantie_form = document.getElementsByClassName('close-form-add-garantie');

if (show_form_add_garantie) {
    show_form_add_garantie.addEventListener('click', ()=>{
        contain_garantie_form[0].classList.add('active');
    });

    close_contain_garantie_form[0].addEventListener('click', ()=>{
        contain_garantie_form[0].classList.remove('active');
    })
}




// ===========================================ajax===============================================

$(document).ready(function(){
    /** 
     * enregistrement d'un commentaire
    */
        $('#coment-folder').on('submit', function (e) {
            e.preventDefault()
            $('.loader-waiting').addClass('active');
            let url = this.getAttribute('action');
            let form_data_comment = new FormData($(this)[0]);
            $.ajax({
                url:url,
                method:'post',
                data: form_data_comment,
                cache: false,
                contentType: false, 
                processData: false,
                success: function(response) {
                    $('.loader-waiting').removeClass('active');
                    let li = document.createElement('li');
                    document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                    $('.contain-message-error').addClass('active');
                    document.querySelector("#coment").value = '';
                    
                },
                error: function(error) {
                    $('.loader-waiting').removeClass('active');
                    let err =  JSON.parse(error.responseText).errors;
                    let result = Object.values(err);
    
                    result.forEach( element => {
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                    })
                    $('.contain-message-error').addClass('active');
                }
            })
    
        });

    /** 
     * enregistrement d'un avis
    */
        $('#opinion-folder').on('submit', function (e) {
            e.preventDefault()
            $('.loader-waiting').addClass('active');
            let url = this.getAttribute('action');
            let form_data_opinion = new FormData($(this)[0]);
            $.ajax({
                url:url,
                method:'post',
                data: form_data_opinion,
                cache: false,
                contentType: false, 
                processData: false,
                success: function(response) {
                    $('.loader-waiting').removeClass('active');
                    let li = document.createElement('li');
                    document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                    $('.contain-message-error').addClass('active');
                    document.querySelector("#opinion").value = '';
                    
                },
                error: function(error) {
                    $('.loader-waiting').removeClass('active');
                    let err =  JSON.parse(error.responseText).errors;
                    let result = Object.values(err);
    
                    result.forEach( element => {
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                    })
                    $('.contain-message-error').addClass('active');
                }
            })
    
        });

            /** 
             * modifier le statut
            */
            $('#change-status-folder').on('submit', function (e) {
                e.preventDefault()
                $('.loader-waiting').addClass('active');
                let url = this.getAttribute('action');
                let form_change_status = new FormData($(this)[0]);
                $.ajax({
                    url:url,
                    method:'post',
                    data: form_change_status,
                    cache: false,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        $('.loader-waiting').removeClass('active');
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                        $('.contain-message-error').addClass('active');
                        $('#change-status-folder')[0].reset();
                    },
                    error: function(error) {
                        $('.loader-waiting').removeClass('active');
                        let err =  JSON.parse(error.responseText).errors;
                        let result = Object.values(err);
        
                        result.forEach( element => {
                            let li = document.createElement('li');
                            document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                        })
                        $('.contain-message-error').addClass('active');
                    }
                })
        
            });
            /** 
             * debloquer le dossier
            */
            $('#form-approuve-credit').on('submit', function (e) {
                e.preventDefault()
                $('.loader-waiting').addClass('active');
                let url = this.getAttribute('action');
                let form_approuve_folder = new FormData($(this)[0]);
                $.ajax({
                    url:url,
                    method:'post',
                    data: form_approuve_folder,
                    cache: false,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        $('.loader-waiting').removeClass('active');
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                        $('.contain-message-error').addClass('active');
                        $('#form-approuve-credit')[0].reset();
                    },
                    error: function(error) {
                        $('.loader-waiting').removeClass('active');
                        let err =  JSON.parse(error.responseText).errors;
                        let result = Object.values(err);
                        result.forEach( element => {
                            let li = document.createElement('li');
                            document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                        })
                        $('.contain-message-error').addClass('active');
                    }
                })
        
            });

            /**
             * script ajout caution
             * 
             */
            $('#form-add-caution').on('submit', function (e) {
                e.preventDefault()
                $('.loader-waiting').addClass('active');
                let url = this.getAttribute('action');
                let form_add_caution = new FormData($(this)[0]);

                $.ajax({
                    url:url,
                    method:'post',
                    data: form_add_caution,
                    cache: false,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        $('.loader-waiting').removeClass('active');
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                        $('.contain-message-error').addClass('active');
                        $('#form-add-caution')[0].reset();
                        $('.contain-message-error').addClass('active');

                        
                    },
                    error: function(error) {
                        $('.loader-waiting').removeClass('active');
                        let err =  JSON.parse(error.responseText).errors;
                        let result = Object.values(err);
        
                        result.forEach( element => {
                            let li = document.createElement('li');
                            document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                        })
                        $('.contain-message-error').addClass('active');


                    }
                })

                
            })
            /**
             * script ajout garantie
             * 
             */
            $('#form-add-garantie').on('submit', function (e) {
                e.preventDefault()
                $('.loader-waiting').addClass('active');
                let url = this.getAttribute('action');
                let form_add_garantie = new FormData($(this)[0]);

                $.ajax({
                    url:url,
                    method:'post',
                    data: form_add_garantie,
                    cache: false,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        $('.loader-waiting').removeClass('active');
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                        $('.contain-message-error').addClass('active');
                        $('#form-add-garantie')[0].reset();
                        $('.contain-message-error').addClass('active');

                        
                    },
                    error: function(error) {
                        $('.loader-waiting').removeClass('active');
                        let err =  JSON.parse(error.responseText).errors;
                        let result = Object.values(err);
        
                        result.forEach( element => {
                            let li = document.createElement('li');
                            document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                        })
                        $('.contain-message-error').addClass('active');


                    }
                })

                
            })

             /**
             * script declaration impaye
             * 
             */
             $('#form-upaid-declaration').on('submit', function (e) {
                e.preventDefault()
                $('.loader-waiting').addClass('active');
                let url = this.getAttribute('action');
                let form_upaid_declaration = new FormData($(this)[0]);

                $.ajax({
                    url:url,
                    method:'post',
                    data: form_upaid_declaration,
                    cache: false,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        $('.loader-waiting').removeClass('active');
                        let li = document.createElement('li');
                        document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                        $('.contain-message-error').addClass('active');
                        $('#form-upaid-declaration')[0].reset();
                        $('.contain-message-error').addClass('active');

                        
                    },
                    error: function(error) {
                        $('.loader-waiting').removeClass('active');
                        let err =  JSON.parse(error.responseText).errors;
                        let result = Object.values(err);
        
                        result.forEach( element => {
                            let li = document.createElement('li');
                            document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= element;
                        })
                        $('.contain-message-error').addClass('active');


                    }
                })

                
            })

})