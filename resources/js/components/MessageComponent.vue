<template>
    <div class="card chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session_block}">
                {{friend.name}}
                <span v-if="session_block">(Bloqueado)</span>
            </b>

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
                    <a class="dropdown-item" href="#" v-if="session_block" @click.prevent="unblock">Desbloquear</a>
                    <a class="dropdown-item" href="#" @click.prevent="block" v-else>Bloquear</a>
                    <a class="dropdown-item" href="#" @click.prevent="clear">Limpar Chat</a>
                </div>

            </div>
            
            <!-- Options Ends Here -->
        </div>

        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">
                {{chat.message}}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send(message)">
            <div class="form-group">
                <input v-model="message" class="form-control" placeholder="Write your message"
                :disabled="session_block">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props:['friend'],
    data(){
        return{
            chats:[],
            session_block:false
        }
    },
    methods: {
        send(message){
            this.chats.push({
                message: 'Você: ' + message
            });
        },
        getFriends(){
                axios.get('/user')
                    .then(res => this.friends = res.data.data);
            },
        close(){
            this.$emit('close');
        },
        clear(){
            this.chats = [];
        },
        block(){
            this.session_block=true;
        },
        unblock(){
            this.session_block=false;
        }
    },
    created(){
        this.chats.push(
            {message:this.friend.name + ': Hey'},
            {message:this.friend.name + ': How are you?'}
        );
    }
}
</script>

<style>
    .chat-box{
        height: 400px;
        /* background: url(https://image.freepik.com/free-photo/pile-white-round-oblong-shape-tablet-pills-isolated_33867-1293.jpg) center center;
        background-size: 100%; */
    }
    .card-body{
        overflow-y: scroll;
    }
</style>