export default function (locale) {
    const url = locale+'/filter';
    return {
        async filterValue(params) {
            return await axios.get(url + '/value', {
                params: params
            })
                .then(function (response) {
                    return response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function (response) {

                })
        },
        async filterGroupValue() {
            return await axios.get(url + '/group-value')
                .then(function (response) {
                    return response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function (response) {

                })
        },
        async filterTypeValue(params) {
            return await axios.get(url + '/type-value', {
                params: params
            })
                .then(function (response) {
                    return response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function (response) {

                })
        },
        async createUrl(params,url) {
            return await axios.post(url, {
                params: params
            })
                .then(function (response) {
                    return response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function (response) {

                })
        },



    }
}


