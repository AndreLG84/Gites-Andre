sliderA();
let slider = document.getElementById('slider');
function sliderA(){

    const xhr = new XMLHttpRequest();
    xhr.open('GET', './envoi.php', true);
    xhr.onreadystatechange = function(){
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            let datas = JSON.parse(this.responseText);
            let listDom = '';
            for(let i = 0; i < datas.length; i++){
                // si i est paires
                if(i%2 == 0){
                    listDom += '<div class="shadowbloc"><article class="card rightcard .active"><div class="figure"><img src="./images/campagne.jpg" class="img-slider" width="100%" alt=""></div><div class="content">'+ datas[i].ville+'</div></article>'
                // si i est impaire
                console.log(datas[i].img)
                } else {                                                                            // mettre datas.img dans lien 
                    listDom += '<article class="card leftcard"><div class="figure"><img src="./images/campagne.jpg" class="img-slider" width="100%" alt=""></div><div class="content">' + datas[i].ville + '</div> </article></div>'  
                }
            };
            slider.innerHTML += listDom;
            sliding()
        }
    };
    xhr.send();
}

function sliding(){
    let sdbloc = document.getElementsByClassName('shadowbloc')
    let etape = 0
    let nbr_bloc = sdbloc.length 
    let precedent = document.querySelector('.precedent')
    let suivant = document.querySelector('.suivant')

    sdbloc[0].classList.add('active');

    function enleverActiveImages () {
        for(let i = 0; i < nbr_bloc; i++) {
            sdbloc[i].classList.remove('active')
        }
    }

    suivant.addEventListener('click',function() {
        etape++;
        if(etape >= nbr_bloc) {
            etape = 0;
        }
        enleverActiveImages();
        sdbloc[etape].classList.add('active');
    })

    precedent.addEventListener('click',function() {
        etape--;
        if(etape < 0) {
            etape = nbr_bloc - 1;
        }
        enleverActiveImages();
        sdbloc[etape].classList.add('active');
    })
}

