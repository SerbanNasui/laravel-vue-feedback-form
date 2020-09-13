<template>
    <div class="text-white">
        <form @submit.prevent="submitForm">
            <div v-for="feedback in options" :key="feedback.id">
                <input type="radio" name="status" v-bind:value="feedback.id" v-model="selectedId">{{feedback.title}}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                selectedId: '',
                options:[{}]
            }
        },
        methods: {
            getData(){
                axios.get('api/feedback').then((res)=>{
                    this.options = res.data
                })
            },
            submitForm(){
                axios.put(`/api/feedback/${this.selectedId}`)
                console.log(this.selectedId);
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>
