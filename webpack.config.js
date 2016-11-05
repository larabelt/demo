let path = require('path');

module.exports = {

    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.js'
        },
        modules: [
            path.resolve('./resources'),
            path.resolve('./resources/assets/js'),
            path.resolve('./node_modules')
        ]
    }

}
