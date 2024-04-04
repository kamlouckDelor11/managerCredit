// ========================= Ouverture fermeture formulaire================================

/**
* EDITION DES DOSSIERS
*/
const show_data = document.getElementById('print_data');
const contain_print_data = document.getElementsByClassName('contain-sale-log');
const close_contain_print_data = document.getElementsByClassName('close-contain-sale-slog');

show_data.addEventListener('click', ()=>{
    contain_print_data[0].classList.add('active');
});

close_contain_print_data[0].addEventListener('click', ()=>{
    contain_print_data[0].classList.remove('active');
    let contain_sales = document.querySelectorAll('.row-sale-log tr');
    if (contain_sales.length != 0) {
        contain_sales.forEach(element => {
            element.remove();
        });
        $('#display-sale')[0].reset();
    }
})

/**
* INTERFACE ETAT DES PRETS
*/
const show_loan_data = document.getElementById('print_loan_data');
const contain_print_loan_data = document.getElementsByClassName('container-manager-folder-loan');
const close_contain_print_loan_data = document.getElementsByClassName('close-container-manager-folder-loan');

if (show_loan_data) {
    show_loan_data.addEventListener('click', ()=>{
        contain_print_loan_data[0].classList.add('active');
    });
    
    close_contain_print_loan_data[0].addEventListener('click', ()=>{
        contain_print_loan_data[0].classList.remove('active');
    })   
}

/**
* ETAT DES IMPAYES
*/
const show_data_upaid = document.getElementById('data_upaid');
const contain_data_upaid = document.getElementsByClassName('contain-upaid-slog');
const close_contain_data_upaid = document.getElementsByClassName('close-contain-upaid-slog');

if (show_data_upaid) {
    show_data_upaid.addEventListener('click', ()=>{
        contain_data_upaid[0].classList.add('active');
    });
    
    close_contain_data_upaid[0].addEventListener('click', ()=>{
        contain_data_upaid[0].classList.remove('active');
        let contain_upaid = document.querySelectorAll('.row-upaid tr');
        if (contain_upaid.length != 0) {
            contain_upaid.forEach(element => {
                element.remove();
            });
            $('#form-show-upaid-data')[0].reset();
        }
    })   
}

/**
* interroger un pret
*/
const show_data_single_loan = document.getElementById('data_single_loan');
const contain_print_data_single_loan = document.getElementsByClassName('contain-sale-log-single-loan');
const close_contain_print_data_single_loan = document.getElementsByClassName('close-form close-contain-sale-single-slog');

show_data_single_loan.addEventListener('click', ()=>{
    contain_print_data_single_loan[0].classList.add('active');
});

close_contain_print_data_single_loan[0].addEventListener('click', ()=>{
    contain_print_data_single_loan[0].classList.remove('active');
    let contain_sales = document.querySelectorAll('.row-sale-log tr');
    if (contain_sales.length != 0) {
        contain_sales.forEach(element => {
            element.remove();
        });
        $('#form-loan-single')[0].reset();
    }
})

// ============================AJAX=====================================

/** 
 * afficher les dossiers credits
*/
$('#display-sale').on('submit', function (e) {
    e.preventDefault()
    $('.loader-waiting').addClass('active');
    let url = this.getAttribute('action');
    $.ajax({
        url:url,
        method:'post',
        dataType:'json',
        data: $(this).serialize(),

    })
    .done(function (response) {
        $('.loader-waiting').removeClass('active');
        let contain_sales = document.querySelectorAll('.row-sale-log tr');
        if (contain_sales.length != 0) {
            contain_sales.forEach(element => {
                element.remove();
            });
        }
       
        let branches = {
            'f1060815-f4bc-421f-a32a-f8e8b71c8e66': 'SIEGE',
            '69585d3d-d3cd-40f0-a0d7-8f82e41f7596': 'AKWA',
            '37da9e58-c5e1-40a8-bee0-195a37fe79c3': 'CHOCOCHO',
            'e41bb7b0-59e6-4d63-84a8-a2f01b235aff': 'ANATOLE',
            'eb0df684-ed3c-40d1-ba74-89160d74ba19': 'MANJO',
            'f98fc1fc-d8a1-4669-acb4-1845920d3a51': 'NDOKOTI',
            '2e188bc9-fc92-4900-9341-d18be1f2276a': 'LOUM',
            'b6a72092-0419-4c66-872a-84d13e1ab529': 'TSINGA',
            'e1c145f7-2305-4314-b9a0-39d5583ce70c': 'BIYEM-ASSI',
            '4b6da558-ec65-4b7a-9dc6-7525e8011235': 'MOKOLO',
            '71a86774-9b58-4061-9848-77d32e91cdfe': 'BAFOUSSAM',
            'dc441e17-ffd8-47da-9d4d-997e66275a8f': 'BANGOU',
            'c28834d5-b433-44a6-87bc-0621af58f720': 'BONABERI',               
        };

        let nb_row = 1;
        response[0].forEach(element => {
            let date = new Date(element.created_at);
            let token_branch = element.token_branch;
            let local_date = date.toLocaleDateString();
            let amount =Number(element.amount);
            let amountValidated  = Number(element.amountValidated); 
            $('.row-sale-log').append('<tr><td>'+nb_row +'</td> <td>'+local_date+'</td> <td>'+element.custumerName+'</td> <td>'+amount.toLocaleString()+'</td> <td>'+amountValidated.toLocaleString() +'</td> <td>'+branches[token_branch]+'</td> <td>'+element.status+'</td> <td><a style="color:rgb(23, 127, 76)!important; display:inline-block; height:100%; width:100%;" href="/credit/'+element.token+'" target="blank">Affiché</a></td> </tr>')
            nb_row ++
        });
    })
    .fail(function (error) {
        $('.loader-waiting').removeClass('active');
    })
});


