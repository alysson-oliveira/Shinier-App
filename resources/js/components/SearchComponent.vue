<template>
    <div>
        <div class="card chat-box">
            <div class="card-header">
                <b>Search (Click on a product to add it to your cart!)</b>

                <!-- Close Button -->
                <a href="" @click.prevent="close">
                    <i class="fas fa-times float-right"></i>
                </a>
                <!-- Close Button Ends Here -->

                <!-- Options -->
                <div class="dropdown float-right mr-4">
                    <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" @click.prevent="clear">Limpar Pesquisa</a>
                    </div>
                </div>
                <!-- Options Ends Here -->
            </div>

            <div class="card-body" v-chat-scroll>
                <p class="card-text" v-for="remedy in filteredMedicines" :key="remedy.name">
                    <a href="" @click.prevent="addToCart(remedy.name)">
                        {{remedy.name}}
                    </a>
                </p>
            </div>
            <form class="card-footer" @submit.prevent="send(searchMessage)">
                <div class="form-group">
                    <input type="text" v-model="searchMessage" class="form-control" placeholder="Write your search" id="searchMade">
                </div>
            </form>
        </div>

        <!-- Cart Session -->
        <div class="card cart-chat-box" v-if="cartHasItens">
            <div class="card-header">
                <b>Cart (Click on a product to remove it from your cart!)</b>

                <!-- Options -->
                <div class="dropdown float-right">
                    <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" @click.prevent="clearCart">Limpar Carrinho</a>
                    </div>
                </div>
                <!-- Options Ends Here -->
                
            </div>
            <div class="card cart-card-body" v-chat-scroll>
                <p class="card-text" v-for="(itens, index) in cart" :key="itens.name">
                    <a href="" @click.prevent="removeFromCart(index)">
                        {{itens.name}}
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                searchs:[],
                medicines:[],
                searchMessage:'',
                search:false,
                cart:[],
                cartHasItens:false
            }
        },
        methods: {
            send(message){
            this.searchs.push({
                message: 'Você: ' + message
            });
        },
            close(){
                this.$emit('closeSearch');
            },
            clear(){
                this.searchMessage = [];
            },
            addToCart(medicine){
                this.cart.push(
                    {name: medicine}
                );
                this.cartHasItens = true;
                console.log(this.cart);
            },
            removeFromCart(index){
                console.log(index);
                this.cart.splice(index, 1);
            },
            clearCart(){
                this.cart = [];
                this.cartHasItens = false;
            }
        },
        created(){
            this.medicines.push(
                {name:'Dorflex'},
                {name:'Xarelto'},
                {name:'Selozok'},
                {name:'Neosaldina'},
                {name:'Torsilax'},
                {name:'Aradois'},
                {name:'Glifage XR'},
                {name:'Addera D3'},
                {name:'Anthelios'},
                {name:'Buscopan composto'},
            );
        },
        computed: {
            filteredMedicines: function(){
                return this.medicines.filter((medicine) => {
                    console.log(this.searchMessage);
                    return medicine.name.toLowerCase().match(this.searchMessage.toLowerCase());
                });
            }
        }
    }
</script>

<style>
    .chat-box{
        height: 400px;
    }
    .card-body{
        overflow-y: scroll;
    }
    .cart-card-body{
        padding: 20px;
        height: 200px;
        overflow-y: scroll;
    }
</style>