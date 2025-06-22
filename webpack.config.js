const path = require('path');

module.exports = (env, argv) => ({
  entry: {
    app: './assets/js/index.js',
    styles: './assets/css/main.css'
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].bundle.js'
  },
  mode: argv.mode || 'development',
  devtool: argv.mode === 'production' ? false : 'source-map',
  module: {
    rules: [
      { // kompilacja ES6+
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader'
        }
      },
      { // wczytywanie i wstrzykiwanie CSS
        test: /\.css$/,
        use: ['style-loader', 'css-loader']
      }
    ]
  },
  optimization: {
    minimize: argv.mode === 'production'
  }
});
