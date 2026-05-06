const selectPayment = (paymentMethod) => {
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    paymentMethods.forEach((element) => {
        element.parentElement.style.backgroundColor = "#F1F2F6";
        element.parentElement.style.color = "#353535";
        element.checked = false;
        if (element.value === paymentMethod) {
            element.checked = true;
            element.parentElement.style.backgroundColor = "#FF801A";
            element.parentElement.style.color = "#FFFFFF";
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    paymentMethods.forEach((element) => {
        element.addEventListener('click', () => {
            selectPayment(element.value);
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Ambil data cart dari localStorage
    const cartData = JSON.parse(localStorage.getItem("cart")) || [];

    // Filter produk berdasarkan ID di cartData
    const cartItems = document.querySelectorAll(".cart-item");
    cartItems.forEach((item) => {
        const productId = item.dataset.id;

        // Cari produk di cartData
        const cartProduct = cartData.find((cart) => cart.id === productId);

        if (!cartProduct) {
            // Jika produk tidak ada di cart, hapus
            item.remove();
        } else {
            // Jika ada, update quantity dan notes
            const qtyElement = item.querySelector("#qty");
            const notesInput = item.querySelector("#notes");

            if (qtyElement) qtyElement.textContent = 'x' + cartProduct.qty;
            if (notesInput) notesInput.value = cartProduct.notes;
        }
    });

    // Hitung total setelah elemen yang tidak ada dihapus
    calculateTotal();
});

function calculateTotal() {
    const cartItems = document.querySelectorAll(".cart-item");
    let total = 0;
    cartItems.forEach(cartItem => {
        const priceElement = cartItem.querySelector('p[id="price"]');
        const price = parseInt(priceElement.textContent.replace(/[^0-9]/g, ''), 10);
        const qtyElement = cartItem.querySelector('#qty');
        const qty = parseInt(qtyElement.textContent.replace(/[^0-9]/g, ''), 10);
        total += price * qty;
    });
    document.getElementById('totalAmount').textContent = `Rp ${total.toLocaleString('id-ID')}`;
}

const paymentForm = document.getElementById('Form');
const cartData = document.getElementById('cart-data');

paymentForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    cartData.value = JSON.stringify(cart);

    // Cek metode pembayaran
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    
    if (!paymentMethod) {
        alert('Silakan pilih metode pembayaran');
        return;
    }

    if (paymentMethod.value === 'cash') {
        // Untuk pembayaran tunai, submit form biasa
        paymentForm.submit();
        localStorage.removeItem("cart");
    } else {
        // Untuk Midtrans, kirim via AJAX dan buka Snap Popup
        const formData = new FormData(paymentForm);
        
        fetch(paymentForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Buka Snap Popup
            window.snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    localStorage.removeItem("cart");
                    window.location.href = data.success_url;
                },
                onPending: function(result) {
                    // Pembayaran belum selesai (misal: QRIS ditampilkan tapi belum dibayar)
                    window.location.href = data.failed_url;
                },
                onError: function(result) {
                    window.location.href = data.failed_url;
                },
                onClose: function() {
                    // Pelanggan menekan tombol close/leave this page
                    window.location.href = data.failed_url;
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan, silakan coba lagi.');
        });
    }
});
