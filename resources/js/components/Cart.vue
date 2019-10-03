<template>
    <div>
        <table class="col-12">
            <thead>
            <tr>
                <td colspan="2">Item</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in products">
                <td>{{ item.name }}</td>
                <td><a href="javascript:void(0)" @click="removeFromCart(item.id)">Remove</a></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>{{ productsTotal }}</td>
            </tr>
            </tbody>
        </table>

        <a href="#" class="btn btn-primary" @click="checkout">Checkout</a>
    </div>
</template>

<script>
    import { remove, sumBy } from 'lodash';

    export default {
        props : ['cart'],

        data() {
            return {
                products : this.cart.products
            }
        },

        methods : {
            removeFromCart(id) {
                axios.delete('/cart-items', {
                    params : {
                        product_id : id
                    }
                })
                     .then((r) => {
                         this.products = remove(this.products, (product) => {
                             return product.id === id
                         });

                         alert(r.data);

                         if (this.products.length > 1) return window.location('/');
                     })
            },

            checkout() {
                axios.post('/transactions', {
                    products : this.products,
                })
                     .then((r) => {
                         alert('Checkout successful');

                         window.location('/');
                     });
            }
        },

        computed : {
            productsTotal() {
                return sumBy(this.products, 'price');
            }
        }
    }
</script>
