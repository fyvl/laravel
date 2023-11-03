<script lang="ts">
    import {defineComponent, ref} from 'vue';

    export default defineComponent ({
            setup() {

            },
    });
</script>

<template>
    <div class="container">
        <h5>Управление производством</h5>
        <hr>
        <div>
            <img src="../assets/2-1.png">
            <img src="../assets/2-2.png">
            <img src="../assets/2-3.png">
            <img src="../assets/2-4.png">
            <img src="../assets/2-5.png">
            <img src="../assets/2-6.png">
            <img src="../assets/2-7.png">
        </div>
        <div>
            <img src="../assets/3-1.png">
            <img src="../assets/3-2.png">
            <img src="../assets/3-3.png">
            <img src="../assets/3-4.png">
        </div>
        <div>
            <img src="../assets/4-1.png">
            <img src="../assets/4-2.png">
            <img src="../assets/4-3.png">
            <img src="../assets/4-4.png">
        </div>
        <div>
            <img src="../assets/5-1.png">
        </div>
    </div>
    <div class="container">
        <h5>Справочные системы</h5>
        <hr>
        <div>
            <img src="../assets/2-1-1.png">
            <img src="../assets/2-1-2.png">
            <img src="../assets/2-1-3.png">
            <img src="../assets/2-1-4.png">
            <a href="https://2gis.ru/krasnoyarsk"><img src="../assets/2-1-5.png"></a>
        </div>
        <div>
            <img src="../assets/2-2-1.png">
            <img src="../assets/2-2-2.png">
        </div>
    </div>
    <div class="container">
        <h5>Отчеты по задачам</h5>
        <hr>
        <div>
            <img src="../assets/3-1-1.png">
            <img src="../assets/3-1-2.png">
            <img src="../assets/3-1-3.png">
            <img src="../assets/3-1-4.png">
            <img src="../assets/3-1-5.png">
            <img src="../assets/3-1-6.png">
        </div>
        <div>
            <img src="../assets/3-2-1.png">
            <img src="../assets/3-2-2.png">
        </div>
    </div>
</template>

<style scoped lang="less">
    img {
        width: 15%;
        margin: 3px;
        border: 1px solid black;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    img:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 10px;
        cursor: pointer;
    }

    .container {
        margin: 10px;
    }
</style>
