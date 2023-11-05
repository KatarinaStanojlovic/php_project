

//Show more funkcionalnost
$('#showMore1').click(function(){
    
    $('#moreText1').toggle()
    if($('#moreText1').is(':visible'))
    {
        $(this).html('Show less');
    }
    else
    {
        $(this).html('Show more');
    }
})

$('#showMore2').click(function(){
    $('#moreText2').toggle()
    if($('#moreText2').is(':visible'))
    {
        $(this).html('Show less');
    }
    else
    {
        $(this).html('Show more');
    }
})

$('#showMore3').click(function(){
    $('#moreText3').toggle()
    if($('#moreText3').is(':visible'))
    {
        $(this).html('Show less');
    }
    else
    {
        $(this).html('Show more');
    }
})

$('#showMore4').click(function(){
    $('#moreText4').toggle()
    if($('#moreText4').is(':visible'))
    {
        $(this).html('Show less');
    }
    else
    {
        $(this).html('Show more');
    }
})

// //Onload animacija

// let bg = document.createElement('div');
// $(bg).attr('id','loaderBackground');
// $(bg).css(
//     {
//         'position':'fixed',
//         'top':'0',
//         'left':'0',
//         'width':'100vw',
//         'height':'100vh',
//         'z-index':'1000',
//         'background':'#33211D',
//         'display':'flex',
//         'justify-content':'center',
//         'align-items':'center',
//     }
// )

// let counter = document.createElement('p');
// $(counter).css(
//     {
//         'color':'whitesmoke',
//         'font-weight':'bold',
//         'font-size':'4rem',
//         'font-family':'Roboto, san-serif'
//     }
// )

// let load = 1;
// $(counter).html(load+'%');
// $(bg).append(counter);
// $('body').append(bg);
// $('body').css('overflowY','hidden');

// function increment(){
//     load++; //brojac
//     $(counter).html(load+'%');
//     if(load==100) //ako je 100%
//     {
//         clearInterval(interval); //prekid intervala
//         $('body').css('overflowY','scroll');
//     }
//     if(load == 80)
//     {
//         $(counter).fadeOut('slow'); //gasenje overlay-a
//         $(bg).fadeOut('slow');
//     }
// }

// let interval = setInterval(increment,15);

////// VALIDACIJA FORME ///////

var fullName=document.getElementById("fullName");
var surname = document.getElementById("surname");
var username = document.getElementById("username");
var email=document.getElementById("email");
var password = document.getElementById("pass");
var passwordRepeat = document.getElementById("repeat");

var errFullName = document.querySelector('#errFullName');
var errSurname = document.querySelector("#errSurname");
var errUsername = document.querySelector("#errUsername");
var errEmail = document.querySelector('#errEmail');
var errPassword = document.querySelector("#errPassword")
var errRepeat = document.querySelector("#errRepeat");

var btnReg = document.querySelector('#regBtn');
var btnLog = document.querySelector("#logBtn");


var regexFullName = /^([a-zšđčćžA-ZŠĐČĆŽ]{2,20})+$/;
var regexSurname = /^([a-zšđčćžA-ZŠĐČĆŽ]{2,20})+$/;
var regexUsername = /^[A-Z][a-z0-9_-]{5,}$/;
var regexEmail = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
var regexPassword = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;


function fullNameCheck() {
    if(fullName != null){
        if (regexFullName.test(fullName.value)){
            errFullName.innerHTML='';
            errFullName.classList.remove('bad');
            return true;
        } 
        else {
          errFullName.innerHTML = "Correct format: Dolly";
          errFullName.classList.add('bad');
          return false;
        }
    }
};

function usernameCheck() {
    if(username != null){
        if (regexUsername.test(username.value)){
            errUsername.innerHTML='';
            errUsername.classList.remove('bad');
            return true;
        } 
        else {
            errUsername.innerHTML = "Correct format: Dolly_bell01";
            errUsername.classList.add('bad');
          return false;
        }
    }
    
};

function surnameCheck() {
    if(surname != null){
        if (regexSurname.test(surname.value)){
            errSurname.innerHTML='';
            errSurname.classList.remove('bad');
            return true;
        } 
        else {
            errSurname.innerHTML = "Correct format: Bell";
            errSurname.classList.add('bad');
          return false;
        }
    }
  
};

function passwordCheck () {
    if (regexPassword.test(password.value))
    {
        errPassword.innerHTML = '';
        errPassword.classList.remove('bad');
        return true
    }
    else {
        errPassword.innerHTML = "Password should contain minimum six characters, one number and one special character.";
        errPassword.classList.add('bad');
        return false
    }
};

