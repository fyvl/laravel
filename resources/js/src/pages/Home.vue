<template>
	<h3 class="mb-3">Коротко о событиях</h3>
    <News :reduced="true"></News>
</template>

<script>
	import { defineComponent, onMounted } from 'vue';
    import News from "@/components/News/News.vue";
    import {useStore} from "vuex";
    import axios from "axios";

	export default defineComponent({
		components: {News},
		setup() {
            const store = useStore();

            onMounted(async () => {
                try {
                    const response = await axios.get('/api/user');

                    console.log(response.data);

                    await store.dispatch('setAuth', true);
                } catch (error) {
                    console.error(error);
                    // await store.dispatch('setAuth', false);
                }
            });

			return {};
		},
	});
</script>

<style lang="less" scoped>
</style>
