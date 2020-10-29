const path = require('path');

module.exports = {
	entry: {
		mapbox: path.resolve(__dirname, './src/script/frontend.js'),
	},
	output: {
		path: path.resolve(__dirname) + '/public/js',
		filename: '[name].js',
		sourceMapFilename: '[name].map'
	},
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules|bower_components/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [
							"@babel/preset-env",
						],
						plugins: [
							"@babel/plugin-proposal-object-rest-spread"
						]
					}
				},
			},
		]
	},
};