function passRepeat(){
    if(passwordRepeat != null){
        if (passwordRepeat.value == password.value)
    {
        errRepeat.innerHTML = '';
        errRepeat.classList.remove('bad');
        return true
    }
    else {
        errRepeat.innerHTML = "Password does not match.";
        errRepeat.classList.add('bad');
        return false
    }
    }
    
};

function emailCheck() {
        if(email != null){
        if (regexEmail.test(email.value))
        {
            errEmail.innerHTML = '';
            errEmail.classList.remove('bad');
            return true
        }
        else {
            errEmail.innerHTML = "Correct format: example@gmail.com";
            errEmail.classList.add('bad');
            return false
    }
}
   
};



if(fullName != null && password != null && passwordRepeat != null && surname != null && username != null && email != null){
    fullName.addEventListener("blur", fullNameCheck);
    email.addEventListener("blur", emailCheck);
    surname.addEventListener("blur", surnameCheck);
    username.addEventListener("blur", usernameCheck);
    password.addEventListener("blur", passwordCheck);
    passwordRepeat.addEventListener("blur", passRepeat);
}


if(btnReg != null){
    btnReg.onclick = function formCheck(e){  
        e.preventDefault();
    
        fullNameCheck();
        emailCheck();
        surnameCheck();
        usernameCheck();
        passwordCheck();
        passRepeat();
    
        if (fullNameCheck() && emailCheck() && surnameCheck() && usernameCheck() && passwordCheck() && passRepeat()){
            

            $.ajax({
                url:"models/registracija.php",
                method:"post",
                dataType:"json",
                data:{
                    usr:username.value,
                    pass:password.value,
                    ime:fullName.value,
                    prezime:surname.value,
                    email:email.value
                },
                success:function(data){
                    if(data == "index.php"){
                        window.location.href = data
                    }
                    else {
                        regErr.innerHTML=data
                    }
                },
                error:function(xhr){
                    console.log(xhr)
                }
            })
        }
        else
        {
            return false;
        }
    }
}

if(btnLog != null){
    btnLog.onclick = function formCheck(e){  
        e.preventDefault();
    
        
        usernameCheck();
        passwordCheck();
        
    
        if (usernameCheck() && passwordCheck()){
            

            $.ajax({
                url:"models/proveraLogin.php",
                method:"post",
                dataType:"json",
                data:{
                    usr:username.value,
                    pass:password.value
                },
                success:function(data){
                    if(data == "index.php"){
                        window.location.href = data
                    }
                    else {
                        loginErr.innerHTML=data
                    }
                 
                },
                error:function(xhr){
                    console.log(xhr)
                }
            })
        }
        else
        {
            return false;
        }
    }
}


//Logout

var logoutBtn = document.querySelector("#logout");

if(logoutBtn != null){
    logoutBtn.onclick= function(){
        $.ajax({
            url:"models/logout.php",
            method:"post",
            dataType:"json",
            success:function(data){
                window.location.href = data;
            },
            error:function(xhr){
                console.log(xhr)
            }
    
        })
    }
    
}

//Header prati na scroll
addEventListener('scroll', function(){
    if(scrollY>0)
    {
        navbar.classList.add('follow');
    }
    else
    {
        navbar.classList.remove('follow');
    }
})

//Lightroom kreiranje

var lightroomBg = document.createElement('div');
lightroomBg.classList.add('lightroomBg');

var imgContainer = document.createElement('img');
imgContainer.classList.add('imgContainer');

var imgDescription = document.createElement('p');
imgDescription.classList.add('description')

lightroomBg.appendChild(imgContainer);
lightroomBg.appendChild(imgDescription);

addEventListener('click',function(x){
    if(x.target.classList.contains('lightroom'))
    {
        document.querySelector('body').appendChild(lightroomBg);
        imgContainer.src = x.target.src;
        imgDescription.innerHTML=x.target.alt;
    }
    
    if(x.target.classList.contains('lightroomBg'))
    {
        lightroomBg.remove();
        imgContainer.src = '';
        imgDescription.innerHTML='';
    }
})

//menu open

var menuOpener = document.querySelector('#burger');
var menu = document.querySelector('#burgerMenu');
opened = false;

menuOpener.onclick = function(){
    if(!opened)
    {
        menu.style.transform = 'translateX(0)';
        opened=true;
    }
    else
    {
        menu.style.transform = 'translateX(100%)';
        opened=false;
    }
}

