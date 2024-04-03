<template>
    <div>
        <template v-for="(items, keyItems) in filterItems">
            <div class="filter__main-content d-flex" v-if="filterGroup == keyItems">
                <div v-for="item in items" class="filter__item-tab" :style="{ width: styleClass.wItemTab + '%' }"
                     :class="{open : filterOpen === item.shortName}">
                    <div @click="openTab(item.shortName)">
                        <div class="filter__item-block">
                            <span class="filter__item-title" v-html="item.title"></span>
                            <span class="filter__item-select" v-html="infoTab[item.shortName]"></span>
                            <div class="icon-button icon-arrow"></div>
                        </div>
                    </div>
                    <div class="filter__wrap" v-show="filterOpen === item.shortName">
                        <div class="filter__select-item" v-if="filterValue[item.shortName]">
                            <div class="popular" v-if="filterValue[item.shortName].popular">
                                <div class="filter__wrap-title d-flex"><span class="m-auto">Популярні</span></div>
                                <template v-for="value in filterValue[item.shortName].popular">
                                    <input class="d-none" v-model="selectedFilter[item.shortName]"
                                           :type="item.typeInput" :id="'filter-pop-'+value.slug"
                                           :value="value.slug"
                                           @click="selectItem(item.shortName, value.name)">
                                    <label :for="'filter-pop-'+value.slug" class="filter__option-label"
                                           v-html="value.name"></label>
                                </template>
                            </div>
                            <div class="all" v-if="filterValue[item.shortName].value">
                                <div class="filter__wrap-title d-flex" v-if="filterValue[item.shortName].popular">
                                    <span class="m-auto">Усі</span></div>
                                <template v-for="value in filterValue[item.shortName].value">
                                    <input class="d-none" v-model="selectedFilter[item.shortName]"
                                           :type="item.typeInput" :id="'filter-'+value.slug" :value="value.slug"
                                           @click="selectItem(item.shortName, value.name)">
                                    <label :for="'filter-'+value.slug" class="filter__option-label"
                                           v-html="value.name"></label>
                                </template>
                            </div>
                        </div>
                        <div class="filter__select-button active d-flex d-flex justify-content-between">
                            <div class="cancel" @click="cast(item.shortName)" v-html="$t('cast')"></div>
                            <div v-if="item.multiple && applyItem[item.shortName]" class="save"
                                 @click="apply()" v-html="$t('apply')"></div>
                            <div v-else="item.multiple" class="save" @click="close()"
                                 v-html="$t('filter_button_close')"></div>
                        </div>
                    </div>
                </div>
                <div class="filter__item-tab-button button_green" @click="this.$parent.filterGo()"
                     :style="{ width: styleClass.wItemTab + '%' }">
                    <span class="filter__item-title" v-html="$t('select')"></span>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
export default {
    name: "FilterMainBigComponent",
    data() {
        return {
            infoTab: [],
            applyItem: [],
            filterOpen: null,
            styleClass: {
                wItemTab: '0',
            },
        }
    },
    props: {
        filterGroup: '',
        filterItems: {},
        filterValue: {},
        selectedFilter: {},
    },
    mounted() {
        this.initSelectItem();
    },
    created: function () {
        this.styleTab();
    },
    computed: {},
    watch: {
        filterGroup: function () {
            this.styleTab();
        },
    },
    methods: {
        cast(keyItem) {
            self.infoTab[keyItem] = '';
            this.selectedFilter[keyItem] = [];
        },
        apply() {
            this.filterOpen = null;
        },
        close() {
            this.filterOpen = null;
        },
        initSelectItem() {
            self = this;
            $.each(this.filterItems, function (keyGroup, group) {
                $.each(group, function (keyItem, valueItem) {
                    if ($.isArray(self.selectedFilter[keyItem])) {
                        self.applyItem[keyItem] = (self.selectedFilter[keyItem].length > 0);
                        self.infoTab[keyItem] = (self.selectedFilter[keyItem].length > 0) ? '(' + self.selectedFilter[keyItem].length + ')' : '';
                    } else {
                        self.filterValue[keyItem].value.filter(
                            function (value) {
                                if (self.selectedFilter[keyItem] == value.slug) {
                                    self.infoTab[keyItem] = value.name;
                                }
                            }
                        );

                    }
                });
            });
        },
        selectItem(key, titleItem) {
            self = this;
            let group = this.filterItems[this.filterGroup];
            setTimeout(function () {
                $.each(group, function (keyItem, valueItem) {
                    if ($.isArray(self.selectedFilter[keyItem])) {
                        self.applyItem[keyItem] = (self.selectedFilter[keyItem].length > 0);
                        self.infoTab[keyItem] = (self.selectedFilter[keyItem].length > 0) ? '(' + self.selectedFilter[keyItem].length + ')' : '';
                    } else if (keyItem == key) {
                        self.infoTab[keyItem] = titleItem;
                        self.filterOpen = null;
                    }
                });
            }, 10);
        },
        openTab(typeItem) {
            (this.filterOpen === typeItem) ? this.filterOpen = null : this.filterOpen = typeItem;
        },
        styleTab() {
            let countTab = Object.keys(this.filterItems[this.filterGroup]).length + 1;
            this.styleClass.wItemTab = 100 / countTab;
        },
    },
}
</script>

