document.addEventListener("DOMContentLoaded", function() {
    // Voeg event listeners toe aan alle 'Add' knoppen
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            addToCart(this.dataset.id);
        });
    });
});

let cart = {};

function addToCart(id) {
    // Verhoog de hoeveelheid als het product al in het winkelwagentje zit, anders voeg een nieuw item toe.
    if (cart[id]) {
        cart[id]++;
    } else {
        cart[id] = 1;
    }
    updateCartCount();
}

function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    let totalCount = 0;
    for (let id in cart) {
        totalCount += cart[id];
    }
    cartCount.textContent = totalCount + ' items in cart';
}

