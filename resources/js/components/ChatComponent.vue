<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card mb-4">
                    <ul class="list-group">
                        <a href="" 
                        @click.prevent="openSearch()">
                            <li class="list-group-item">Search</li>
                        </a>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-header">
                        Shinier Chat
                    </div>
                    <ul class="list-group">
                        <a href="" 
                        @click.prevent="openChat(friend)"
                        :key=friend.id
                        v-for="friend in friends">
                            <li class="list-group-item">{{friend.name}}</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9" v-if="search">
                <search-component
                    
                ></search-component>
            </div>
            <div class="col-md-9" v-else>
                <span v-for="friend in friends" :key="friend.id">
                    <message-component
                        v-if="friend.session.open"
                        @close="close(friend)"
                        :friend=friend
                    ></message-component>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageComponent from './MessageComponent';
    import SearchComponent from './SearchComponent';
    export default {
        data(){
            return{
                friends:[],
                search:false
            }
        },
        methods: {
            close(friend){
                friend.session.open = false;
            },
            getFriends(){
                axios.post('/getFriends')
                    .then(res => this.friends = res.data.data);
            },
            openChat(friend){
                    this.friends.forEach(friend => {
                        friend.session.open=false;
                    });
                    this.search=false;
                    friend.session.open = true;
            },
            openSearch(){
                this.search=true;
            }
        },

        created(){
            this.getFriends();
        },
        components:{MessageComponent, SearchComponent},
        
    }
</script>
