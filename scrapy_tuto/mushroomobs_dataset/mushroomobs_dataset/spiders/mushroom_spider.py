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




