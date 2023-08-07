<template>
    <div class="filter__main">
        <div class="filter__main-header">
            <div class="filter__main-tabs">
                <div class="filter__main-tabs title">Підібрати</div>
                <div class="tab" @click="filterGroup = 1" v-html="$t('tire_title')"> </div>
                <div class="tab" @click="filterGroup = 2" v-html="$t('disk_title')"></div>
            </div>
        </div>
        <div class="filter__main-body">
            <template v-if="deviceType === 'big'">
                <FilterMainBigComponent :filterGroup="filterGroup" :filterItems="filterItems" :filterValue="filterValue" :selectedFilter="selectedFilter"></FilterMainBigComponent>
            </template>
            <template v-if="deviceType === 'small'">
                <FilterMainSmallComponent :filterGroup="filterGroup" :filterItems="filterItems" :filterValue="filterValue" :selectedFilter="selectedFilter"></FilterMainSmallComponent>
            </template>
        </div>
    </div>
</template>

<script>
import FilterMainBigComponent from './FilterMain/FilterMainBigComponent.vue'
import FilterMainSmallComponent from './FilterMain/FilterMainSmallComponent.vue'

export default {
    name: "filter-main-component",
    components: {
        FilterMainBigComponent,
        FilterMainSmallComponent
    },
    props: {
        filterItems: {},
        filterValue: {},
        initFilterUrl: '',
    },
    data() {
        return {
            filterGroup: 1,
            typeFilter: null,
            deviceType: '',
            dataFilter: [],
            selectedFilter: {},
        }
    },

    created: function () {
        this.getDeviceType();
        this.initFilter();
    },
    watch: {
        'responseFilterValue': function () {
            this.setFilterType()
        },
        'windowWidth': function () {
            this.getDeviceType();
        }
    },
    mounted() {
        this.$nextTick(() => {
            window.addEventListener('resize', this.getDeviceType);
        })
    },
    methods: {
        filterGo() {
            this.getCreateUrl();
        },
        initFilter() {
            self = this;
            $.each(this.filterItems, function (keyGroup, valueGroup) {
                $.each(valueGroup, function (keyItem, valueItem) {
                    self.selectedFilter[keyItem] = [];
                });
            });
        },
        getDeviceType() {
            this.deviceType = (window.innerWidth < 768) ? 'small' : 'big';
        },
        setFilterType() {
            let params = this.responseFilterValue.params;
            let data = this.responseFilterValue.data;
            this.$attrs.filteritems[params.groupId][params.typeFilter].value = data.value;
            this.$attrs.filteritems[params.groupId][params.typeFilter].popular = data.popular;
        },
    }
}
</script>

<style scoped>
.filter__main {
    max-width: 960px;
    height: 600px;
    margin: auto;
}

.filter__main-body {

}
</style>
