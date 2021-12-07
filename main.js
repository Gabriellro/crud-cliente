//Modal Create

const openModal = () => document.getElementsByClassName('modal')
    .classList.add('active')

const closeModal = () => document.getElementsByClassName('modal')
    .classList.remove('active')

document.getElementById('cadastrarCliente')
    .addEventListener('click', openModal)

document.getElementById('modalClose')
    .addEventListener('click', closeModal)


// // //Modal Update

// const openModal2 = () => document.getElementsByClassName('modal2')
//     console.log(document.getElementsByClassName('modal2'))
//     // .classList.add('active')

// const closeModal2 = () => document.getElementsByClassName('modal2')
//     .classList.remove('active')

// document.getElementById('atualizarCliente')
//     .addEventListener('click', openModal2)

// document.getElementById('modalCloseUpdate')
//     .addEventListener('click', closeModal2)