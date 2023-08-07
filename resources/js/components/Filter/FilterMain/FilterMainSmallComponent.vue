<template>
    <div>
        <template v-for="(items, keyItems) in filterItems">
            <div class="filter__main-content" v-if="filterGroup == keyItems">
                <div v-for="item in items" class="filter__item-tab">
                    <div class="filter__item-block">
                        <span class="filter__item-title" v-html="item.title"></span>
                        <div class="filter__wrap" v-if="filterValue[item.short_name]">
                            <select v-model="selectedFilter[item.short_name]"
                                    :multiple="item.type_input === 'checkbox'? true : false">
                                <option value="">----</option>
                                <template v-if="filterValue[item.short_name].popular">
                                    <optgroup label="Популярні">
                                        <option v-for="value in filterValue[item.short_name].popular"
                                                :value="value.slug">{{ value.name }}
                                        </option>
                                    </optgroup>
                                    <optgroup label="Усі">
                                        <option v-for="value in filterValue[item.short_name].value"
                                                :value="value.slug">{{ value.name }}
                                        </option>
                                    </optgroup>
                                </template>
                                <template v-else>
                                    <option v-for="value in filterValue[item.short_name].value" :value="value.slug">
                                        {{ value.name }}
                                    </option>
                                </template>
                            </select>
                            <div class="icon-button icon-arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="filter__item-tab-button button_green" @click="this.$parent.filterGo()">
                    <span class="filter__item-title" v-html="$t('select')"></span>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
export default {
    name: "FilterMainSmallComponent",
    data() {
        return {}
    },
    props: {
        filterGroup: '',
        filterItems: {},
        filterValue: {},
        selectedFilter: {},
    },
    mounted() {
    },
    created() {
    }
}
</script>

<style scoped>
.filter__main-content {
    position: relative;
}
.filter__item-tab {
    height: 44px;
    border-bottom: 2px solid #e7e7e7;
    overflow: hidden;
    background-color: #ffffff;
    position: relative;
}

.filter__item-title {
    font-weight: 700;
    line-height: 44px;
    padding: 0 10px;
    position: absolute;
}

.filter__item-tab-button {
    height: 44px;
}

.filter__item-tab-button .filter__item-title {
    padding: 0;
    text-align: center;
    position: initial;
}

select {
    -webkit-appearance: none;
    appearance: none;
    background: transparent;
    border: 0;
    font-size: 16px;
    height: 44px;
    line-height: 40px;
    overflow: hidden;
    padding: 5px 50px 5px 120px;
    width: 100%;
    z-index: 1;
    position: absolute;
}

.filter__item-tab .icon-button {
    width: 13px;
    top: calc(50% - 7px);
    color: #c7c6c6;
    right: 20px;
    position: absolute;
    transition-duration: 0.1s;
    transition-property: transform;
}

.filter__item-tab.open .icon-button {
    color: #a19f9f;
    transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
}
</style>
