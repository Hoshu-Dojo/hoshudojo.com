const fs = require("fs");

module.exports = function (eleventyConfig) {
	eleventyConfig.addPassthroughCopy("src/assets/**/*");
	eleventyConfig.addPassthroughCopy("src/favicon.png");
	// FIXME: temp for testing
	eleventyConfig.addPassthroughCopy("src/rebuild-staging/**/*");
	eleventyConfig.setBrowserSyncConfig({
		callbacks: {
			ready: function (err, browserSync) {
				browserSync.addMiddleware("*", (req, res) => {
					const content_404 = fs.readFileSync("dest/404.html");
					// Add 404 http status code in request header.
					res.writeHead(404, { "Content-Type": "text/html; charset=UTF-8" });
					// Provides the 404 content without redirect.
					res.write(content_404);
					res.end();
				});
			},
		},
	});
};