<style scoped>
.filter__main-content {
    position: relative;
    -moz-user-select: none;
    -khtml-user-select: none;
    user-select: none;
}

.filter__item-tab {
    height: 50px;
    border-left: 1px solid #e7e7e7;
    border-right: 1px solid #e7e7e7;
    background-color: #ffffff;
}

.filter__item-tab:first-child {
    border-left: none;
}

.filter__item-tab:last-child {
    border-right: none;
}

.filter__item-tab-button .filter__item-title {
    padding: 0;
    text-align: center;
}

.filter__item-block {
    position: relative;
    cursor: pointer;
}

.filter__item-block:hover {
    background-color: #f6f6f6;
}

.filter__item-tab .icon-button {
    width: 13px;
    top: calc(50% - 7px);
    color: #c7c6c6;
    right: 8px;
    position: absolute;
    transition-duration: 0.1s;
    transition-property: transform;
}

.filter__item-tab.open .icon-button {
    color: #a19f9f;
    transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
}

.filter__item-title {
    color: #333;
    cursor: pointer;
    font-weight: 700;
    line-height: 50px;
    font-size: 13px;
    padding: 0 25px 0 7px;
    position: relative;
    transition: line-height .3s, color .3s;
}

.filter__item-select {
    max-width: 40px;
    overflow: hidden;
    text-overflow: ellipsis;
    position: absolute;
    right: 27px;
    top: 17px;
    font-weight: bold;
    text-align: right;
    font-size: 11px;
    color: #7e7e7e;
}

.filter__wrap,
.filter__select-item {
    max-height: 350px;
}

.filter__wrap {
    left: 0;
    right: 0;
    background-color: #dddcdc;
    position: absolute;
}

.filter__select-item {
    padding-bottom: 1px;
    border-top: 1px solid #dddcdc;
    overflow: auto;
}

.filter__select-item::-webkit-scrollbar {
    width: 7px;
    border: 2px;
    background-color: #eeeeee;
}

.filter__select-item::-webkit-scrollbar-thumb {
    background-color: #008906;
}

.filter__select-button.active {
    height: 50px;
    padding: 0 6px;
    position: relative;
    background-color: #dddcdc;
}

.filter__select-button div {
    height: 100%;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    color: #8d8d8d;
    cursor: pointer;
    line-height: 50px;
}

.filter__wrap-title {
    height: 25px;
    margin-top: 10px;
}

.filter__wrap-title span {
    font-weight: bold;
}

.filter__option-label,
.filter__select-button div {
    width: calc(135px - 0.99%);
}

.filter__option-label {
    height: 50px;
    border-radius: 2px;
    font-weight: bold;
    line-height: 50px;
    text-align: center;
    margin: 10px .7% 0 .7%;
    cursor: pointer;
    background-color: #ffffff;
}

input:checked + label {
    color: #fff;
    background-color: #1560ac;
}

.filter__option-label:hover {
    color: #fff;
    background-color: #3675b4;
}

input:checked + label.filter__option-label:hover,
.filter__option-label:active {
    color: #fff;
    background-color: #0d5399;
}

.filter__option-label:active {
    transform: translateY(1px);
}

@media screen and (min-width: 992px) {
    .filter__item-tab {
        height: 60px;
    }

    .filter__item-title {
        font-size: 14px;
        padding: 0 25px 0 25px;
    }

    .filter__item-select {
        max-width: 60px;
        right: 33px;
        top: 20px;
        font-size: 14px;
    }

    .filter__item-tab .icon-button {
        top: calc(50% - 6px);
    }

    .filter__item-title {
        line-height: 60px;
    }

    .filter__wrap-title {
        height: 36px;
        margin-top: 20px;
    }

    .filter__option-label,
    .filter__select-button div {
        width: calc(151px - 0.99%);
    }

    .filter__option-label {
        margin: 20px .7% 0 .7%;
    }
}

@media screen and (min-width: 1200px) {
    .filter__option-label,
    .filter__select-button div {
        width: calc(157px - 1.204%);
    }
}
</style>
