<template>
	<h3 class="mb-3">Коротко о событиях</h3>
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
