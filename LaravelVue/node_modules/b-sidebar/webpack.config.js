'use strict';

const webpack = require('webpack');
const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');

module.exports = {
    context: __dirname,
    resolve: {
        modules: [
            path.resolve(__dirname, 'src'),
            'node_modules'
        ],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
        },
        extensions: ['.js', '.json', '.vue']
    },
    entry: './src/main.js',
    // Don't include these into library build
    externals: {
        'vue': {
            commonjs: 'vue',
            commonjs2: 'vue',
            amd: 'vue',
            root: 'Vue'
        },
        'jquery': {
            commonjs: 'jquery',
            commonjs2: 'jquery',
            amd: 'jquery',
            root: 'jQuery'
        }
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'b-sidebar.js',
        library: 'bSidebar',
        libraryTarget: 'umd',
        umdNamedDefine: true,
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                exclude: path.resolve(__dirname, 'node_modules'),
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: path.resolve(__dirname, 'node_modules'),
            },
            {
                test: /\.(png|jpg|gif|svg)$/,
                loader: 'url-loader',
                query: {
                    limit: 10000,
                    name: '[name].[ext]?[hash]'
                }
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin(['./dist']),
        new webpack.optimize.ModuleConcatenationPlugin(),
    ],
    devtool: false,
    performance: {
        hints: false,
    }
};