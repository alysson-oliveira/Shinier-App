<template>
    <div class="card chat-box">
        <div class="card-header">
            <b>Search</b>

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
            <p class="card-text" v-for="search in searchs" :key="search.message">
                {{search.message}}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Write your message" id="searchMade">
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                searchs:[],
                search:false
            }
        },
        methods: {
            send(){
                console.log(document.getElementById('searchMade').value);
            },
            close(){
                this.$emit('closeSearch');
            },
            clear(){
                this.searchs = [];
            }
        },
        created(){
            this.searchs.push(
                {message:'Type your search'}
            );
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
</style>