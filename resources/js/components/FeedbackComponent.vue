<template>
    <div class="text-white">
        <div v-for="feedback in options" :key="feedback.id"> {{feedback.title}}</div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                options:[{}]
            }
        },
        methods: {
            getData(){
                axios.get('api/feedback').then((res)=>{
                    this.options = res.data
                })
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>
