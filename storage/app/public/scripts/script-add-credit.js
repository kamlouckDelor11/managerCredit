/**
* ouverture et fermeture des formulaires
*/

const show_contain_add_credit = document.getElementById('add_credit');

const contain_add_credit = document.getElementsByClassName('contain-add-credit');
const close_contain_add_credit = document.getElementsByClassName('close-contain-add-credit');

show_contain_add_credit.addEventListener('click', ()=>{
    contain_add_credit[0].classList.add('active');
});

close_contain_add_credit[0].addEventListener('click', ()=>{
    contain_add_credit[0].classList.remove('active');
    $("#form-add-credit")[0].reset();
})

// ==================== ajax========================
$(document).ready(function(){
/** 
 * enregistrement d'un dossier credit
*/
    $('#form-add-credit').on('submit', function (e) {
        e.preventDefault()
        $('.loader-waiting').addClass('active');
        let url = this.getAttribute('action');

        let form_data = new FormData($(this)[0]);
            
        $.ajax({
            url:url,
            method:'post',
            data: form_data,
            cache: false,
            contentType: false, 
            processData: false,
            success: function(response) {
                $('.loader-waiting').removeClass('active');
                let li = document.createElement('li');
                document.querySelector('p#error-message-contain-spent-item').appendChild(li).innerHTML= response.message;
                $('.contain-message-error').addClass('active');
                $("#form-add-credit")[0].reset();
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

    // ====================================================================================================================



})


