const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const options = {
  devtool: 'inline-source-map',
  entry: {
    main: [
      './src/app/main.entry.js',
    ],
    style: [
      './src/styles/style.scss',
    ],
  },
  output: {
    path: process.cwd(),
    filename: '[name].bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: ['env']
            }
          },
        ]
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract(['css-loader', 'sass-loader']),
      },
    ],
  },
  plugins: [
    new ExtractTextPlugin({
      filename: '[name].css',
    }),
  ],
  stats: {
    children: false
  },
};

module.exports = options;
