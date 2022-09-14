let btnDelete = document.getElementsByClassName('btn-delete-post')
let myModal = document.getElementById('myModal')
let closeBtn = document.getElementById('closeBtn')
let deleteBtn = document.getElementById('deleteBtn')
let alertPlaceholder = document.getElementById('list-gite')
let idGite

for (const element of btnDelete) {
    element.addEventListener('click', function (e) {
        e.preventDefault()
        idGite = this.dataset.id
        myModal.style.display = 'block'

        closeAction(closeBtn, function () {
            myModal.style.display = 'none'
        })

        deleteBtn.addEventListener('click', function () {
            deletePost(idGite, element)
        })
    })
}

function deletePost(id, el) {
    const kbd = document.getElementById('nb-posts')
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../admin/delete.php', true)

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            el.parentNode.parentNode.parentNode.remove();
            myModal.style.display = 'none'
            kbd.innerHTML = document.getElementsByClassName('list-group-item').length

            alertMessage(this.responseText, 'success')
            
            let alertBoxBtn = document.getElementById('closeAlert')

            closeAction(alertBoxBtn, function () {
                alertBoxBtn.parentNode.parentNode.style.display = 'none'
            })
        }
    }
    xhr.send("id=" + id);
}

function alertMessage(message, type) {
    let alertBox = document.getElementById('alertBox')
    
    if(!document.getElementById('alertBox')){
        let wrapper = document.createElement('div')
        wrapper.setAttribute('id', 'alertBox')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible mt-5" role="alert">' + message + '<button type="button" class="btn-close" aria-label="Close" id="closeAlert"></button></div>'

        alertPlaceholder.before(wrapper)
    } else {
        alertBox.style.display = 'block'
    }
    
}

function closeAction(btn, callback){
    btn.addEventListener('click', function(){
        callback()
    })
}