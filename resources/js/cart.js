document.addEventListener("DOMContentLoaded", function () {
    var incrementBtn = document.querySelectorAll(".incrementBtn");
    var decrementBtn = document.querySelectorAll(".decrementBtn");
    // var qtyBtn=document.querySelectorAll(".qty")
    // console.log(incrementBtn);

    incrementBtn.forEach((element) => {
        element.addEventListener("click", function () {
            const productId = element.dataset.id;
            const qtyInput = document.querySelector(
                `.qty[data-id="${productId}"]`
            );
            qtyInput.value = parseInt(qtyInput.value) + 1;
            updateTotalPrice(qtyInput);
            updateHeaderCart(productId,qtyInput.value)
        });
    });
    decrementBtn.forEach((element) => {
        element.addEventListener("click", function () {
            const productId = element.dataset.id;
            const qtyInput = document.querySelector(
                `.qty[data-id="${productId}"]`
            );
            qtyInput.value = parseInt(qtyInput.value) - 1;
            if (qtyInput.value < 1) {
                qtyInput.value = 1;
            }
            updateTotalPrice(qtyInput);
            updateHeaderCart(productId,qtyInput.value)
        });
    });
    var addToCart = document.getElementById("add_to_cart");

    if (addToCart) {
        addToCart.addEventListener("click", function () {
            // console.log(addToCart);
            const qty = document.querySelector("#qtyid");
            const product_id = this.dataset.id;

            const data = { product_id: product_id, quantity: qty.value };
            // console.log(data);
            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
                .then((response) => response.json())
                .then((resp) => {
                    // console.log(resp.products);
                    // updateProductList(resp.products);
                    // document.getElementById("loader").style.display = "none";

                    if (resp.type === "error" && resp.status === "false") {
                        Object.entries(resp.errors).forEach(([key, error]) => {
                            const errorElement = document.querySelector(
                                `.reset-${key}`
                            );
                            if (errorElement) {
                                errorElement.style.color = "red";
                                errorElement.textContent = error;
                                errorElement.style.display = "block";

                                setTimeout(() => {
                                    errorElement.style.display = "none";
                                }, 4000);
                            }

                            alert(decodeURIComponent(error));
                        });
                    } else if (resp.type === "success") {
                        console.log(resp.products);
                        updateCart(resp.products);
                    } else {
                    }
                })
                .catch(() => {
                    console.error("Error occurred.");
                });
        });
    }

    // ************From Products Page**********
    var addToCartProducts = document.querySelectorAll(".add_to_cart_product");

    if (addToCartProducts) {
        addToCartProducts.forEach((addToCartProduct)=>{
        addToCartProduct.addEventListener("click", function () {
            // console.log(addToCart);
            const qty = 1;
            const product_id = this.dataset.id;

            const data = { product_id: product_id, quantity: qty };
            console.log(data);
            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
                .then((response) => response.json())
                .then((resp) => {
                    // console.log(resp.products);
                    // updateProductList(resp.products);
                    // document.getElementById("loader").style.display = "none";

                    if (resp.type === "error" && resp.status === "false") {
                        Object.entries(resp.errors).forEach(([key, error]) => {
                            const errorElement = document.querySelector(
                                `.reset-${key}`
                            );
                            if (errorElement) {
                                errorElement.style.color = "red";
                                errorElement.textContent = error;
                                errorElement.style.display = "block";

                                setTimeout(() => {
                                    errorElement.style.display = "none";
                                }, 4000);
                            }

                            alert(decodeURIComponent(error));
                        });
                    } else if (resp.type === "success") {
                        console.log(resp.products);
                        updateCart(resp.products);
                    } else {
                    }
                })
                .catch(() => {
                    console.error("Error occurred.");
                });
            });
        });
    }


    function updateHeaderCart(productId,quantity) {
        // console.log(quantity);
        fetch("/cart/add", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.type === "success") {
                    // Update the header cart count and dropdown
                    updateCart(data.products);
                } else {
                    // Handle errors (optional)
                    alert("Failed to update cart.");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred while updating the cart.");
            });
    }
    function updateCart(cartItems) {
        const cartArray = Object.values(cartItems);
        console.log(cartArray.length);
        const cartCount = document.querySelector("#cart .qty");
        const cartList = document.querySelector(".cart-list");
        const cartSummary = document.querySelector(".cart-summary #cartcount");
        const subtotal = document.querySelector(".cart-summary #subtotal");

        // Update cart count
        cartCount.textContent = cartItems.length;

        // Clear and rebuild the cart dropdown
        cartList.innerHTML = "";
        let total = 0;

        cartItems.forEach((item) => {
            // console.log(item.product.price);
            // total += item.quantity * item.product.price;
            const cartItemHTML = `
        <div class="product-widget relative flex items-center justify-around">
            <div class="product-img max-w-12 m-3 flex justify-center items-center">
                <img class="w-fit object-contain" src="/${item.image}" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-name font-bold mb-1"><a href="#">${item.name}</a></h3>
                <h4 class="product-price"><span class="qty">${item.quantity}x</span><span class="price font-bold ml-1">${item.price}</span></h4>
            </div>
            <button class="delete absolute bg-red text-white size-4 top-1 left-2"><i class="fa fa-close"></i></button>
        </div>
    `;
            cartList.insertAdjacentHTML("beforeend", cartItemHTML);
        });

        // Update cart summary
        cartSummary.textContent = `${cartItems.length} Item(s) selected`;
        subtotal.textContent = `SUBTOTAL: ${total}`;
    }
    // function updateCart(productId, quantity) {
    //     fetch('/cart/update', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    //         },
    //         body: JSON.stringify({
    //             product_id: productId,
    //             quantity: quantity,
    //         }),
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.status === 'success') {
    //             // Update the header cart count and dropdown
    //             updateHeaderCart(data.cartItems);
    //         } else {
    //             // Handle errors (optional)
    //             alert('Failed to update cart.');
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //         alert('An error occurred while updating the cart.');
    //     });
    // }

    // function addToCart(id) {
    //     qty = document.querySelector("#qty");
    //     // console.log(qty.value);
    //     data = { product_id: id, quantity: qty.value };
    //     // console.log(data);
    //     fetch("/cart/add", {
    //         method: "POST",
    //         headers: {
    //             "X-CSRF-TOKEN": document
    //                 .querySelector('meta[name="csrf-token"]')
    //                 .getAttribute("content"),
    //             "Content-Type": "application/json",
    //         },
    //         body: JSON.stringify(data),
    //     })
    //         .then((response) => response.json())
    //         .then((resp) => {
    //             // updateProductList(resp.products);
    //             // document.getElementById("loader").style.display = "none";

    //             if (resp.type === "error" && resp.status === "false") {
    //                 Object.entries(resp.errors).forEach(([key, error]) => {
    //                     const errorElement = document.querySelector(
    //                         `.reset-${key}`
    //                     );
    //                     if (errorElement) {
    //                         errorElement.style.color = "red";
    //                         errorElement.textContent = error;
    //                         errorElement.style.display = "block";

    //                         setTimeout(() => {
    //                             errorElement.style.display = "none";
    //                         }, 4000);
    //                     }

    //                     alert(decodeURIComponent(error));
    //                 });
    //             } else if (resp.type === "success") {
    //                 // updateProductList(resp.products);
    //             } else {
    //                 console.log("in");
    //             }
    //         })
    //         .catch(() => {
    //             console.error("Error occurred.");
    //         });
    // }
    function updateTotalPrice(input) {
        // Get the product ID and unit price from data attributes
        const productId = input.dataset.id;
        const unitPrice = parseFloat(input.dataset.price);

        // Calculate the total price
        const quantity = parseInt(input.value);
        const totalPrice = unitPrice * quantity;

        // Find the corresponding total price cell
        const totalPriceCell = document.querySelector(
            `.totalprice[data-id="${productId}"]`
        );

        // Update the total price cell
        if (totalPriceCell) {
            totalPriceCell.textContent = totalPrice.toFixed(2); // Format to 2 decimal places
        }
    }
});
