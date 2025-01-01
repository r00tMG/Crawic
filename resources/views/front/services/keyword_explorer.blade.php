@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">Try Keyword Explorer for free</h1>
                    <h3>The SEO keyword research tool with over 1.25 billion traffic-driving keywords.
                    </h3>

                </div>
               
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                    <div class="title">
                        <h2 class="h2">Discover more keywords</h2>
                        <p class="text-center">Enter a keyword and get top suggestions, monthly volume, organic CTR, and difficulty.</p>
                    </div>
                    <form action="#" method="post" data-form="validate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input type="text" name="website" class="form-control"
                                        placeholder="Enter a keyword *" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group"> <input type="email" name="email" class="form-control"
                                        placeholder="Enter locate" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Find Keyword</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="services--section pd--100-0-40">
            <div class="container">
                <h3 class="text-center pd--80-0">Perform in-depth keyword and SERP analysis with the industry-leading keyword research tool.</h3>
                <div class="row AdjustRow">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Analyze keywords by search volume</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Whether you're tracking a thousand keywords or a million, STAT hunts out relevant SERPs across the globe.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Generate and save keyword lists</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Track infinite sites, automate your insights, and customize alerts to ensure that when it comes to the competition, nothing gets by you.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Export your data</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>We're built to track big data at competitive rates. Tracking starts at $720/month for 6,000 keywords.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Find keywords in question format</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Sort by predictive keyword metrics</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Review SERP details by keyword</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Check Keyword Difficulty</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Take your SEO strategy global</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Perform competitive keyword analysis</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Generate relevant Keyword Suggestions</h2>
                            </div>
                            <div class="body">
                                <p>
                                    The Keyword Suggestions feature helps you discover keywords and topics you may never have considered. The list of suggestions is sorted by crawic Relevancy metric by default. A high score indicates that the suggested keyword appears in many sources of competitor content reviewed by Moz, and are lexically similar to the original keyword. You can sort Keyword Suggestions by Monthly Volume, exported to CSV files, or add them directly into your Moz Campaigns and Keyword Lists.
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/moz/12.webp" alt=""> </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="intro--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row" style="align-items: center;justify-content: center;">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/moz/13.webp" alt=""> </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Analyze the SERP for a given keyword</h2>
                            </div>
                            <div class="body">
                                <p>
                                    The SERP (Search Engine Results Page) Analysis helps you understand the landscape of a keyword. It will help you answer the question, “Who is ranking for this keyword, and how?” SERP previews include Moz Domain Authority, Page Authority, and backlink metrics for each organic result.
                                    <br><br>
                                    Results in the SERP Analysis also include Page Scores via Moz Pro’s ‘On Page Grader’ tool This score, based on a scale of 1 to 100, indicates how well-optimized the content is for the target keyword. A high score indicates that the page’s content, meta data, internal linking profile, and other technical SEO features will maximize organic search visibility for the target keyword.
                                </p>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="about--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Create Keyword Lists</h2>
                            </div>
                            <div class="body">
                                <p>
                                    Keyword Lists will help you organize, track, and compare thousands of keywords side by side, empowering you to target the most effective keywords. Seamlessly add suggested keywords to an existing Keyword List, or create a new one on the fly. Moz Pro allows you to group keywords for you based on lexical similarity, which allows you to quickly find subtopics and pre-categorized clusters of search terms within the parent keyword. Once your Keyword List is created, Moz Pro will display search Monthly Volume totals, estimated available CTR for organic results, keyword Difficulty scores, and the distribution of rich SERP features appearing for the entire list. For better international SEO strategies, search for keyword suggestions and ranking keywords by country.
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/moz/14.webp" alt=""> </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="intro--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row" style="align-items: center;justify-content: center;">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/moz/15.webp" alt=""> </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Preview SERP features for every keyword</h2>
                            </div>
                            <div class="body">
                                <p>
                                    crawic SERP Analysis also displays rich search engine results such as Top Stories, Images, Knowledge Graphs, Featured Snippets, Ad Results and even Tweets. This will help you understand the search landscape of every keyword, and how you can best optimize your site to match the intent of the query.
                                </p>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="about--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Explore Keywords by Site</h2>
                            </div>
                            <div class="body">
                                <p>
                                    Uncover your site’s organic search keywords. Decide if you want to track any of these terms by adding them directly to your Keyword Lists, or export up to 10,000 rows as a CSV. Results can be filtered by Ranking, Difficulty, or Volume for precise, actionable SEO data. This feature can also be used to performa deep-dive on all of your competitors ranking search terms. Enter any URL into the search bar for a full list of their SEO keywords.
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/moz/14.webp" alt=""> </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="intro--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row" style="align-items: center;justify-content: center;">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/moz/17.webp" alt=""> </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Perform organic keyword analysis on your competitors</h2>
                            </div>
                            <div class="body">
                                <p>
                                    See what keywords your site ranks for and discover your competitors' most important keywords. Moz Keyword Explorer can help you perform a gap analysis to determine where you can improve specific rankings relative to your competitors. Filter results by ranking position, search volume, or crawic proprietary Keyword Difficulty score, which shows how easy (or hard) it is to rank on each SERP.
                                </p>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
      
@endsection