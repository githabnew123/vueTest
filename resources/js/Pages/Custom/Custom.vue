<template>
    <div class="style">
        <input type="text" v-model="count" readonly />
        <button class="btn" @click="something()">Click</button>
        <button class="btn" @click="reset()">Reset</button>

        <div>
            <button class="btn" @click="apitest()">ApiTest</button>
        </div>
    </div>
</template>

<script>
    export default {
        name : "Custom",
        data() {
            return {
                data : "",
                count : 0
            };
        },
        methods : {
            something() {
                this.count++
            },

            reset() {
                this.count = 0;
            },

            async apitest() {
                const response = await axios.get('/api/tic-tac-toe/reset');
                this.data = response.data.winner;
            },
        }
    }
</script>

<style lang="css" scoped>
    .style {
        max-width: 300px;
        margin: auto;
        text-align: center;
        margin-top: 20%;
        font-family: Arial, sans-serif;
    }
</style>