//menu zatvaranje na klik izvan
document.onclick = function(x)
{
    if(opened==1 && x.target.id!="burger" && x.target.parentNode.id!="burger")
    {
        burgerMenu.style.transform="translateX(100%)";
        opened=false;
    }
}


//Add to cart
var addToCartBtn = document.getElementsByClassName("add");
var modal1Btn = document.getElementById("m1Btn");
var modalAddToCartBtn = document.getElementById("modalAddToCart");

    for(let a of addToCartBtn){

        a.onclick = function(){
            var idProizvod=a.dataset['id'];
            $("#modal1").toggle(500)
            console.log(idProizvod)

            if(modalAddToCartBtn != null){
                modalAddToCartBtn.onclick = function(){
                    var idUser = this.dataset['user']
        
                    $.ajax({
                        url:"models/dodavanjeUKorpu.php",
                        method:"post",
                        dataType:"json",
                        data:{
                            userKorpa:idUser,
                            proizvodKorpa:idProizvod
                        },
                        success:function(data){
                             alert(data)
                            window.location.href="menu.php"
                        
                        },
                        error:function(xhr){
                            console.log(xhr)
                        }
                    })
    
                    $("#modal1").toggle(500)
                }
            }
          
        }
    }
if(modal1Btn != null){
    modal1Btn.onclick = function(){
        $("#modal1").toggle(500)
    }
}

//Anketa

var anketaBtn = document.querySelector("#btnAnketa");
var modal2Btn = document.getElementById("m2Btn");

if(modal2Btn != null){
    modal2Btn.onclick = function(){
        $("#modal2").toggle(500)
    }
}

if(anketaBtn != null){
    anketaBtn.onclick = function(){
        
        $("#modal2").toggle(500)
    }
}



//Pretraga po nazivu

// var search = document.getElementById("search-input");

// search.onkeyup = function(){
//     var value = this.value

//     if(value != ""){

//         $.ajax({
//             url:"models/pretragaPoNazivu.php",
//             method:"post",
//             dataType:"json",
//             data:{
//                 vrednost:value
//             },
//             success: function(data){
//                 console.log(data)
//             },
//             error: function(xhr){
//                 console.log(xhr)
//             }
//         })
        

//     }
// }

//Kategorije
var fKategorije = document.querySelectorAll(".kat")

for(let k of fKategorije){
    k.onclick = function(){
        var idK = this.id

        $.ajax({
            url:"../models/filter.php",
            method:"post",
            dataType:"json",
            data: {
                idKat: idK
            },
            success(data){
                console.log(data)

                var polje = document.querySelector(".card")
                polje.innerHTML=``

                for(let d of data){
                    polje.innerHTML += `<img src="${d.slikaProizvod}" alt="${d.nazivProizvod}" class="rounded-circle mb-3 mb-sm-0 img-fluid"/><br>
                <h5>${d.nazivProizvod}</h5>
                <p> ${d.kalorije} calories </p>
                <p> ${d.cena}$</p>
            
                <div class="btn">
                <button  type="button" class="btn-Cart add" data-id="#"> ADD TO CART</button>`
                }
                
            },
            error(xhr){
                console.log(xhr)
            }
        })
    }
}


//Slanje poruka

var mSubject = document.getElementById("mSubject");
var mContent = document.getElementById("mContent");

var mailBtn = document.getElementById("mailBtn");

if(mailBtn != null){
    mailBtn.onclick = function(e){
        e.preventDefault();

        var mail = this.dataset['mail']

        if(mSubject.value == "" && mContent == ""){
            alert("Fields are empty")
        }
        else{
            $.ajax({
                url:"models/mail.php",
                method:"post",
                dataType:"json",
                data:{
                    subject: mSubject.value,
                    content: mContent.value,
                    mailer: mail
                },
                success: function(data){

                    // $(document).ready(function() {

                    //     Swal.fire({
                    //         icon: 'success',
                    //         title: data,
                    //         showConfirmButton: true,
                    //         }).then((result) => {
                    //             if (result.isConfirmed) {
                    //             location.reload();
                    //         }
                    //         });
                    //         });
                         },
                error : function(xhr){
                        console.log(xhr)
                }
            })
        }
    }


}

//Delete product
var delButtons = document.getElementsByClassName('deleteCoffee');
var updateButtons = document.getElementsByClassName("updateCoffee");
var m3Btn = document.querySelector("#m3Btn");


