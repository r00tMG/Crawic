const express = require('express');
const puppeteer = require('puppeteer');

const app = express();
const port = 3397;

app.get('/external-backlinks', async (req, res) => {
  try {
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();

    const website = req.query.website;
    const searchUrl = `https://www.google.com/search?q=link:${website}`;
    await page.goto(searchUrl);

    // Wait for the search results to load
    await page.waitForSelector('.yuRUbf');

    // Extract backlink information
    const backlinks = await page.evaluate(() => {
      const linkElements = document.querySelectorAll('.yuRUbf a');
      const backlinks = [];

      linkElements.forEach(linkElement => {
        const titleElement = linkElement.querySelector('.LC20lb.DKV0Md');
        const title = titleElement ? titleElement.textContent : 'Title not found';
        const url = linkElement.href;

        backlinks.push({ title, url });
      });

      return backlinks;
    });

    await browser.close();

    res.json({ backlinks });
  } catch (error) {
    console.error('An error occurred:', error);
    res.status(500).json({ error: 'An error occurred' });
  }
});

app.listen(port, () => {
  console.log(`Node.js API listening at http://localhost:${port}`);
});
