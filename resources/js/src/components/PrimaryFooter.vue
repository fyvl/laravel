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
        <div class="info">
            <img src="../assets/logo.svg" alt="" class="logo">
            <p>© ОАО «КЗХ Бирюса», 2022</p>
        </div>
        <div class="weather">
            <h1 class="text-white">{{ weather }}</h1>
        </div>
    </div>
</template>

<style scoped lang="less">
    #footer {
        height: 300px;
        background: rgba(17,29,52,255);
        padding: 50px;
    }

    .info {
        margin-left: 8%;
    }

    img {
        padding: 5px;
    }

    p {
        color: white;
    }

    .weather {
        float: right;
    }
</style>
