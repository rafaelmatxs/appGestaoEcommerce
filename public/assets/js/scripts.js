const sideMenu = document.querySelector("aside")
const menuBtn = document.querySelector("#menu-btn")
const closeBtn = document.querySelector("#close-btn")
const themeToggler = document.querySelector(".theme-toggler")

// Abrir sidebar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block'
})

// Fechar sidebar
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none'
})

// Mudar tema
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables')

    themeToggler.querySelector('span').classList.toggle('active')
})

// Preencher pedidos na tabela
Orders.forEach(order => {
    const tr = document.createElement('tr')
    const trContent = `
                        <td>${order.productName}</td>
                        <td>${order.productNumber}</td>
                        <td>${order.paymentStatus}</td>
                        <td class="${order.shipping === 'Recusado' ? 'danger' : order.shipping === 'Pendente' ? 'warning' : 'success'}">${order.shipping}</td>
                        <td class="primary">Detalhes</td>
                        `
    tr.innerHTML = trContent
    document.querySelector('table tbody').appendChild(tr)
})