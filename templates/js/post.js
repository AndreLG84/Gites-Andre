initData()

function initData() {
    const listUl = document.getElementById('list-gite');
    const xhr = new XMLHttpRequest(); // création d'une instance avec l'objet XMLHttpRequest

    xhr.open('GET', '../admin/select.php', true)
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE/*<- Constante */ && this.status === 200) {
            let datas = JSON.parse(this.responseText); // envoie de données retransforme dans le format qu'il comprend 
            let listDom = '';
            for (let data of datas) {
                listDom += '<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"> <h2 class="h4 m-0">> ' + data.ville +  ' ' + data.type_logement + ' ' + data.disponibilite + '</h2><div ><div><a href="edit.php?id=' + data.id_logement + '" title="Edit"><img src="../templates/images/edit1.jpg" alt="" height="30px"></a> </div> <div> <a href="#" data-id="' + data.id_logement + '" title="Delete" class="btn-delete-post" id="btn-delete"><img src="../templates/images/delete.svg" alt="" height="30px"></a> </div> </div></li>'
            }
            listUl.innerHTML = listDom;

            document.getElementById('nb-posts').innerHTML = countLi()
            

            showModal()
            hideModal()
            recupId()
            deleteConfirm()
            deletPost()
        }
    }
    xhr.send(); // asynchrone ne recharge pas
}
function countLi() {
    return document.getElementsByClassName('list-group-item').length
}

function showModal() {
    const myModal = document.getElementById('myModal')
    const btnDelet = document.getElementsByClassName('btn-delete-post')
    for (const element of btnDelet) (
        element.addEventListener("click", function (e) {
            e.preventDefault()
            myModal.style.display = "block"
        })
    )
}

function hideModal() {
    const btnSecondary = document.getElementsByClassName('btn-secondary')
    for (const element of btnSecondary) (
        element.addEventListener("click", function (e) {
            e.preventDefault()
            myModal.style.display = "none"
        })
    )
}

function deletPost(id, ){
    const xhr = new XMLHttpRequest();

    xhr.open('POST', '../admin/delete.php', true)
    
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function(){
        if (this.ready === XMLHttpRequest.DONE && this.status === 200){
            initData();
            const alertBoxBlock = document.getElementById('alert-box')
            if(!document.getElementById('alert-box')){
                afterElement.before(alertBox('success', 'L\'article a bien été supprimé :)'))
            } else {
                document.getElementById('alert-box').style.dsiplay = 'block';
            }
            afterElement.before(alertBox('success', 'Aie :)'))

            setInterval(() =>{
                document.getElementById.apply('alert-box').style.display = 'none'
            })
            setTimeout(function (){
                alertBoxBlock.style.display = 'block';
            }, 3000);
        }
    }
    xhr.send("id_logement=" + id);
}

function alertBox(type, message){
    const box = document.createElement('div');
    box.setAttribute('id','alert-box');
    return `<div class="alert alert-${type} mt-3" role="alert">${message}</div>`
}


function recupId() {
    const btnSupp = document.getElementsByClassName('btn-delete-post');
    for (const element of btnSupp) (
        element.addEventListener("click", function (e) {
            
            e.preventDefault();//Annule le lien
            let idPost = this.dataset.id;   //représente l'élément clické et stocké dans le data
            console.log(idPost);
            deleteConfirm(idPost) //met l'info dans la fonction
        })
    )
}
function deleteConfirm(deleteConfirm) {
    const btnYes = document.getElementById('deleteBtn'); //btn oui confirm
    btnYes.addEventListener("click", function () {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../admin/delete.php', true);
        xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
        if (xhr.readyState != 4 && xhr.status != 200) {
            initData()
            myModal.style.display ='none';
        } else {
            initData() 
            myModal.style.display ='none';
            }
        }
        xhr.send("id_logement=" + deleteConfirm);
    })
}



