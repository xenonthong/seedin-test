<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-text">{{ product.description }}</p>
            <p>
                <small>${{ product.price }}</small>
            </p>
            <a href="javascript:void(0)" class="btn btn-primary" @click="addToCart">Add To Cart</a>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['product'],

        methods : {
            addToCart() {
                axios.post('/cart-items', {product_id : this.product.id})
                     .then((r) => {
                         alert(r.data);
                     })
            }
        }
    }
</script>