if(delButtons != null){

    
 for (let but of delButtons) {

    but.onclick = function(){


        var idDel = this.dataset['iddel'];

        $.ajax({
            url: "models/delProduct.php",
            method : "post",
            dataType : "json",
            data: { 

                id : idDel

            },
            success : function(data){
                alert(data);
                window.location.href="menu.php"
            },
            error : function(xhr){
                console.log(xhr);
            }
        })
        
    }
 }

}

//Update

var newName = document.getElementById("newPro");
var newCalories = document.getElementById("newC");
var newPrice = document.getElementById("newPrice");
var descripton = document.getElementById("desc");

var newNameErr= document.getElementById("newNameErr");
var newCaloriesErr = document.getElementById("newCaloriesErr");
var newPriceErr = document.getElementById("newPriceErr");
var newDescErr = document.getElementById("newDescErr");

var btnProdUpdate = document.getElementById("btnProdUpdate");

if(updateButtons != null){

    for (let up of updateButtons) {
   
       up.onclick = function(){
        var brojac=0
         
           $("#modal3").toggle(500)
           var idUpdate = this.dataset['idupdate'];

            console.log(idUpdate)
           idU.innerHTML=`${idUpdate}`;

           if(btnProdUpdate != null){
            btnProdUpdate.onclick = function(){
                e.preventDefault()
               
                
                if(newName.value == ""){
                    brojac++
                    newNameErr.innerHTML = "Field can not be empty!"
                    newNameErr.classList.add('bad')
                }
                else{
                    newNameErr.innerHTML = ""
                    newNameErr.classList.remove('bad')
                }
                
                if(newCalories.value == ""){
                    brojac++
                    newCaloriesErr.innerHTML = "Field can not be empty!"
                    newCaloriesErr.classList.add('bad')
                }
                else{
                    newCaloriesErr.innerHTML = ""
                    newCaloriesErr.classList.remove('bad')
                }
                
                if(newPrice.value == ""){
                    brojac++
                    newPriceErr.innerHTML = "Field can not be empty!"
                    newPriceErr.classList.add('bad')
                }
                else{
                    newPriceErr.innerHTML = ""
                    newPriceErr.classList.remove('bad')
                }
                
                if(descripton.value == ""){
                    brojac++
                    newDescErr.innerHTML = "Field can not be empty!"
                    newDescErr.classList.add('bad')
                }
                else{
                    newDescErr.innerHTML = ""
                    newDescErr.classList.remove('bad')
                }
        
                if(brojac == 0){
                    $.ajax({
                        url:"models/updateProizvoda.php",
                        method:"post",
                        dataType:"json",
                        data:{
                            id:idUpdate,
                            novoIme: newName.value,
                            noveKalorije: newCalories.value,
                            novaCena: newPrice.value,
                            noviOpis: descripton.value
                        },
                        success:function(data){
                            alert(data)
                            window.location.href="menu.php"
                        },
                        error: function(xhr){
                            console.log(xhr)
                        }
                    })
                }
            }
        }
           
       }
    }
   
   }
if(m3Btn != null){
    m3Btn.onclick = function(){
        $("#modal3").toggle(500)
    }
}
  
  
  
 //Insert
 
 
 var productName = document.getElementById("productName");
 var calories = document.getElementById("calories");
 var price = document.getElementById("price");
 var descProduct = document.getElementById("description");
 var slika = document.getElementById("slika");
 var category = document.getElementById("insertCategory");
 
 var nameErr = document.getElementById("nameErr");
 var caloriesErr = document.getElementById("caloriesErr");
 var priceErr = document.getElementById("priceErr");
 var descErr = document.getElementById("descErr");
