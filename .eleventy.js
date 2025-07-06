import fs from "node:fs/promises";

export default function (eleventyConfig) {
	eleventyConfig.addPassthroughCopy("src/assets/**/*");
	eleventyConfig.addPassthroughCopy("src/style/**/*.css*");
	eleventyConfig.addPassthroughCopy("src/scripts/**/*");

	eleventyConfig.addPassthroughCopy("src/manifest.webmanifest");

	// eleventyConfig.setBrowserSyncConfig({
	// 	callbacks: {
	// 		ready: (_err, browserSync) => {
	// 			browserSync.addMiddleware("*", async (_req, res) => {
	// 				const content_404 = await fs.readFile("dest/404.html", {
	// 					encoding: "utf-8",
	// 				});
	// 				// Add 404 http status code in request header.
	// 				res.writeHead(404, { "Content-Type": "text/html; charset=UTF-8" });
	// 				// Provides the 404 content without redirect.
	// 				res.write(content_404);
	// 				res.end();
	// 			});
	// 		},
	// 	},
	// });

	// for WSL hot reload fix, see https://www.11ty.dev/docs/watch-serve/#advanced-chokidar-configuration
	eleventyConfig.setChokidarConfig({
		usePolling: true,
		interval: 500,
	});
}
