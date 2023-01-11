/*
 * For a detailed explanation regarding each configuration property, visit:
 * https://jestjs.io/docs/configuration
 */

module.exports = {
	testMatch: ['**/packages/**/*.test.js'],
	clearMocks: true,
	collectCoverage: false,
	coverageDirectory: 'coverage',
	coverageProvider: 'v8',
};
