<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Marriage Halls List</div>

                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li v-for="m in mhalls">{{ m.id }} - {{ m.name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                mhalls: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('http://127.0.0.1:8000/marriage_halls')
            .then(res => this.mhalls = res.data)
            .catch(err => console.log(err));
           
        }
    };
</script>
<style type="text/css" scoped>
    
</style>