/** 
 * afficher l'etat des impayes
*/
$('#form-show-upaid-data').on('submit', function (e) {
    e.preventDefault()
    $('.loader-waiting').addClass('active');
    let url = this.getAttribute('action');
    $.ajax({
        url:url,
        method:'post',
        dataType:'json',
        data: $(this).serialize(),

    })
    .done(function (response) {
        $('.loader-waiting').removeClass('active');
        let contain_sales = document.querySelectorAll('.row-upaid tr');
        if (contain_sales.length != 0) {
            contain_sales.forEach(element => {
                element.remove();
            });
        }
       
        let branches = {
            'f1060815-f4bc-421f-a32a-f8e8b71c8e66': 'SIEGE',
            '69585d3d-d3cd-40f0-a0d7-8f82e41f7596': 'AKWA',
            '37da9e58-c5e1-40a8-bee0-195a37fe79c3': 'CHOCOCHO',
            'e41bb7b0-59e6-4d63-84a8-a2f01b235aff': 'ANATOLE',
            'eb0df684-ed3c-40d1-ba74-89160d74ba19': 'MANJO',
            'f98fc1fc-d8a1-4669-acb4-1845920d3a51': 'NDOKOTI',
            '2e188bc9-fc92-4900-9341-d18be1f2276a': 'LOUM',
            'b6a72092-0419-4c66-872a-84d13e1ab529': 'TSINGA',
            'e1c145f7-2305-4314-b9a0-39d5583ce70c': 'BIYEM-ASSI',
            '4b6da558-ec65-4b7a-9dc6-7525e8011235': 'MOKOLO',
            '71a86774-9b58-4061-9848-77d32e91cdfe': 'BAFOUSSAM',
            'dc441e17-ffd8-47da-9d4d-997e66275a8f': 'BANGOU',
            'c28834d5-b433-44a6-87bc-0621af58f720': 'BONABERI',               
        };

        let nb_row = 1;
        response[0].forEach(element => {
            let dateUpaid = new Date(element.created_at);
            let token_branch = element.token_branch;
            let local_date = dateUpaid.toLocaleDateString();
            let amountUpaid =Number(element.upaidAmount);

            $('.row-upaid').append('<tr><td>'+nb_row +'</td> <td>'+local_date+'</td> <td>'+ element.numberFolder +'</td> <td>'+amountUpaid.toLocaleString()+'</td>  <td>'+branches[token_branch]+'</td> <td><a style="color:rgb(23, 127, 76)!important; display:inline-block; height:100%; width:100%;" href="/pret/'+element.token+'" target="blank">Affiché</a></td> </tr>')
            nb_row ++
        });
    })
    .fail(function (error) {
        $('.loader-waiting').removeClass('active');
    })
});


/** 
 * afficher les dossiers credits
*/
$('#form-loan-single').on('submit', function (e) {
    e.preventDefault()
    $('.loader-waiting').addClass('active');
    let url = this.getAttribute('action');
    $.ajax({
        url:url,
        method:'post',
        dataType:'json',
        data: $(this).serialize(),

    })
    .done(function (response) {
        $('.loader-waiting').removeClass('active');
        let contain_sales = document.querySelectorAll('.row-sale-log tr');
        if (contain_sales.length != 0) {
            contain_sales.forEach(element => {
                element.remove();
            });
        }
       
        let branches = {
            'f1060815-f4bc-421f-a32a-f8e8b71c8e66': 'SIEGE',
            '69585d3d-d3cd-40f0-a0d7-8f82e41f7596': 'AKWA',
            '37da9e58-c5e1-40a8-bee0-195a37fe79c3': 'CHOCOCHO',
            'e41bb7b0-59e6-4d63-84a8-a2f01b235aff': 'ANATOLE',
            'eb0df684-ed3c-40d1-ba74-89160d74ba19': 'MANJO',
            'f98fc1fc-d8a1-4669-acb4-1845920d3a51': 'NDOKOTI',
            '2e188bc9-fc92-4900-9341-d18be1f2276a': 'LOUM',
            'b6a72092-0419-4c66-872a-84d13e1ab529': 'TSINGA',
            'e1c145f7-2305-4314-b9a0-39d5583ce70c': 'BIYEM-ASSI',
            '4b6da558-ec65-4b7a-9dc6-7525e8011235': 'MOKOLO',
            '71a86774-9b58-4061-9848-77d32e91cdfe': 'BAFOUSSAM',
            'dc441e17-ffd8-47da-9d4d-997e66275a8f': 'BANGOU',
            'c28834d5-b433-44a6-87bc-0621af58f720': 'BONABERI',               
        };

        let nb_row = 1;
        response[0].forEach(element => {
            let date = new Date(element.updated_at);
            let token_branch = element.token_branch;
            let local_date = date.toLocaleDateString();
            let amount =Number(element.amount);
            let amountValidated  = Number(element.amountValidated); 
            $('.row-sale-log').append('<tr><td>'+nb_row +'</td> <td>'+local_date+'</td> <td>'+element.custumerName+'</td> <td>'+amount.toLocaleString()+'</td> <td>'+amountValidated.toLocaleString() +'</td> <td>'+branches[token_branch]+'</td> <td>'+element.status+'</td> <td><a style="color:rgb(23, 127, 76)!important; display:inline-block; height:100%; width:100%;" href="/credit/'+element.token+'" target="blank">Affiché</a></td> </tr>')
            nb_row ++
        });
    })
    .fail(function (error) {
        $('.loader-waiting').removeClass('active');
    })
});
