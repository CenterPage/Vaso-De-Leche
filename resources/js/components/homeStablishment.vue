<template>
    <div class="">
        <mapa-stablishments></mapa-stablishments>
        <categoryOne></categoryOne>
        <categoryTwo></categoryTwo>
    </div>
</template>

<script>
    import mapaStablishments from './mapaStablishments';
    import categoryOne from './categoryOne';
    import categoryTwo from './categoryTwo';

    export default {
        components: {
            categoryOne,
            categoryTwo,
            mapaStablishments
        },
    }
</script>