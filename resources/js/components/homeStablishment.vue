<template>
    <div class="">
        <mapa-stablishments></mapa-stablishments>
        <list-category></list-category>
<!--         <categoryOne></categoryOne>
        <categoryTwo></categoryTwo> -->
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
