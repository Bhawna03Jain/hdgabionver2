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
                        // console.log(resp.products);
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
//     var addToCartProducts = document.querySelectorAll(".add_to_cart_product");
//     // Attach the event listener to a parent container
// document.body.addEventListener("click", function (event) {
//     // Check if the clicked element has the class 'add_to_cart'
//     if (event.target.classList.contains("add_to_cart_product")) {
//         // Handle the button click here
//         console.log("Add to Cart button clicked!");

//         // Example: Retrieve data attributes from the clicked button
//         const productId = event.target.dataset.productId;
//         const productName = event.target.dataset.productName;

//         // Perform your cart logic here
//         console.log("Product ID:", productId, "Product Name:", productName);
//     }
// });


//     if (addToCartProducts) {
//         addToCartProducts.forEach((addToCartProduct)=>{
//         addToCartProduct.addEventListener("click", function () {
//             // console.log(addToCart);
//             // alert("hi");
//             const qty = 1;
//             const product_id = this.dataset.id;

//             const data = { product_id: product_id, quantity: qty };
//             console.log(data);
//             fetch("/cart/add", {
//                 method: "POST",
//                 headers: {
//                     "X-CSRF-TOKEN": document
//                         .querySelector('meta[name="csrf-token"]')
//                         .getAttribute("content"),
//                     "Content-Type": "application/json",
//                 },
//                 body: JSON.stringify(data),
//             })
//                 .then((response) => response.json())
//                 .then((resp) => {
//                     // console.log(resp.products);
//                     // updateProductList(resp.products);
//                     // document.getElementById("loader").style.display = "none";

//                     if (resp.type === "error" && resp.status === "false") {
//                         Object.entries(resp.errors).forEach(([key, error]) => {
//                             const errorElement = document.querySelector(
//                                 `.reset-${key}`
//                             );
//                             if (errorElement) {
//                                 errorElement.style.color = "red";
//                                 errorElement.textContent = error;
//                                 errorElement.style.display = "block";

//                                 setTimeout(() => {
//                                     errorElement.style.display = "none";
//                                 }, 4000);
//                             }

//                             alert(decodeURIComponent(error));
//                         });
//                     } else if (resp.type === "success") {
//                         console.log(resp.products);
//                         updateCart(resp.products);
//                     } else {
//                     }
//                 })
//                 .catch(() => {
//                     console.error("Error occurred.");
//                 });
//             });
//         });
//     }
// Attach a single event listener to the parent container (event delegation)
document.body.addEventListener("click", function (event) {
    if (event.target.classList.contains("add_to_cart_product")) {
        console.log("Add to Cart button clicked!");

        // Get product details
        const qty = 1;
        const productId = event.target.dataset.id;

        const data = { product_id: productId, quantity: qty };
        console.log(data);

        // Make the fetch request
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
                }
            })
            .catch(() => {
                console.error("Error occurred.");
            });
    }
});


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
        console.log(cartArray);
        const cartCount = document.querySelector("#cart .qty");
        const cartList = document.querySelector(".cart-list");
        const cartSummary = document.querySelector(".cart-summary #cartcount");
        const subtotal = document.querySelector(".cart-summary #subtotal");
        const price_with_vat = document.querySelector("#cart_items #price_with_vat");
        const discount_price = document.querySelector("#cart_items #discount_price");
        const price_after_discount = document.querySelector("#cart_items #price_after_discount");

        // Update cart count
        cartCount.textContent = cartItems.length;

        // Clear and rebuild the cart dropdown
        cartList.innerHTML = "";
        let  total_price_with_vat = 0;
        let total_price_after_discount=0;

        cartItems.forEach((item) => {
            // console.log(item.product.price);
            total_price_with_vat +=  item.total_price_with_vat;
            total_price_after_discount +=  item.total_price_after_discount;
            const cartItemHTML = `
        <div class="py-3 product-widget relative flex items-center justify-around">
            <div class="product-img max-w-12 m-3 flex justify-center items-center">
                <img class="w-fit object-contain" src="/${item.image}" alt="">
            </div>

             <div class="product-body">
                <h3 class="product-name font-bold mb-1">
                    <a href="/products/product-detail/baskets/${item.product_id}}">${item.name}</a>
                </h3>
                 <h4 class="product-price">
                    <span class="qty">${item.quantity}x</span>
                    <span class="price font-bold ml-1 text-green-800">${item.price_after_discount}
                    <span class="line-through text-gray-700">${item.price_with_vat}</span> </span>
                                                    <br><span class="font-bold">(${item.discount_per}% off) </span>
                                            </h4>
                                        </div>
                                        <button class="delete absolute bg-red  text-white size-4 top-1 left-2"><i
                                                class="fa fa-close"></i></button>
                                    </div>
            <button class="delete absolute bg-red text-white size-4 top-1 left-2"><i class="fa fa-close"></i></button>
        </div> <hr>
    `;
            cartList.insertAdjacentHTML("beforeend", cartItemHTML);
        });

        // Update cart summary
        cartSummary.textContent = `${cartItems.length} Item(s) selected`;
        subtotal.textContent = `SUBTOTAL:${total_price_after_discount.toFixed(2)}`;
        price_with_vat.innerHTML = `<i class="fa-solid fa-euro-sign"></i> ${total_price_with_vat.toFixed(2)}`;
        price_after_discount.innerHTML = `<i class="fa-solid fa-euro-sign"></i> ${total_price_after_discount.toFixed(2)}`;
        discount_price.innerHTML = `<i class="fa-solid fa-euro-sign"></i> ${(total_price_with_vat - total_price_after_discount).toFixed(2)}`;

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
