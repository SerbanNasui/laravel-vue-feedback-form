<template>
    <div class="text-white">

        <div v-if="checkSubmit">
            <h2><div class="d-flex justify-content-center">Votes</div></h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Options</th>
                        <th scope="col">Nr. Votes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="feedback in options" :key="feedback.id">
                        <th scope="row">{{feedback.id}}</th>
                        <td>
                            <div class="d-flex justify-content-center">
                                {{feedback.title}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                {{feedback.votes}}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div v-else-if="true">
            <form @submit.prevent="submitForm">
                <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="feedback in options" :key="feedback.id">
                        <th scope="row">{{feedback.id}}</th>
                        <td><input type="radio" name="status" v-bind:value="feedback.id" v-model="selectedId"> {{feedback.title}}</td>
                    </tr>
                </tbody>
            </table>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                selectedId: '',
                options:[{}],
                checkSubmit: false
            }
        },
        methods: {
            getData(){
                axios.get('api/feedback').then((res)=>{
                    this.options = res.data;
                })
            },
            submitForm(){
                axios.put(`/api/feedback/${this.selectedId}`).then((res)=>{
                    this.checkSubmit=true;
                })
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>
