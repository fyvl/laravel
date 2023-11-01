<template>
	<h1 class="mb-3">Главная</h1>
    <News></News>
</template>

<script lang="ts">
	import { defineComponent } from 'vue';
    import News from "@/pages/News.vue";

	export default defineComponent({
		components: {News},
		setup() {
			return {};
		},
	});
</script>

<style lang="less" scoped>
</style>
