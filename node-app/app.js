const express = require('express');
const puppeteer = require('puppeteer');

const app = express();
const port = 3000;

app.get('/external-backlinks', async (req, res) => {
  try {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    const website = req.query.website;
    const searchUrl = `https://www.google.com/search?q=link:${website}`;

    await page.goto(searchUrl);
    // Implement scraping logic here and send the data as JSON response

    await browser.close();
  } catch (error) {
    res.status(500).json({ error: 'An error occurred' });
  }
});

app.listen(port, () => {
  console.log(`Node.js API listening at http://localhost:${port}`);
});
