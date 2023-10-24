let rigisterFomr=document.querySelector('.FormInputsRegister');
if(rigisterFomr){

rigisterFomr.addEventListener('submit', (e) => {
    let MassageAppear = document.querySelector('.ErrorMassage')

    let username = document.querySelector('#name').value
    let email = document.querySelector('#email').value
    let password = document.querySelector('#password').value
    let confrimPassword = document.querySelector('#ConfirmPassword').value
    let pattren = /[<>]/g // the pattren mean looking for any input has < or >

    //by use test method , it will return true if found the pattren and false if not

    if (pattren.test(email)) {
        e.preventDefault()
        console.log("test work")
        MassageAppear.classList.add('ErrorMassageDisplay')
        console.log(MassageAppear)
        document.querySelector('#email').value = '' //RESET THE VALUE of input email to empty
    }

    if (pattren.test(username)) {
        e.preventDefault()

        MassageAppear.classList.add('ErrorMassageDisplay')
        document.querySelector('#name').value = '' //RESET THE VALUE of input name to empty
    }
    if (pattren.test(password)) {
        e.preventDefault()

        MassageAppear.classList.add('ErrorMassageDisplay')
        document.querySelector('#password').value = '' //RESET THE VALUE of input name to empty
    }
    if (pattren.test(confrimPassword)) {
        e.preventDefault()

        MassageAppear.classList.add('ErrorMassageDisplay')

        document.querySelector('#ConfirmPassword').value = '' //RESET THE VALUE of input name to empty
    }
    if (password !== confrimPassword) {
        e.preventDefault()

        MassageAppear.classList.add('ErrorMassageDisplay')
        MassageAppear.innerHTML = "<p>The passwords not matched</p>"
        document.querySelector('#ConfirmPassword').value = '' //RESET THE VALUE of input name to empty

    }
})
}

// login
let loginForm=document.querySelector('.FormInputsLogin');
if(loginForm){
document.querySelector('.FormInputsLogin').addEventListener('submit', (e) => {
    let MassageAppear = document.querySelector('.ErrorMassage')

    let email = document.querySelector('#email').value
    let password = document.querySelector('#password').value
    let pattren = /[<>]/g // the pattren mean looking for any input has < or >

    //by use test method , it will return true if found the pattren and false if not

    if (pattren.test(email)) {
        e.preventDefault()
        console.log("test work")
        MassageAppear.classList.add('ErrorMassageDisplay')
        console.log(MassageAppear)
        document.querySelector('#email').value = '' //RESET THE VALUE of input email to empty
    }


    if (pattren.test(password)) {
        e.preventDefault()

        MassageAppear.classList.add('ErrorMassageDisplay')
        document.querySelector('#password').value = '' //RESET THE VALUE of input name to empty
    }
    
})

}