var slikaErr = document.getElementById("slikaErr");
var catErr = document.getElementById("catErr")

 var regSlika = /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i;
 
 var btnInsert = document.getElementById("btnProdInsert");
 
 if(btnInsert != null){
   
       btnInsert.onclick = function(){
           
        var brojac=0
        
                if(slika.value == ""){
                    brojac++
                    slikaErr.innerHTML = "Field can not be empty!"
                    slikaErr.classList.add('bad')
                    console.log("slikane1")

                }
                else if(!regSlika.test(slika.value)){
                    brojac++
                    slikaErr.innerHTML = ""
                    slikaErr.classList.add('bad')
                    console.log("slikane")
                }
                else{
                    slikaErr.innerHTML = ""
                    slikaErr.classList.remove('bad')
                    console.log(slika.value)
                }
                if(productName.value == ""){
                    brojac++
                    nameErr.innerHTML = "Field can not be empty!"
                    nameErr.classList.add('bad')
                    console.log("namene")
                }
                else{
                    nameErr.innerHTML = ""
                    nameErr.classList.remove('bad')
                    console.log("name")
                }
                
                if(calories.value == ""){
                    brojac++
                    caloriesErr.innerHTML = "Field can not be empty!"
                    caloriesErr.classList.add('bad')
                    console.log("kalorijene")
                }
                else{
                    caloriesErr.innerHTML = ""
                    caloriesErr.classList.remove('bad')
                    console.log("kalorije")
                }
                
                if(price.value == ""){
                    brojac++
                    priceErr.innerHTML = "Field can not be empty!"
                    priceErr.classList.add('bad')
                    console.log("cenane")
                }
                else{
                    priceErr.innerHTML = ""
                    priceErr.classList.remove('bad')
                    console.log("cena")
                }
                
                if(descProduct.value == ""){
                    brojac++
                    descErr.innerHTML = "Field can not be empty!"
                    descErr.classList.add('bad')
                    console.log("descno")
                }
                else{
                    descErr.innerHTML = ""
                    descErr.classList.remove('bad')
                    console.log("desc")
                }
                if(category.value == ""){
                    brojac++
                    catErr.innerHTML = "Field can not be empty!"
                    catErr.classList.add('bad')
                    console.log("katne")
                }
                else{
                    catErr.innerHTML = ""
                    catErr.classList.remove('bad')
                    console.log("kat")
                }
        


                var formData = new FormData();
                formData.append('ime', productName.value);
                formData.append('slika', slika.files[0]);
                formData.append('opis', descProduct.value);
                formData.append('cena', price.value);
                formData.append('kalorije', calories.value);
                formData.append('kategorija', category.value);


                if(brojac == 0){
                    $.ajax({
                        url:"models/insertProizvoda.php",
                        method:"post",
                        dataType:"json",
                        data : formData,
                        contentType: false,
                        processData: false,
                        success:function(data){
                            alert(data)
                           
                            console.log(data)
                        },
                        error: function(xhr){
                            console.log(xhr)
                        }
                    })
                }
            }
   
   }



//Update korisnika

var imeKorisnika = document.getElementById("imeKorisnika");
var prezimeKorisnika = document.getElementById("prezimeKorisnika");
var usernameKorisnika = document.getElementById("usernameKorisnika");
var emailKorisnika = document.getElementById("emailKorisnika");

var btnUpdateKorisnika =  document.getElementsByClassName("btnUpdateKorisnika");
var btnDeleteKorisnika = document.getElementsByClassName("btnDeleteKorisnika");

var imeKorisnikaErr = document.getElementById("imeKorisnikaErr");
var prezimeKorisnikaErr = document.getElementById("prezimeKorisnikaErr");
var usernameKorisnikaErr = document.getElementById("usernameKorisnikaErr");
var emailKorisnikaErr = document.getElementById("emailKorisnikaErr");

var btnUserUpdate = document.getElementById("btnUserUpdate");



if(btnUpdateKorisnika != null){

    for (let up of btnUpdateKorisnika) {
   
       up.onclick = function(){
           
             $("#modal3").toggle(500)
        var brojac=0
         
          var idUpdate = this.dataset['idupdate'];

          

           if(btnUserUpdate != null){
            btnUserUpdate.onclick = function(e){
                e.preventDefault()
        
               
                
                if(imeKorisnika.value == ""){
                    brojac++
                    imeKorisnikaErr.innerHTML = "Field can not be empty!"
                    imeKorisnikaErr.classList.add('bad')
                }
                else{
                    imeKorisnikaErr.innerHTML = ""
                    imeKorisnikaErr.classList.remove('bad')
                }
                
                if(prezimeKorisnika.value == ""){
                    brojac++
                    prezimeKorisnikaErr.innerHTML = "Field can not be empty!"
                    prezimeKorisnikaErr.classList.add('bad')
                }
                else{
                    prezimeKorisnikaErr.innerHTML = ""
                    prezimeKorisnikaErr.classList.remove('bad')
                }
                
                if(usernameKorisnika.value == ""){
                    brojac++
                    usernameKorisnikaErr.innerHTML = "Field can not be empty!"
                    usernameKorisnikaErr.classList.add('bad')
                }
                else{
                    usernameKorisnikaErr.innerHTML = ""
                    usernameKorisnikaErr.classList.remove('bad')
                }
                
                if(emailKorisnika.value == ""){
                    brojac++
                    emailKorisnikaErr.innerHTML = "Field can not be empty!"
                    emailKorisnikaErr.classList.add('bad')
                }
                else{
                    emailKorisnikaErr.innerHTML = ""
                    emailKorisnikaErr.classList.remove('bad')
                }
        
                if(brojac == 0){
                    $.ajax({
                        url:"models/updateUser.php",
                        method:"post",
                        dataType:"json",
                        data:{
                            id:idUpdate,
                            imeKorisnika: imeKorisnika.value,
                            prezimeKorisnika: prezimeKorisnika.value,
                            usernameKorisnika: usernameKorisnika.value,
                            emailKorisnika: emailKorisnika.value
                        },
                        success:function(data){
                            alert(data)
                            window.location.href="korisnici.php"
                            console.log(data)
                        },
                        error: function(xhr){
                            console.log(xhr)
                        }
                    })
                }
            }
        }
           
       }
    }
   
   }


