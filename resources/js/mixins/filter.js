export default {
    data() {
        return {
            filterOpen: null,
            filterTypeValue: [],
        }
    },
    created: function () {
    },
    watch: {},
    methods: {
        async getFilterValue(isMain = false) {
            this.filterTypeValue = await this.$api.filter.filterValue({
                'isMain': isMain,
            });
        },
        async getFilterGroupValue(groupId) {
            if (this.filterTypeValue) {
                let result = await this.$api.filter.filterGroupValue({
                    'groupId': groupId,
                });
                $.each(this.result, function (typeItem, valueItem) {
                    this.filterTypeValue[typeItem] = valueItem;
                });
            }
        },
        async getFilterTypeValue(typeItem) {
            if (this.filterTypeValue[typeItem] === undefined) {
                this.filterTypeValue[typeItem] = await this.$api.filter.filterTypeValue({
                    'typeFilter': typeItem,
                });
            }
            (this.filterOpen === typeItem) ? this.filterOpen = null : this.filterOpen = typeItem;
        },
        async getCreateUrl() {
            this.$root.preloaderActive = true;
            this.filterUrl = await this.$api.filter.createUrl(
                {
                    'groupFilter': this.filterGroup,
                    'valueFilter': this.selectedFilter,
                },
                this.initFilterUrl
            );
            this.$root.preloaderActive = false;
            location.href = this.filterUrl;
        },
    }
}
