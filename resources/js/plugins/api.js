import filterModule from '../api/filter'

function locale()
{
    return document.documentElement.lang;
}

export default {
    filter: filterModule(locale())
}

