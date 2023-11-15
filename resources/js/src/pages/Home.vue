<script>
	import { defineComponent } from 'vue';
    import News from "@/components/News/News.vue";

	export default defineComponent({
		components: {News},
		setup() {
			return {};
		},
	});
</script>

<template>
	<h3 class="mb-3">Коротко о событиях</h3>
    <News :reduced="true"></News>
</template>

<style lang="less" scoped>
</style>
