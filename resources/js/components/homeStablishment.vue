<template>
    <div class="">
        <list-category></list-category>
        <mapa-stablishments></mapa-stablishments>
        <categoryOne></categoryOne>
        <categoryTwo></categoryTwo>
    </div>
</template>

<script>
    import listCategory from './listCategory';
    import mapaStablishments from './mapaStablishments';
    import categoryOne from './categoryOne';
    import categoryTwo from './categoryTwo';

    export default {
        components: {
            categoryOne,
            categoryTwo,
            mapaStablishments,
            listCategory
        },
    }
</script>