//Delete korisnika

if(btnDeleteKorisnika != null){

    
 for (let btn of btnDeleteKorisnika) {

    btn.onclick = function(){

        var idDelete = this.dataset['iddelete'];
        
        
         $.ajax({
            url: "models/delUser.php",
            method : "post",
            dataType : "json",
            data: { 

                id : idDelete

            },
            success : function(data){
                alert(data);
                window.location.href="korisnici.php"
               // console.log(data)
            },
            error : function(xhr){
                console.log(xhr);
            }
        })

      
        
    }
 }

}








// //Dodavanje proizvoda u korpu
// function dodajUKorpu(){
//     alert("uspesno")
//     let proizvodiUKorpi = dohvatiLocalStorageItem("proizvodiKorpa")
//     let id = $(this).data("id")

//     let addedItemText = document.querySelector("#added-item");
//     let addedItemP = document.querySelector("#text-item-p");
            
//     addedItemText.classList.remove("hide");
//     addedItemP.innerHTML = "You have successfully added an item to your cart!";
            
//     // setInterval(function(){
//     //         addedItemText.classList.add("hide");
//     //         addedItemP.innerHTML="";
//     // },5000)
  
    
    
// }


// function prikazKorpe(){
    
// let proizvodiUKorpi = dohvatiLocalStorageItem("proizvodiKorpa")
//     if(proizvodiUKorpi == null){
//         prikazPrazneKorpe()
//     }
//     else{
//         popunjavanjeKorpe()
//     }
    
// }

// function prikazPrazneKorpe(){
//     $("#cartDiv").html(`<div class="text-danger h2 bg rounded p-3 mt-5">Your cart is empty!</div>`)
// }


// function popunjavanjeKorpe(){
//     let proizvodiUKorpi = dohvatiLocalStorageItem("proizvodiKorpa")

//     let proizvodi = []
//     let sviProizvodi = dohvatiLocalStorageItem("productLS")
//     proizvodi = sviProizvodi.filter(k=>{
//         for(let n of proizvodiUKorpi){
//             if(k.id == n.id){
//                 k.kolicina = n.kolicina
//                 return true
//             }
//         }
//         return false
//     })
//     ispisKorpe(proizvodi)
    
// }
// function ispisKorpe(proizvodi){
//     let ispis =` <table class="table text-center mb-0 ">
//     <thead class="bg-secondary text-white ">
//     <tr class="text-center">
//         <th>Products</th>
//         <th>Name</th>
//         <th>Price</th>
//         <th>Quantity</th>
//         <th>Total</th>
//         <th>Remove</th>
//     </tr>
// </thead>
// <tbody id="cartTable" class="align-middle">`
//     let sum =0
//     for(let n of proizvodi){
//         ispis+= `<tr id="${n.id}" class="red">
//             <td class="align-left"><img src="${n.slika.src}" style="width: 100px;"></td>
//             <td class="naziv align-middle">${n.naziv}</td>
//             <td class=" align-middle">$${n.cena}</td>
//             <td class="align-middle">
//                 <div class="input-group quantity mx-auto" style="width: 100px;">
//                     <div class="changeQuantity input-group-btn">
//                         <button class="btn btn-sm btn-primary minus" onclick="minus(${n.id})"  data-id="${n.id}">
//                         <i class="fa fa-minus"></i>
//                         </button>
//                     </div>
//                     <input type="text" id="quantity" class="form-control form-control-sm bg-secondary text-center text-white input" value="${n.kolicina}" >
                   
//                     <div class="changeQuantity input-group-btn">
//                         <button class="btn btn-sm btn-primary plus" data-id="${n.id}"
//                         onclick="plus(${n.id})">
//                             <i class="fa fa-plus"></i>
//                         </button>
//                     </div>
//                 </div>
//             </td>
//             <td class="total align-middle">$${n.cena * n.kolicina}</td>
//     <td class="align-middle"><div><button class="remove btn btn-sm btn-primary" data-id="${n.id}">Remove</button><div></td>
//     </tr>`
    
