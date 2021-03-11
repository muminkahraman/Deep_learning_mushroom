import scrapy

class Mushroom_spider(scrapy.Spider):
    name = 'mushroom'

    start_urls = ['https://mushroomobserver.org']

    def __init__(self):
        observation_link_end = '?q=1e9ER'

    def parse(self, response):

        for result in response.css('div.list-group'):
            yield{
                'name': result.css('div.rss-what i::text').getall(),
                'image_link': result.css('div.text-center img::attr(src)').get(),
                'obervation_link': result.css('div.rss-what a::attr(href)').get()
            }

        crawled_pages = []
        candidate_pages = response.css('div.results ul.pagination a::attr(href)').getall()
        next_pages = []

        #checks that the candidate links haven't been crawled already, to avoid cycles

        for page in candidate_pages:
            if crawled_pages.count(page) == 0:
                next_pages.append(page)

        for page in next_pages:
            if page is not None:
                page = response.urljoin(page)
                yield scrapy.Request(page, callback=self.parse)



