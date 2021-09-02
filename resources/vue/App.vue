<template>
    <div id="appWrapper">
        <div class="container">
            <div class="search-box">
                <input 
                    class="search-input" 
                    type="text" 
                    name="q" 
                    placeholder="Escriba una palabra..."
                    v-model="query"
                    @input="search"
                    >
                <ul class="result-list show">
                    <li class="result-item">
                        <a href="#" class="result-link">
                            <div class="result-title">Nombre del Post</div>
                            <div class="result-content">Escrito</div>
                        </a>                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return{
            query:''
        }
    },
    methods:{
        search(){
            // console.log(this.query);
            axios.post('/posts/search',{
                q:this.query
            }).then(res=>{
                console.log(res);
            }).catch(error=>{
                console.log(error.response);
            })
        }
    }
}
</script>
<style>
    body{
        font-family: sans-serif;
    }
    ::-webkit-scrollbar{
        width: 10px;
    }
    ::-webkit-scrollbar-track{
        background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb{
        background: #888;
    }
    ::-webkit-scrollbar-thumb:hober{
        background: #555;
    }
    .container{
        padding: 30px;
    }
    .search-box{
        position: relative;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .serach-input{
        width: 600px;
        height: 30px;
        border-radius: 10px;
        border: 0;
        background: #eeeeee;
        padding: 10px 20px;
        font-size: 18px;
        outline: none;
    }
    .result-list.show{
        width: 640px;
        max-height: 250px;
        overflow-y: auto;
        list-style: none;
        background: #fff;
        padding: 0;
        top: 40px;
        border-radius: 10px;
        box-shadow: 1px 2px 
    }
    .result-list.hide{
        display: none;
    }
</style>
