/**
* ouverture et fermeture des formulaires
*/

// =========================recouvrement=================

const show_contain_form_recouvery_upaid = document.getElementById('recouvery-upaid-btn');

const contain_form_recouvery_upaid  = document.getElementsByClassName('content-form-recouvery-upaid');
const close_contain_form_recouvery_upaid = document.getElementsByClassName('close-content-form-recouvery-upaid');

if (show_contain_form_recouvery_upaid) {
    show_contain_form_recouvery_upaid.addEventListener('click', ()=>{
        contain_form_recouvery_upaid[0].classList.add('active');
    });

    close_contain_form_recouvery_upaid[0].addEventListener('click', ()=>{
        contain_form_recouvery_upaid[0].classList.remove('active');
        $('#form-recouvery-upaid')[0].reset();
    })
    
}
// ========================= action recouvrement=================

const show_contain_form_recouvery_upaid_action = document.getElementById('recouvery-upaid-action-btn');

const contain_form_recouvery_upaid_action  = document.getElementsByClassName('content-form-recouvery-upaid-action');
const close_contain_form_recouvery_upaid_action = document.getElementsByClassName('close-content-form-recouvery-upaid-action');

if (show_contain_form_recouvery_upaid_action) {
    show_contain_form_recouvery_upaid_action.addEventListener('click', ()=>{
        contain_form_recouvery_upaid_action[0].classList.add('active');
    });

    close_contain_form_recouvery_upaid_action[0].addEventListener('click', ()=>{
        contain_form_recouvery_upaid_action[0].classList.remove('active');
        $('#form-recouvery-action')[0].reset();
    })
    
}
// ========================= consultation action recouvrement=================

const show_contain_action_recouvery = document.getElementById('show-action-recouvery-btn');

const contain_action_recouvery  = document.getElementsByClassName('contain-action-recouvery');
const close_contain_action_recouvery = document.getElementsByClassName('close-form close-contain-action-recouvery');

if (show_contain_action_recouvery) {
    show_contain_action_recouvery.addEventListener('click', ()=>{
        contain_action_recouvery[0].classList.add('active');
    });

    close_contain_action_recouvery[0].addEventListener('click', ()=>{
        contain_action_recouvery[0].classList.remove('active');
    })
    
}


// ==================================================ajax=====================================
$(document).ready(function(){

    /** 
     * recouvrement
    */
        $('#form-recouvery-upaid').on('submit', function (e) {
            e.preventDefault()
            $('.loader-waiting').addClass('active');
            let url = this.getAttribute('action');
            let form_recouvery_upaid = new FormData($(this)[0]);
            $.ajax({
                url:url,
                method:'post',
                data: form_recouvery_upaid,
                cache: false,
                contentType: false, 
                processData: false,
                success: function(response) {
                    $('.loader-waiting').removeClass('active');
                    let li = document.createElement('li');
                    document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                    $('.contain-message-error').addClass('active');
                    $('#form-recouvery-upaid')[0].reset();
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
         * action recouvrement
        */
        $('#form-recouvery-action').on('submit', function (e) {
            e.preventDefault()
            $('.loader-waiting').addClass('active');
            let url = this.getAttribute('action');
            let form_recouvery_upaid_action = new FormData($(this)[0]);
            $.ajax({
                url:url,
                method:'post',
                data: form_recouvery_upaid_action,
                cache: false,
                contentType: false, 
                processData: false,
                success: function(response) {
                    $('.loader-waiting').removeClass('active');
                    let li = document.createElement('li');
                    document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                    $('.contain-message-error').addClass('active');
                    $('#form-recouvery-action')[0].reset();
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
    * validation champs 
    */
    $(document).on('input', '#amount-recouvery', function (e) {
        let reg = /^[0-9]*$/;
        let valid = e.target.value;
        if (reg.test(valid) == false) {
            document.querySelector('#amount-recouvery').value='';               
        }
    })
})