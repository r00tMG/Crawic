const puppeteer = require('puppeteer');

const getJobs = async () => {
  const browser = await puppeteer.launch({
    headless: false,
    defaultViewport: null,
  });

  const page = await browser.newPage();

  try {
    await page.goto("https://careers.davita.com/c/nurse-jobs", {
      waitUntil: "domcontentloaded",
    });

    // Wait for the jobs list to load
    await page.waitForSelector("li.jobs-list-item");

    const jobs = await page.evaluate(() => {
      const jobList = document.querySelectorAll("li.jobs-list-item");

      return Array.from(jobList).map((job) => {
        const title = job.querySelector(".job-title")?.innerText || "";
        const location = job.querySelector("span.job-location")?.innerHTML || "";
        const category = job.querySelector(".job-category")?.innerText || "";
        const jobId = job.querySelector(".jobId")?.innerText || "";
        const industry = job.querySelector(".industry")?.innerText || "";
        const postdate = job.querySelector(".job-postdate")?.innerText || "";

        return { title, location, category, jobId, industry, postdate };
      });
    });

    console.log(jobs);
  } catch (error) {
    console.error("An error occurred:", error);
  } finally {
    await browser.close();
  }
};

// Start scraping
getJobs();
