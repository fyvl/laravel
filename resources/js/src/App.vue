<template>
	<PrimaryHeader />
	<main class="main">
		<router-view />
	</main>
    <Primary-footer />
</template>

<script lang="ts">
	import { defineComponent } from 'vue';
	import PrimaryHeader from './components/PrimaryHeader.vue';
    import PrimaryFooter from "@/components/PrimaryFooter.vue";

	export default defineComponent({
		components: {
            PrimaryFooter,
			PrimaryHeader,
		},
		setup() {
			return {};
		},
	});
</script>

<style lang="less" scoped>
	.main {
        min-height: 1200px;
		width: 992px;
		margin: 0 auto;
		padding: 40px;
	}
</style>
