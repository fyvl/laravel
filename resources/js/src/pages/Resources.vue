<script lang="ts">
    import {defineComponent, ref} from 'vue';

        export default defineComponent({
            setup() {
                const name = ref(['Apples','Pizza','Rice','Fish','Cake']);

                return {
                    name
                };
            },
        });
</script>

<template>
    <div class="row">
        <div class="col-sm-4" v-for="item in name">
            <div class="card mb-3">
                <div class="card-body">
                    <a href="#"><h5 class="card-title">{{ item }}</h5></a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
</style>