//     sum = sum + (n.cena * n.kolicina)
//     }
//     ispis += `<tr>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td class="naziv">TOTAL PRICE:</td>
//     <td  id="total-price"></td>
//     <td><button class="btn btn-sm btn-primary order">Order Now</button></td>
//     </tr>
//     </tbody> </table>
//     `

//     $("#cartDiv").html(ispis)
//     $(".remove").click(brisi)
//     $("#total-price").html(`$${sum}`)
//     $(".order").click(order)

// }


// //Order Now
// function order(){
//     let addedItemText = document.querySelector("#added-item")
//     let addedItemP = document.querySelector("#text-item-p")

//     addedItemText.classList.remove("hide")
//     addedItemP.innerHTML = " You have successfully ordered items from your cart! "

//     setInterval(function(){
//         addedItemText.classList.add("hide")
//         addedItemP.innerHTML=""
//     },5000)

//     localStorage.removeItem("proizvodiKorpa")
   
//     prikazKorpe()
// }
// //Brisanje elemenata iz korpe
// function brisi(){
//     let id = $(this).data("id")

//     let proizvodiUKorpi = dohvatiLocalStorageItem("proizvodiKorpa")
//     let niz=[]
//     for(let p of proizvodiUKorpi){
//         if(p.id != id){
//             niz.push(p)
//         }
//     }

//     if(niz.length == 0){
//         localStorage.removeItem("proizvodiKorpa")
//     }
//     else{
//         setujLocalStorageItem("proizvodiKorpa", niz)
//     }
//     prikazKorpe()
// }

// //Promena kolicine u korpi
// function minus(id){
//      let proizvodiUKorpi = dohvatiLocalStorageItem("proizvodiKorpa")

//      for(let p of proizvodiUKorpi){
//          if(p.id == id){
//              if(p.kolicina > 0){
//                 p.kolicina--
//              }
//          }
//      }
     
//     setujLocalStorageItem("proizvodiKorpa", proizvodiUKorpi)

   
//     prikazKorpe()
    
// }

// function plus(id){

//     let proizvodiUKorpi = dohvatiLocalStorageItem("proizvodiKorpa")

//     for(let p of proizvodiUKorpi){
//         if(p.id == id){
//             p.kolicina++
//         }
//     }

//     setujLocalStorageItem("proizvodiKorpa", proizvodiUKorpi)
   
//     prikazKorpe()
// }


// //Stampa broja elemenata korpe
// function stampaBr(){
//     var proizvodiIzLS = dohvatiLocalStorageItem("proizvodiKorpa")

//         if(proizvodiIzLS != null){
//             let br = proizvodiIzLS.length
//             $("#number").html(br)
//         }
//         else{
//             $("#number").html("0")
//         }
// }



//Sortiranje 

// function sort(niz){
//     if(sortiranjeCene != null){

//         let ispis = `<h4>SORTING</h4>
//     <select id="sort"><option value="0">Choose</option> `
//     for(let n of niz){
//         ispis += `<option value="${n.vrednost}">${n.naziv}</option>`
//     }
//     ispis += `</select>`

//     sortiranjeCene.innerHTML = ispis
//     }

// }

// function sortiraj(podaci){
    
//     let sort = dohvatiLocalStorageItem("sort")
//     let id=$("#sort").val()
    
//     if(id == "0"){
//         return podaci
//     }
//     else if(id=="cena-asc"){
//         return podaci.sort((a,b) =>  a.cena - b.cena) 
//     }
//     else if(id=="cena-desc"){
//         return podaci.sort((a,b) => b.cena - a.cena)
//     }
//     else if(id == "kalorije-asc"){
//         return podaci.sort((a,b) => a.kalorije - b.kalorije)
//     }
//     else if(id == "kalorije-desc"){
//         return podaci.sort((a,b) => b.kalorije - a.kalorije)
//     }
//      else if(id == "naziv-asc"){
//         return podaci.sort(function (a,b){
//             if(a.naziv < b.naziv){
//                 return -1;
//             }
//             else if(a.naziv > b.naziv){
//                 return 1;
//             }
//             else{
//                 return 0;
//             }
//          })
     
//      }
//      else if(id == "naziv-desc"){
//          return podaci.sort(function(a,b){
//             if(a.naziv > b.naziv){
//                 return -1;
//             }
//             else if(a.naziv < b.naziv){
//                 return 1;
//             }
//             else{
//                 return 0;
//             }
//          })
         
