// @ts-check
const { test, expect } = require('@playwright/test');

test('Example test', async ({ page }) => {
	await page.goto('http://localhost:8889/');
});
