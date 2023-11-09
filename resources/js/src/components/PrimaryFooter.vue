<script>
    import axios from "axios";
    import { ref, onMounted } from "vue";

    export default {
        setup() {
            const weather = ref(null);

            onMounted(() => {
                axios.get('http://api.weatherapi.com/v1/current.json?key=0c16a0555a8f4caebf291446233010&q=Krasnoyarsk&aqi=no')
                    .then((res) => {
                        weather.value = res.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching weather data:", error);
                    });
            });

            return {
                weather,
            };
        }
    };
</script>

<template>
    <div id="footer">
        <div class="info">
            <img src="../assets/logo.svg" alt="" class="logo">
            <p>© ОАО «КЗХ Бирюса», 2023</p>
        </div>
        <div v-if="weather" class="weather">
            <img :src="weather.current.condition.icon" alt="Weather Icon">
            <div class="weather-info">
                <p class="city">{{ weather.location.name }}</p>
                <h1 class="temperature-value">{{ weather.current.temp_c }}&deg;C</h1>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
    #footer {
        background: rgba(17, 29, 52, 0.95);
        padding: 30px 75px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;

        .info {
            text-align: center;
            .logo {
                width: 150px;
                height: auto;
                margin-bottom: 5px;
            }
        }

        .weather {
            display: flex;
            align-items: center;

            img {
                width: 75px;
                height: 75px;
                margin-right: 10px;
            }

            &-info {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                .city {
                    font-size: 1.2rem;
                    margin-bottom: 5px;
                }
                .temperature-value {
                    font-size: 2rem;
                    font-weight: bold;
                }
            }
        }
    }
</style>