//      }   

//     return podaci
// }



// //Pretraga po nazivu
// function filterPretraga(podaci){
//     var filterPodaci=[]
    
//     let input = $("#search-input").val()

//     // if(input != null){
//     // filterPodaci = podaci.filter(f => f.naziv.toLowerCase().includes(input.toLowerCase()))

//     if(input != null){
//         for(let p of podaci){
//             if(p.naziv.toLowerCase().includes(input.toLowerCase())){
//                 filterPodaci.push(p)
//             }
//         }
//     }
//     return filterPodaci
// }


//AJAX
// function ajaxCallback(filename, result){
//     $.ajax({
//         url:"json/" + filename + ".json",
//         method: "get",
//         dataType: "json",
//         success:function(r)
//         {
//             result(r)
//         }
//         ,
//         error: function(xhr) {
//             if (xhr.status === 400) {
//               console.log("Bad request: " + xhr.responseText);
//             }
//             else if (xhr.status === 401) {
//               console.log("Unauthorized: " + xhr.responseText);
//             }
//             else if (xhr.status === 403) {
//               console.log("Forbidden: " + xhr.responseText);
//             }
//             else if (xhr.status === 404) {
//               console.log("Not found: " + xhr.responseText);
//             }
//             else if (xhr.status >= 500 && xhr.status < 600) {
//               console.log("Server error: " + xhr.responseText);
//             }
//             else {
//               console.log("Unknown error: " + xhr.responseText);
//             }
//         }
//     })
// }

//ajaxCallback
// $(document).ready(function(){
    

 

//     stampaBr()
//     prikazKorpe()
// })
// function filter(){
//     ajaxCallback("product", ispisProizvoda)
    
// }


// $("#sort-price").click(filter)
// $('#search-input').keyup(filter)


// let kategorije=[]
// let produkt = document.querySelector("#products")
// let sortiranjeCene =  document.querySelector("#sort-price")
// let mreze = document.querySelector("#social")

// //Dohvatanje iz Local Storage
// function setujLocalStorageItem(naziv, vrednost){
//     localStorage.setItem(naziv, JSON.stringify(vrednost))
// }
//  function dohvatiLocalStorageItem(naziv){
//     return JSON.parse(localStorage.getItem(naziv));
//  }
 

 //Ispis kategorija   
// function ispisKategorija(nizKat){
//     let ispis ="<ul>"

//     for(let kat of nizKat){
//         ispis += `<li><input type="checkbox" value='${kat.id}'
//         name="kategorije" class="caffee-filter kat"><label class="check">${kat.naziv}</label></li>`
//     }
//     ispis+="</ul>"

//     $("#category").html(ispis);

    
//     $('.kat').change(filter)
//     setujLocalStorageItem("categoryLS",nizKat)

// }


//Filter po kategoriji
// function filterKategorija(kafe){
//     let nizKafe = [];
//     let filterKafe=[]
//     $('.caffee-filter:checked').each(function(e){
//         nizKafe.push(parseInt($(this).val()));
//     })
//     if(nizKafe.length > 0){
        
//       filterKafe = kafe.filter(k => nizKafe.includes(k.kategorijaID));
//       return filterKafe
//     }
//     else return kafe;  
// }

//Ispis proizvoda

// function ispisProizvoda(niz){

//     setujLocalStorageItem("productLS",niz)
//     niz=filterKategorija(niz)
//     niz=filterPretraga(niz)
//     niz=sortiraj(niz)
//     niz=rangeSort(niz)

//     let ispis=""
//     if(produkt != null){
//         if(niz.length > 0){
//             for(let n of niz){
//                 ispis += `
//                 <div class="card drinks col-sm-3 align-items-center  " >
                
//                 <img src="${n.slika.src}" alt="${n.slika.alt}" class="rounded-circle mb-3 mb-sm-0 img-fluid"/><br>
//                 <h5>${n.naziv}</h5>
//                 <p> ${n.kalorije} calories </p>
//                 <p> ${n.cena}$</p>
                
//                 <div class="btn">
//                     <button  type="button" class="btn-Cart add" data-id="${n.id}"> ADD TO CART</button>
//                 </div>
//             </div>`
//             }
//         }
//         else{
//             ispis += `<div class="text-danger h2 bg rounded p-3 mt-5">Sorry, there are currently no products with selected features ...</div>`
//         }
//         produkt.innerHTML = ispis;
//     }
       
        
// }
//Na dogadjaj "click" dodaje se proizvod u korpu
//$(document).on("click", ".add", dodajUKorpu)






