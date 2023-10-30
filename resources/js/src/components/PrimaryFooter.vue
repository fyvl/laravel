<script>
    import axios from "axios";
    import {ref} from "vue";

    export default {
        setup() {
            const weather = ref('');

            return {
                weather
            };
        },
        created() {
            axios.get('http://api.weatherapi.com/v1/current.json?key=0c16a0555a8f4caebf291446233010&q=Krasnoyarsk&aqi=no')
                .then((res) => {
                    this.weather = res.data.current.temp_c;
                });
        },
    };
</script>

<template>
    <div id="footer">
        <h1>{{ weather }}</h1>
    </div>
</template>

<style scoped lang="less">
    #footer {
        height: 300px;
        background: grey;
    }
</style>
